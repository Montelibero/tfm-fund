# Security policy

## Supported version

Security fixes are applied to the current production deployment and the `main` branch. This repository has no long-lived release branches.

## Report a vulnerability

Do not publish an exploitable issue or sensitive deployment detail in a GitHub issue or the public TFM chat. Contact the Fund Council through the private [TFM contact bot](https://t.me/TFM_contact_bot) and include:

- the affected URL and behavior;
- reproducible steps that do not move funds or access other people's data;
- the likely impact;
- any suggested mitigation;
- a safe way to contact you for follow-up.

The project is community-maintained and does not promise a fixed response SLA. Maintainers should acknowledge credible reports privately, preserve evidence, assess production exposure, and prioritize containment before public disclosure.

## Safe research boundaries

Please do not:

- send real or test transactions to accounts you do not control;
- target Telegram, wallet providers, block explorers, hosting infrastructure, or other third parties;
- access, retain, or publish personal data;
- use denial-of-service, automated abuse, social engineering, or destructive payloads;
- publish a vulnerability before maintainers have had a reasonable opportunity to mitigate it.

The site is static: it has no authentication, database, uploads, PHP endpoints or payment execution. Publish only public/. Wallet links and public donation identifiers require careful review. Keep private files and credentials outside the deployment artifact.
