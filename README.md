# Montelibero Third Fund landing

Simple multilingual landing page for the Montelibero Third Fund.

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
- `robots.txt`, `sitemap.xml`, `llms.txt`, `site.webmanifest` — crawl/share metadata.

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

1. Copy `partials/strings/eng.php` to `partials/strings/xxx.php` (ISO 639-3 lang code) and translate every string.
2. Create `xxx/index.php` by copying an existing locale entry point such as `eng/index.php`.
3. Set `$locale = 'xxx';` and include `partials/strings/xxx.php`.
4. Register the locale in `partials/data/locales.php`.
   Add `path`, `html_lang`, `og_locale`, and `label`.
   This file is the shared source for language switcher links and `head.php` `hreflang` / OG locale tags.
5. Register the locale in the root allowlists:
   `index.php` for locale negotiation.
   `set-lang.php` for safe manual switching.
6. Add `media/og-xxx.jpg` for social sharing.
7. Update `sitemap.xml` so the new locale is included in sitemap and alternate links.

If you add a locale, prefer add it everywhere in one pass. The page structure is shared; only strings and locale metadata should vary.

## Add a supported project or grant

One project should be one data record plus translations.

1. Add the project record to `partials/data/projects.php`.
   Set a stable `id`, image filename, `width`, `height`, and destination `href`.
2. Add the localized copy for that `id` in all four files:
   `partials/strings/eng.php`
   `partials/strings/rus.php`
   `partials/strings/spa.php`
   `partials/strings/cnr.php`
3. Add the image pair to `media/`:
   `cover-xxx.webp`
   `cover-xxx.jpeg`
4. Keep the image dimensions in `partials/data/projects.php` aligned with the actual file.

The shared project template will render the new card automatically.

## Image preferencies

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
