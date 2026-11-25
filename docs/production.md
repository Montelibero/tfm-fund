# Pages cutover for tfm.fund

## Candidate artifact

The `check` job packages a clean checkout on both pull requests and `main`.
Download the **github-pages** artifact from the run for the revision under review.
It contains a single `artifact.tar`. Only `main` can reach the deployment job.
To reproduce the archive from the repository root on Linux with GNU tar:

```sh
RUNNER_TEMP=$(mktemp -d)
python3 scripts/check.py
tar --dereference --hard-dereference --directory public -cf "$RUNNER_TEMP/artifact.tar" .
python3 scripts/check-archive.py "$RUNNER_TEMP/artifact.tar"
```

The candidate contains 32 public files. They comprise the selector, four locales
and 404 page, shared CSS and copy script, 17 media files, domain and crawler
metadata, `llms.txt`, and the discovery index and Markdown guide under
`/.well-known/agent-skills/`. The archive check compares every file with the
checked publication tree and rejects extra members and links. CI serves the
extracted tar to Chromium. For nested 404 recovery, it serves the archived
error page at a missing URL and follows all four language links by keyboard.

The qualification pass exercised English, Russian, Spanish and Montenegrin at
320, 768 and 1280 CSS pixels with page JavaScript disabled. It covered language
switching, section links, disclosures, manual address selection and outbound
wallet and support links. All four locales also passed a touch-navigation check
in WebKit at 320 × 568. A local server returned the archived 404 page for a
nested missing URL. Its recovery links assume the production domain root.
Canonical, sitemap and social URLs name `https://tfm.fund/` even in a preview.

## Payment and content sign-off

| Reference | Expected value |
| --- | --- |
| Donation recipient on Stellar mainnet | `GCSAXEHZBQY65URLO6YYDOCTRLIGTNMGCQHVW2RZPFNPTEJN6VN7TFIN` |
| EURMTL issuer | `GACKTN5DAZGWXRWB2WLM6OPBDHAMT6SJNGLJZPQMEZBUR4JUGBX2UK7V` |
| Council multisig, for governance | `GDOJK7UAUMQX5IZERYPNBPQYQ3SHPKGLF5MBUKWLDL2UV2AY6BIS3TFM` |

The recipient and Council account match the charter and the previous site's
configuration. The issuer publishes the same EURMTL key. Sunce Wallet 1.11.1's
parser read the archived SEP-7 link as a mainnet EURMTL payment to the address
above with the amount unset. Chrome offered to open Sunce on macOS. The OS
opened the wallet, but the test did not establish a visible payment preview.
[Fund statute](https://github.com/3TFM/Notary/blob/main/fund/002_Statute.md) ·
[Issuer metadata](https://mtlf.me/.well-known/stellar.toml) ·
[Legacy configuration](https://github.com/Montelibero/tfm-fund/blob/452c542/config.php) ·
[SEP-7](https://github.com/stellar/stellar-protocol/blob/master/ecosystem/sep-0007.md)

- [ ] Open the native link in a compatible installed wallet. Verify mainnet,
  the full recipient and issuer above, and an editable amount in the payment
  form. Cancel. Hold cutover until a maintainer can verify the preview.
- [ ] Open each Telegram preset in MyMTLWalletBot. The public handoff and the old
  site agree on `eurmtl_tfm_voice-10`, `-50` and `-100`. The bot resolves the
  username internally. Verify the resolved recipient, EURMTL asset and displayed
  amount for each, then cancel before signing or confirming. Hold cutover if an
  identifier differs or cannot be verified. [Legacy redirect](https://github.com/Montelibero/tfm-fund/blob/452c542/donate.php) · [Wallet handler](https://github.com/attid/MyMTLWalletBot/blob/42ab2947cd549ea3990d7b6e7265d56244d9edc2/bot/routers/send.py#L358-L403)
- [ ] Confirm the Council still accepts the three listed assets and controls
  `TFM_contact_bot`, `TFM_talk` and `tfm_voice`. Their public destinations match
  the fund overview. The site links directly to payment requests only for EURMTL.
  [Fund overview and contacts](https://monte.wiki/ru/Третий_фонд_Монтелиберо)
- [ ] Approve the public AI guide and inherited `ai-train=yes` in `robots.txt`.
  The fund reports support a mapping grant in Montenegro, a LibertyCon booth
  and four MTL-TV episodes. A Bar-specific open-data grant, festival speaker
  costs and printing of *Free Private Cities* still need sources for publication.
  [Mapping grant](https://t.me/tfm_voice/18) · [Conference and TV report](https://t.me/tfm_voice/10)

## Switch traffic

1. Record the current DNS web records and TTLs, identify the serving PHP release
   and verify it can be restored. Keep that host available through propagation.
2. Review the qualification changes into `static-production`. Configure Pages
   to use GitHub Actions and restrict the `github-pages` environment to `main`.
   Require the `check` job, merge the reviewed candidate into `main` and confirm
   a successful deployment of that revision.
3. Verify the domain for the Montelibero organisation with GitHub's TXT record.
   Set the repository's custom domain to `tfm.fund` before changing web DNS.
   The archived `CNAME` records intent. Apply the current apex and optional
   `www` records from GitHub, preserving unrelated DNS records.
   [Domain verification](https://docs.github.com/en/pages/configuring-a-custom-domain-for-your-github-pages-site/verifying-your-custom-domain-for-github-pages) · [Custom domain setup](https://docs.github.com/en/pages/configuring-a-custom-domain-for-your-github-pages-site/managing-a-custom-domain-for-your-github-pages-site)
4. Once the certificate is ready, enable **Enforce HTTPS**. Check DNS, certificate
   and redirects from outside the old host. Fetch `/`, all four locales, their
   images, `/robots.txt`, `/sitemap.xml`, `/llms.txt`, and both discovery files.
   Verify the index serves `application/json`, the guide serves `text/markdown`
   or `text/plain`, and the guide's SHA-256 matches the index. A nested
   missing URL and the retired `/donate.php` must return **HTTP 404** with working
   language links. Check the same status for `/README.md` and `/scripts/check.py`.

## Roll back

- **Site regression** — revert the affected static changes in a reviewed PR to
  `main`, rerun the workflow and repeat the public smoke checks.
- **Hosting, DNS or TLS failure** — restore the saved web records to the verified
  PHP host. Check DNS, HTTPS, locales and the old donation handoff without sending
  funds. Keep the domain claimed on Pages until cached records have expired and
  retain the organisation's verification TXT record.
