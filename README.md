# Third Fund of Montelibero landing

Simple multilingual landing page for the Third Fund of Montelibero.

Principles:

- Simple by default: HTML + CSS, low PHP, minimal JS.
- Works without JS: language switch, navigation, and donation flows must still work.
- One source of truth: shared markup and data live in PHP partials.
- Four equal locales: `eng`, `rus`, `spa`, `cnr`.
- Privacy by default: no analytics, no trackers, only the functional `lang` cookie.

## Repo layout

- `index.php` — root locale negotiator. Redirects `/` to one of `/eng/`, `/rus/`, `/spa/`, `/cnr/`.
- `set-lang.php` — server-side locale setter. Saves the `lang` cookie and redirects to a safe locale URL.
- `donate.php` — validates donation amount and redirects to the selected payment flow.
- `config.php` — shared constants: fund accounts, external links, site URL, founding date.
- `partials/` — shared page templates and helpers.
- `partials/strings/*.php` — per-locale copy.
- `partials/data/locales.php` — locale metadata, paths, labels, `hreflang`/Open Graph locale values.
- `partials/data/projects.php` — supported project list, images, dimensions, target links.
- `partials/data/fund.php` — shared governance, reports, and CTA links.
- `eng/index.php`, `rus/index.php`, `spa/index.php`, `cnr/index.php` — thin locale entry points.
- `style.css` — one shared stylesheet.
- `assets/copy.js` — optional progressive enhancement for click-to-copy wallet address.
- `media/` — hero image, project covers, logo, icons, OG images.
- `robots.txt`, `sitemap.xml`, `llms.txt`, `.well-known/agent-skills/`, `site.webmanifest` — crawl/share/agent metadata.

## URL scheme

- `/` — detects locale from `lang` cookie first, then `Accept-Language`, then redirects.
- `/eng/`, `/rus/`, `/spa/`, `/cnr/` — locale pages.
- `/set-lang.php?lang=spa&return=/spa/` — sets locale cookie server-side.
- `/donate.php?method=stellar&amount=10` — validated redirect endpoint for donation flows.

Locale pages are cacheable. The root redirect and redirect endpoints are not.

## Run locally

From the repo root:

```sh
php -S localhost:8000
```

Then open `http://localhost:8000/`.

## Add a locale

1. Copy `partials/strings/eng.php` to `partials/strings/xxx.php` (internal locale code by ISO 639-3, e.g. `eng` / `cnr`) and translate every string.
2. Create `xxx/index.php` by copying `eng/index.php`. Change only the locale argument, for example:
   `render_locale_page('xxx');`
   Routing and negotiation read allowed locales from `partials/data/locales.php`; you do not edit `index.php` or `set-lang.php` lists by hand.
3. Register the locale in `partials/data/locales.php`: `path`, `html_lang`, `hreflang`, `og_locale`, `accept` aliases, and `label`.
   This file drives the language switcher, `hreflang`, and Open Graph alternate locales in `partials/head.php`.
4. Add `media/og-xxx.jpg` for social sharing.
5. Update `sitemap.xml` so the new locale appears as its own `<url>` and in every `<xhtml:link>` alternate set.

If you add a locale, add it everywhere in one pass. The page structure is shared; only strings and locale metadata should vary.

## Add a Supported projects card

The **Supported projects** block (`partials/projects.php`) is **not** the same as the short **Reports and recent grants** list; the latter lives in `partials/data/fund.php` (see the next section).

For each new card:

1. Append a record to **`partials/data/projects.php`** (array order = order on the page):
   - **`id`** — stable key. Must exist under `projects.items` in **all four** `partials/strings/{eng,rus,spa,cnr}.php`, each with **`title`** and **`body`** (card heading and blurb).
   - **`image`** — JPEG filename in `media/` (e.g. `cover-example.jpeg`). The template builds the WebP path by swapping the extension to `.webp`, so ship **`media/cover-example.webp`** with the same basename.
   - **`width`**, **`height`** — real pixel dimensions of that image (used for layout and CLS).
   - **`href`** — URL opened when the visitor follows “Details” / the whole card.

2. Add `projects.items['your-id']` with `title` and `body` in every locale file above.

3. Optimize and commit the **JPEG + WebP** pair under `media/`.

If any locale is missing `projects.items` for an `id`, that card is **omitted** and PHP logs a line (`[tfm-fund] Missing or invalid projects.items key: …`) so incomplete translations are visible in server logs.

## Update Reports and recent grants

The **Reports and recent grants** section (`partials/reports.php`) uses **`partials/data/fund.php`** for structure and links, and **`reports.items`** in each `partials/strings/*.php` for the visible label of each row.

1. In **`partials/data/fund.php`**:
   - **`updated_date`** — `Y-m-d` string shown beside the section “Updated” label; bump it when you change the list meaningfully.
   - **`links.reports`** — URL for the main CTA (“Open the full public record” / localized equivalent), usually the public wiki overview for the fund.
   - **`reports`** — ordered list of entries. Each entry supports:
     - **`id`** — must match a key in `reports.items` in **all four** locale string files. The value there is a **single string** (the link text), not `title`/`body`.
     - **`href`** — URL for that row (often a Telegram announcement).
     - **`date`** (optional) — `Y-m-d`; when present, a `<time>` is rendered before the link.

2. Add or update `reports.items['your-id']` in `eng.php`, `rus.php`, `spa.php`, and `cnr.php` for every `id` you reference.

3. Prefer a consistent ordering (e.g. newest grants first).

If an `id` appears in `fund.php` but is missing from a locale’s `reports.items`, that row is **skipped** and PHP logs (`[tfm-fund] Missing or invalid reports.items key: …`), same behavior as Supported projects.

## Image preferences

- Maximum long edge: `1600px`.
- Keep every JPEG fallback at `<= 300 KB`.
- Store both formats: `WebP` first, `JPEG` fallback.
- Always provide real `width` and `height` in `partials/data/projects.php`.
- Hero and project images should be optimized before committing.

Current templates expect:

- hero image: `media/cover.webp` + `media/cover.jpeg`
- project images: `media/cover-*.webp` + `media/cover-*.jpeg`
- per-locale OG image: `media/og-<locale>.jpg`

## Notes

- JS is optional. If `assets/copy.js` fails or JS is disabled, the site must remain usable.
- Shared markup lives in `partials/`; avoid copying full HTML between locales.
- If you change public URLs or add a locale, keep `sitemap.xml`, `robots.txt`, and metadata in sync.
