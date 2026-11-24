# Third Fund of Montelibero

Four static language pages, one stylesheet and a small optional script. No PHP,
packages, database, generator or build step. Publish only `public/`.

## Preview and check

```sh
python3 -m http.server 8000 --bind 127.0.0.1 --directory public
```

Open <http://127.0.0.1:8000/>. In another terminal:

```sh
python3 scripts/check.py
node --check public/assets/copy.js
node scripts/check-copy.mjs
```

Python 3.9+ and Node 18+ run the development checks; neither is needed to serve
the website. CI uses the runtimes already on GitHub's hosted runner.

For the keyboard regression, serve an extracted Pages archive on localhost. With
`playwright-core` available to Node and `CHROME_PATH` pointing to Chromium, run
`node scripts/check-browser.cjs http://127.0.0.1:8000/`. It exercises the language
menu and donation navigation at three viewport widths with page JavaScript disabled.

## Editing

- `public/{eng,rus,spa,cnr}/index.html` are the source of truth. Keep facts,
  recipients, contacts, project sources and report dates aligned across all four.
  The checks catch structural/link drift; translations still need editorial review.
- `public/style.css` is shared. `public/assets/copy.js` only adds address copying
  and Escape/outside-click handling for the native language disclosure.
- `public/media/` contains the existing logo, five WebP/JPEG image pairs, four
  localized social cards and browser icons. Remove unused media when replacing it.
- Keep `public/llms.txt` and `public/.well-known/agent-skills/` accurate. After editing
  the public `SKILL.md`, run `shasum -a 256` on that file and set the index entry's
  `digest` to `sha256:` followed by the new hash.
- Keep the five canonical URLs and language alternatives aligned in the HTML and
  `public/sitemap.xml`. Dates describe actual records, not automatic build dates.

The root is a language selector. `/eng/`, `/rus/`, `/spa/` and `/cnr/` are retained.
Language switching, navigation, expandable content, donation links and support
requests work without site JavaScript. A compatible wallet handles the native
Stellar payment link and asks for an amount. Telegram links offer 10, 50 and 100
EURMTL; manual transfer of any amount remains available. This site never signs,
executes or holds a payment. Third-party apps have their own requirements.

GitHub Actions checks pull requests and publishes `public/` after checks pass on
`main`. It explicitly includes `.well-known/`. See [production handover](docs/production.md)
for Pages setup, domain cutover, external verification limits and rollback.

Application code retains the GPL-3.0 license in `LICENSE`.
