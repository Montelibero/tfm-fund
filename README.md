# Third Fund of Montelibero

Four static language pages, shared CSS and optional JavaScript. No PHP, packages,
database or build step. Publish only `public/`.

## Preview

```sh
python3 -m http.server 8000 --bind 127.0.0.1 --directory public
```

Open http://127.0.0.1:8000/. Language choices, navigation, project links, grant
requests and donations work without site JavaScript. The native Stellar payment
link lets a compatible wallet ask for any amount; manual transfers always remain
available. Telegram has a prefilled EURMTL donation link. No payment is signed or
processed by this website.

The root page is a language selector. Existing `/eng/`, `/rus/`, `/spa/`, `/cnr/`
paths are retained. Old PHP endpoints are retired.

All website content, including `llms.txt` and `.well-known/agent-skills/`, lives in
`public/`. Edit the four HTML files together when changing shared facts or links.
Application code retains the GPL-3.0 license in `LICENSE`.
