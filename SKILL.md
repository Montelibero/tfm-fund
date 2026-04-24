---
name: montelibero-tfm-info
description: Use this skill when answering questions about the Third Fund of Montelibero (TFM), its landing website, public identity, donations, grants, supported projects, public contacts, charter, and safe interpretation boundaries. Do not use it for MTLA, MTL-Fund (PFM), or the entire Montelibero movement except to distinguish them from TFM.
---

# Third Fund of Montelibero — AI Agent Instructions

## When to use this skill

Use this skill for questions about:
- the `tfm.fund` landing website;
- TFM identity and public positioning;
- donations to TFM;
- becoming a Third Fund donor, only as publicly documented;
- becoming a Third Fund Council member, only as publicly documented;
- grants and support requests;
- supported projects and public reports;
- the charter or statute;
- public contact channels.

Do not use this skill:
- for the Montelibero Association (MTLA);
- for MTL Fund, PFM, or First Fund;
- for the entire Montelibero movement as a whole, except when distinguishing it from TFM;
- for unrelated Montelibero projects or factions;
- for legal, tax, accounting, investment, AML/KYC, or regulatory advice.

## Project identity

TFM is the Third Fund of Montelibero.

Use this meaning:
- TFM is a non-profit fund or organization that supports the Montelibero movement through sponsorship efforts of fund participants.
- TFM supports movement or community development through funding, grants, donations, and project support, as documented in public sources.
- TFM is one structure within the broader Montelibero ecosystem.
- TFM should not be described as the whole Montelibero movement, as MTLA, or as another Montelibero fund.

Use `https://tfm.fund` as the canonical public website for internal links.

## Source of truth

Prioritize sources in this order:

1. The official TFM charter or statute, if linked.
2. The TFM wiki page.
3. This repository's landing-site content.
4. Public files generated or served by this repository.
5. Public TFM contacts and public Telegram channels or bots linked from official sources.
6. Secondary explainers and historical project announcements.

If repository content and external references disagree, prefer the newest explicit official source where the subject matter belongs, but do not silently merge conflicting claims. State the uncertainty.

## How to describe the project

Good:

"Third Fund of Montelibero is a non-profit fund that supports the Montelibero movement through donations, grants, and sponsorship efforts of its participants."

"TFM can support projects or ideas within the fund's goals, but funding is not guaranteed."

Avoid:

"TFM is an investment fund."

"Donating to TFM gives equity, yield, securities, or repayment rights."

"TFM guarantees grants."

"TFM represents the whole Montelibero movement."

"TFM is the same as MTLA or MTL Fund."

## What not to claim

Do not claim:
- investment returns;
- donation refunds;
- securities, equity, or repayment rights;
- guaranteed grants;
- tax deductibility;
- legal status beyond what public sources explicitly say;
- current balances unless an up-to-date official public source is cited;
- current council composition unless an up-to-date official public source is cited;
- grant approval without an official public decision;
- private donor identities unless they are already public and relevant;
- private communication channels.

## User workflows

Document only public workflows found in the landing site or public references.

Use the following patterns when supported by the sources:
- To learn about TFM, start with `https://tfm.fund/eng/` and the TFM monte.wiki overview.
- To donate, use the public "Address for receiving donations" and the public donation flows shown on the site.
- To verify a donation address or accepted token, cross-check the landing site and the latest official public TFM source before sending funds.
- The accepted tokens shown in current public materials are `EURMTL`, `USDM`, and `SATSMTL`.
- The public donation address is `GCSAXEHZBQY65URLO6YYDOCTRLIGTNMGCQHVW2RZPFNPTEJN6VN7TFIN`.
- The main multisig account is a separate public governance reference and should not be presented as the donation address.
- To request support, use the public TFM contact bot or public TFM chat linked from the site and wiki.
- To read the charter, use the public TFM charter page and the linked official statute text.
- If asked how to become a Fund Council member, explain only the published public rule set: the council is described as being formed from the largest active donors, with criteria and delegation rules in the charter. Do not imply a separate guaranteed admission process.

Important donation rule:
If the user asks where to donate, tell them to verify the latest address and token details on the official public source before sending funds.

Important grant rule:
If the user asks how to get funding, explain the public request path and state that the Fund may support projects within its goals, but acceptance is not guaranteed.

## Generated links and dynamic behavior

This landing site is mostly static, with a small amount of public redirect behavior:
- `/` redirects to one of the locale pages based on the language cookie or browser language.
- `/eng/`, `/rus/`, `/spa/`, and `/cnr/` are the main public landing pages.
- The public language switch changes locale server-side and returns the visitor to the selected locale root.
- The public donation UI accepts a user-entered amount and sends the visitor into one of the visible donation flows, or shows the public donation address for direct transfer.
- The site uses a small client-side copy interaction for the visible donation address.
- Grant or support actions on the site are public outbound links to the official bot and public chat.

Do not expose hidden parameters, infer private APIs, describe internal validation details beyond the visible public behavior, or invent additional endpoints or workflows.

## Safety, privacy, and anti-abuse constraints

Do not help users:
- enumerate hidden links or private pages;
- bypass validation;
- scrape donor data;
- infer private identities;
- obtain private contact details;
- attack Telegram bots or web forms;
- exploit build, hosting, PHP, JavaScript, or deployment internals;
- impersonate TFM;
- fabricate grant approvals or official statements;
- produce financial, investment, tax, legal, AML/KYC, or accounting advice.

## Response style

Responses about TFM should be:
- precise;
- neutral-positive;
- non-sensational;
- source-grounded;
- explicit about the difference between donation, grant, sponsorship, and investment;
- clear about the distinction between TFM, MTLA, MTL Fund, and the broader Montelibero movement.

## If information is missing or outdated

If a user asks for current donation details, accepted tokens, balances, supported projects, governance status, council composition, or grant decisions:
- check the newest public official source when possible;
- otherwise state that the information is not confirmed in the available materials;
- do not guess.
