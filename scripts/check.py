#!/usr/bin/env python3
"""Offline checks for the published files. Python standard library only."""
import base64
import binascii
import hashlib
from html.parser import HTMLParser
import json
from pathlib import Path
import re
import sys
from urllib.parse import parse_qs, unquote, urljoin, urlsplit
import xml.etree.ElementTree as ET

PUBLIC = Path(__file__).resolve().parents[1] / 'public'
ORIGIN = 'https://tfm.fund'
LANGUAGES = {'eng': 'en', 'rus': 'ru', 'spa': 'es', 'cnr': 'cnr'}
SOCIAL_LOCALES = {'eng': 'en_US', 'rus': 'ru_RU', 'spa': 'es_ES', 'cnr': 'cnr_ME'}
ALTERNATES = {lang: f'{ORIGIN}/{folder}/' for folder, lang in LANGUAGES.items()}
ALTERNATES['x-default'] = ORIGIN + '/'
# Deliberately pinned independently of the HTML: a typo in a payment must fail CI.
DONATION = 'GCSAXEHZBQY65URLO6YYDOCTRLIGTNMGCQHVW2RZPFNPTEJN6VN7TFIN'
ISSUER = 'GACKTN5DAZGWXRWB2WLM6OPBDHAMT6SJNGLJZPQMEZBUR4JUGBX2UK7V'
COUNCIL = 'GDOJK7UAUMQX5IZERYPNBPQYQ3SHPKGLF5MBUKWLDL2UV2AY6BIS3TFM'
ERRORS = []


def require(condition, message):
    if not condition:
        ERRORS.append(message)


class Page(HTMLParser):
    def __init__(self, path):
        super().__init__(convert_charrefs=True)
        self.path = path
        self.source = path.read_text(encoding='utf-8')
        self.elements = []
        self.ids = set()
        self.stack = []
        self.anchors = []
        self.feed(self.source)
        require(not self.stack, f'{self.path}: unclosed HTML elements {self.stack}')

    def handle_starttag(self, tag, attrs):
        attrs = dict(attrs)
        if tag not in {'area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'param', 'source', 'track', 'wbr'}:
            self.stack.append((tag, attrs.get('id')))
        self.elements.append((tag, attrs))
        if tag == 'a':
            self.anchors.append({'href': attrs.get('href', ''), 'text': '',
                                 'within': {element_id for _, element_id in self.stack if element_id}})
        if 'id' in attrs:
            require(attrs['id'] not in self.ids, f'{self.path}: duplicate id {attrs["id"]}')
            self.ids.add(attrs['id'])
        require(not any(k.startswith('on') or k == 'style' for k in attrs),
                f'{self.path}: inline script/style attribute')
        require(tag not in {'form', 'iframe', 'object', 'embed', 'base', 'style'},
                f'{self.path}: unexpected {tag}')
        if tag == 'script':
            require(attrs.get('src') == '../assets/copy.js' and 'defer' in attrs,
                    f'{self.path}: unexpected script')
        if tag == 'img':
            require(all(k in attrs for k in ('alt', 'width', 'height')), f'{self.path}: image needs alt and dimensions')

    def handle_endtag(self, tag):
        require(bool(self.stack) and self.stack[-1][0] == tag, f'{self.path}: unexpected closing tag {tag}')
        if self.stack:
            self.stack.pop()

    def handle_data(self, data):
        if any(tag == 'a' for tag, _ in self.stack):
            self.anchors[-1]['text'] += data

    def attrs(self, tag):
        return [attrs for name, attrs in self.elements if name == tag]


def check():
    ERRORS.clear()
    pages = {f.resolve(): Page(f) for f in PUBLIC.rglob('*.html')}
    require(len(pages) == 6, 'Expected language selector, four locales and 404')
    used = set()
    for path, page in pages.items():
        relative = path.relative_to(PUBLIC)
        label = str(relative)
        base = f'{ORIGIN}/{relative}'
        require(page.source.lower().startswith('<!doctype html>'), f'{label}: missing doctype')
        require(len(page.attrs('h1')) == 1, f'{label}: expected one h1')
        require(len(page.attrs('main')) == 1, f'{label}: expected one main')
        require(bool(re.search(r'<title>[^<]+</title>', page.source)), f'{label}: missing title')
        meta = {a.get('name', a.get('http-equiv', a.get('property'))): a.get('content') for a in page.attrs('meta')}
        require('width=device-width' in meta.get('viewport', ''), f'{label}: missing viewport')
        require(any(a.get('charset') == 'utf-8' for a in page.attrs('meta')), f'{label}: missing charset')
        csp = meta.get('Content-Security-Policy', '')
        require(all(rule in csp.split('; ') for rule in ("default-src 'none'", "script-src 'self'", "connect-src 'none'", "form-action 'none'", "base-uri 'none'")), f'{label}: unsafe CSP')
        require(meta.get('referrer') == 'no-referrer', f'{label}: missing referrer policy')
        for tag, attrs in page.elements:
            for name in ('aria-labelledby', 'aria-describedby', 'for'):
                for target in attrs.get(name, '').split():
                    require(target in page.ids, f'{label}: missing accessible label {target}')
            refs = [attrs[k] for k in ('href', 'src', 'srcset') if k in attrs]
            if tag == 'meta' and attrs.get('property') == 'og:image':
                refs.append(attrs['content'])
            for ref in refs:
                url = urlsplit(urljoin(base, ref))
                require(url.scheme in {'https', 'web+stellar'}, f'{label}: unsafe URL {ref}')
                if url.scheme == 'web+stellar':
                    continue
                if url.netloc != 'tfm.fund':
                    require(tag == 'a', f'{label}: third-party resource {ref}')
                    continue
                target = (PUBLIC / unquote(url.path).lstrip('/')).resolve()
                if target.is_dir():
                    target /= 'index.html'
                require(target.is_relative_to(PUBLIC) and target.is_file(), f'{label}: missing/unsafe local URL {ref}')
                used.add(target)
                if url.fragment:
                    require(target in pages and unquote(url.fragment) in pages[target].ids, f'{label}: broken fragment {ref}')
        if relative.name == '404.html':
            require(meta.get('robots') == 'noindex', '404 must not be indexed')
            continue
        canonical = ORIGIN + ('/' if relative.parent == Path('.') else f'/{relative.parent}/')
        require([a['href'] for a in page.attrs('link') if a.get('rel') == 'canonical'] == [canonical], f'{label}: wrong canonical')
        require({a.get('hreflang'): a.get('href') for a in page.attrs('link') if a.get('rel') == 'alternate'} == ALTERNATES, f'{label}: wrong language alternates')
        require(bool(meta.get('description')), f'{label}: missing description')
        require(meta.get('og:url') == canonical and meta.get('og:title'), f'{label}: inconsistent social metadata')
        card_locale = 'eng' if relative == Path('index.html') else relative.parent.name
        require(meta.get('og:image') == f'{ORIGIN}/media/og-{card_locale}.jpg', f'{label}: incorrect social image')

    link_sets, project_sets, dates = [], [], []
    for folder, lang in LANGUAGES.items():
        page = pages[(PUBLIC / folder / 'index.html').resolve()]
        require(page.attrs('html') == [{'lang': lang}], f'{folder}: incorrect language')
        social_locale = SOCIAL_LOCALES[folder]
        tags = page.attrs('meta')
        require([a.get('content') for a in tags if a.get('property') == 'og:locale'] == [social_locale],
                f'{folder}: incorrect Open Graph locale')
        alternates = [a.get('content', '') for a in tags if a.get('property') == 'og:locale:alternate']
        require(sorted(alternates) == sorted(set(SOCIAL_LOCALES.values()) - {social_locale}),
                f'{folder}: incorrect Open Graph locale alternatives')
        links = [a['href'] for a in page.anchors]
        link_sets.append({u for u in links if not u.startswith(('../', './'))})
        project_sets.append({i for i in page.ids if i.startswith('project-')})
        dates.append([a.get('datetime') for a in page.attrs('time')])
        require(len(project_sets[-1]) == 11, f'{folder}: missing project examples')
        require({'main', 'donate', 'apply', 'projects', 'reports', 'council', 'faq'} <= page.ids, f'{folder}: missing section')
        require([a.get('aria-current') for a in page.attrs('a') if a.get('href') == f'../{folder}/'] == ['page'], f'{folder}: current language not marked')
        address = re.search(r'<textarea\b[^>]*>([^<]*)</textarea>', page.source)
        require(address and address[1] == DONATION, f'{folder}: incorrect copyable donation account')
        require(len(page.attrs('textarea')) == 1 and 'readonly' in page.attrs('textarea')[0], f'{folder}: address must be read-only')
        buttons = page.attrs('button')
        require(len(buttons) == 1 and 'hidden' in buttons[0] and buttons[0].get('data-copy') == 'donation-address', f'{folder}: copy needs no-JS fallback')
        payments = [urlsplit(u) for u in links if u.startswith('web+stellar:')]
        require(len(payments) == 1, f'{folder}: expected one native wallet link')
        for url in payments:
            require(url.path == 'pay' and not url.netloc and not url.fragment and parse_qs(url.query, keep_blank_values=True) == {
                'destination': [DONATION], 'asset_code': ['EURMTL'], 'asset_issuer': [ISSUER]
            }, f'{folder}: incorrect payment (recipient, asset, amount or unexpected parameters)')
        require(f'<code>{ISSUER}</code>' in page.source, f'{folder}: incorrect visible EURMTL issuer')
        presets = [(a['href'], ' '.join(a['text'].split())) for a in page.anchors if 'MyMTLWalletBot' in a['href']]
        expected = [(f'https://t.me/MyMTLWalletBot?start=eurmtl_tfm_voice-{n}', f'{n} EURMTL') for n in (10, 50, 100)]
        require(sorted(presets) == sorted(expected), f'{folder}: incorrect Telegram preset or displayed amount')
        explorer = 'https://stellar.expert/explorer/public/account/'
        for section, account in [('donate', DONATION), ('council', COUNCIL)]:
            targets = [a['href'] for a in page.anchors if section in a['within'] and a['href'].startswith(explorer)]
            require(targets == [explorer + account], f'{folder}: incorrect {section} account reference')
        for contact in ('TFM_contact_bot', 'TFM_talk', 'tfm_voice'):
            require(f'https://t.me/{contact}' in links, f'{folder}: missing contact {contact}')
    for values, name in ((link_sets, 'links'), (project_sets, 'projects'), (dates, 'decision dates')):
        require(all(v == values[0] for v in values), f'Locale {name} differ')
    for account in (DONATION, ISSUER, COUNCIL):
        decoded = base64.b32decode(account)
        require(decoded[0] == 48 and len(decoded) == 35 and binascii.crc_hqx(decoded[:-2], 0).to_bytes(2, 'little') == decoded[-2:], 'Invalid Stellar public key checksum')

    discovery = '.well-known/agent-skills'
    index = json.loads((PUBLIC / discovery / 'index.json').read_text())
    require(index.get('$schema') == 'https://schemas.agentskills.io/discovery/0.2.0/schema.json',
            'Unexpected discovery format')
    skill_file = f'{discovery}/montelibero-tfm-info/SKILL.md'
    skills = index.get('skills', [])
    require(len(skills) == 1, 'Expected one public agent skill')
    for skill in skills:
        require(skill.get('name') == 'montelibero-tfm-info' and skill.get('description') and
                skill.get('type') == 'skill-md' and skill.get('url') == f'{ORIGIN}/{skill_file}',
                'Invalid public agent skill entry')
        digest = hashlib.sha256((PUBLIC / skill_file).read_bytes()).hexdigest()
        require(skill.get('digest') == f'sha256:{digest}', 'Public agent skill digest is missing or stale')
    for file, accounts in [('llms.txt', {DONATION, ISSUER, COUNCIL}), (skill_file, {DONATION})]:
        keys = set(re.findall(r'\bG[A-Z2-7]{55}\b', (PUBLIC / file).read_text()))
        require(keys == accounts, f'{file}: unexpected or missing public account')
    ns = {'s': 'http://www.sitemaps.org/schemas/sitemap/0.9', 'x': 'http://www.w3.org/1999/xhtml'}
    sitemap = ET.parse(PUBLIC / 'sitemap.xml')
    entries = sitemap.findall('s:url', ns)
    require({e.findtext('s:loc', namespaces=ns) for e in entries} == set(ALTERNATES.values()), 'Sitemap URLs differ from canonical pages')
    for entry in entries:
        require({e.get('hreflang'): e.get('href') for e in entry.findall('x:link', ns)} == ALTERNATES, 'Sitemap alternates differ')
    require((PUBLIC / 'CNAME').read_text().strip() == 'tfm.fund', 'Unexpected production domain')
    require('Sitemap: https://tfm.fund/sitemap.xml' in (PUBLIC / 'robots.txt').read_text(), 'Robots sitemap is missing')
    require((PUBLIC / '.nojekyll').is_file(), 'Missing .nojekyll')
    fixed = {'index.html', '404.html', 'style.css', 'llms.txt', 'robots.txt', 'sitemap.xml', 'CNAME', '.nojekyll',
             'assets/copy.js', '.well-known/agent-skills/index.json', '.well-known/agent-skills/montelibero-tfm-info/SKILL.md'}
    fixed.update(f'{folder}/index.html' for folder in LANGUAGES)
    for path in PUBLIC.rglob('*'):
        require(not path.is_symlink(), f'Publication contains a symlink: {path}')
        if path.is_file():
            rel = path.relative_to(PUBLIC).as_posix()
            media = rel.startswith('media/') and path.suffix in {'.jpeg', '.jpg', '.webp', '.svg', '.png', '.ico'}
            require(rel in fixed or media, f'Unexpected public file: {rel}')
            if media:
                require(path.resolve() in used, f'Unused public image: {rel}')
    return ERRORS


if __name__ == '__main__':
    errors = check()
    if errors:
        print('\n'.join(errors), file=sys.stderr)
        sys.exit(1)
    print('Static checks passed: 6 pages, 4 consistent locales, payment identifiers, links, assets, SEO and public AI resources.')
