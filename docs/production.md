# Production handover

The repository is prepared for a static GitHub Pages deployment at `https://tfm.fund`.
The branch has not been pushed or deployed by this implementation. Repository
settings, DNS ownership and live HTTPS cannot be established by a local commit.
Official legal review remains outside this work.

## Initial state and preservation

Work started from `main` at `452c542` (also `origin/main` and the live remote head
when inspected). There were 29 unstaged modified files, eight untracked development
and deployment files, and no staged changes. No `AGENTS.md` was found in the
repository or its parent directories. The old README favoured simple PHP and shared
partials; the owner's later request explicitly authorised a static replacement.

The complete working tree before migration, including the local drafts and ignored
notes, is preserved in `.local-backups/before-static/working-tree.tar.gz`, with
patches and Git status alongside it. This directory is ignored and outside the
publication root. Original ignored notes remain untouched. The implementation is
on `codex/static-production`; PHP files and redundant local deployment tooling were
retired after that backup. Git history preserves the committed implementation.

## Activate Pages

1. Review the three implementation commits and merge them to `main` through a pull
   request. Require the `check` job in the branch rules. Restrict changes to workflow
   files, public payment identifiers and contact links to trusted maintainers.
2. In repository **Settings → Pages**, select **GitHub Actions** as the source.
   The workflow only deploys `main`; pull requests have read-only checks. Configure
   the `github-pages` environment to allow deployments from `main` only.
3. Verify `tfm.fund` in the Montelibero organisation's Pages settings using GitHub's
   DNS TXT challenge. Set the repository's custom domain to `tfm.fund` before
   changing the web DNS records. `public/CNAME` documents the intended domain;
   custom-workflow deployments also need the domain configured in Pages settings.
4. Run the workflow on `main`. Keep a copy of the current server release and DNS
   records, then follow GitHub's current DNS instructions for an apex domain and
   optional `www` redirect. Remove obsolete web A/AAAA records, preserve unrelated
   records, and do not create wildcard records. Keep the old server available
   during DNS propagation and certificate issuance.
5. Enable **Enforce HTTPS** when the certificate is ready. Verify the deployed
   content and redirects listed below before retiring the old PHP host.

Use GitHub's [custom workflow instructions](https://docs.github.com/en/pages/getting-started-with-github-pages/using-custom-workflows-with-github-pages),
[domain verification](https://docs.github.com/en/pages/configuring-a-custom-domain-for-your-github-pages-site/verifying-your-custom-domain-for-github-pages)
and [DNS configuration](https://docs.github.com/en/pages/configuring-a-custom-domain-for-your-github-pages-site/managing-a-custom-domain-for-your-github-pages-site).
Do not rely on DNS addresses copied into an old runbook.

## What was checked locally

- All six HTML documents: structure, titles, language alternatives, canonical URLs,
  local links and fragments, image dimensions, accessible label references and CSP.
- Four locales at 320, 768 and 1280 pixels: no horizontal overflow; no browser script
  errors. Native language switching, donation navigation, asset disclosures and
  support navigation also worked with site scripts blocked by a response CSP.
- Exact Stellar public keys and checksums, EURMTL issuer, absence of an amount in the
  native wallet link, Telegram presets, identical project/contact links and decision
  dates across translations. Clipboard success, permission denial and missing API.
- Public AI discovery and its content hash. Only `public/` is packaged. The standard
  Pages upload action excludes dot directories, so this workflow creates its own
  tar archive and checks that both `.well-known/` files and `llms.txt` are present.

These checks do not execute transactions, prove wallet compatibility on every
platform, or run GitHub's hosted deployment. Test an installed wallet's handoff and
MTL Wallet's displayed recipient and amount before launch, without confirming a
payment. Telegram is the only organisation contact confirmed by the owner.

## Content and payment references

The payment account and accepted assets were cross-checked against the existing
site and the [community overview](https://monte.wiki/ru/Третий_фонд_Монтелиберо), used
as background. The EURMTL reference links to the [exact issuer on StellarExpert](https://stellar.expert/explorer/public/asset/EURMTL-GACKTN5DAZGWXRWB2WLM6OPBDHAMT6SJNGLJZPQMEZBUR4JUGBX2UK7V-2).
The separate Council account is linked to the [fund rules](https://github.com/3TFM/Notary/blob/main/fund/002_Statute.md).
The native URI follows [Stellar SEP-0007](https://github.com/stellar/stellar-protocol/blob/master/ecosystem/sep-0007.md),
whose `pay` operation allows the wallet to ask for an omitted amount.

Project examples and the three dated records were retained from the supplied
repository content. Direct Telegram previews confirmed all three dates (30 April
2026, 27 February 2026 and 31 December 2025) and transaction references to the
corresponding crowdfunding projects. These are transaction notifications, so the
page describes them as contribution records, not decision announcements. Project
descriptions remain selected historical examples, not a complete audit or a claim
to show the latest activity. Check original messages when updating these examples.
No live balances, current Council roster, response-time promises or language-service
promises are published. Native speakers should review future translation changes.

## Production smoke check and rollback

After deployment, check `/`, the four locale paths, `/llms.txt`,
`/.well-known/agent-skills/index.json`, the linked `SKILL.md`, `/robots.txt`,
`/sitemap.xml`, image URLs and a deliberately missing path (HTTP 404 with language
links). Check HTTPS, any `www` redirect, and that the server does not expose
`/.git/config`, `/README.md`, `/scripts/check.py` or `/.local-backups/`.

Core links and assets are relative and also work on a GitHub project preview path.
Canonical/AI/sitemap URLs intentionally name `tfm.fund`. The 404 page uses root-relative
links because it can appear at any depth; preview it on a domain-root server.
The old `.php` URLs are retired and return 404; old directory links remain valid.
GitHub Pages cannot interpret old PHP query strings or provide custom server redirects.

The site stores no cookies or browser data, loads no external fonts, analytics or
scripts, and sends no background requests. All wallet, Telegram and reference visits
are user-initiated links. GitHub may log IP addresses for security; external services
have their own policies. HTML CSP restricts resources and forms, and referrer metadata
suppresses outbound referrers. Pages controls HTTP response headers: HTML meta cannot
supply `frame-ancestors`, HSTS or other header-only policies. There is no sensitive
in-page form, account session or transaction signing surface.

For a content regression after cutover, revert the faulty static-site commit through
a reviewed PR and let checks redeploy `main`. Do not redeploy a PHP-era commit to
Pages. For a hosting rollback, restore the saved DNS records and old server release.
Keep GitHub's domain verification TXT record, and never leave Pages DNS pointing at
a disabled or unclaimed site. Review wallet/contact links and pinned GitHub Actions
when public references or upstream security advisories change.
