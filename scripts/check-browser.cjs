// Optional keyboard regression check. Serve the extracted archive on localhost.
// With playwright-core available to Node and Chromium installed, run:
// CHROME_PATH=/path/to/chrome node scripts/check-browser.cjs http://127.0.0.1:8000/
const assert = require('node:assert/strict');
const { chromium } = require('playwright-core');

const base = new URL(process.argv[2] || 'http://127.0.0.1:8000/');
const locales = ['eng', 'rus', 'spa', 'cnr'];

async function tabTo(page, selector) {
  for (let count = 0; count < 64; count++) {
    await page.keyboard.press('Tab');
    if (await page.evaluate(match => document.activeElement.matches(match), selector)) return;
  }
  assert.fail(`Tab did not reach ${selector} on ${page.url()}`);
}

async function checkFocus(page) {
  const result = await page.evaluate(() => {
    const focused = document.activeElement;
    const box = focused.getBoundingClientRect();
    const center = document.elementFromPoint(box.x + box.width / 2, box.y + box.height / 2);
    return { visible: focused.contains(center) && focused.matches(':focus-visible'), label: focused.textContent.trim() };
  });
  assert.ok(result.visible, `Focus obscured at ${page.viewportSize().width}px on ${page.url()}: ${result.label}`);
}

async function check(browser, width) {
  const context = await browser.newContext({ javaScriptEnabled: false, viewport: { width, height: 800 } });
  try {
    const page = await context.newPage();
    for (const locale of locales) {
      await page.goto(base.href);
      await tabTo(page, `.language-grid a[href="${locale}/"]`);
      await page.keyboard.press('Enter');
      const url = new URL(`${locale}/`, base).href;
      await page.waitForURL(url);
      await tabTo(page, '.language-picker summary');
      await page.keyboard.press('Enter');
      assert.ok(await page.locator('.language-picker nav').isVisible());
      const headerLinks = page.locator('.language-picker nav a, .main-nav a');
      for (const link of await headerLinks.all()) {
        await page.keyboard.press('Tab');
        assert.ok(await link.evaluate(el => el === document.activeElement), 'Unexpected header tab order');
        await checkFocus(page);
      }
      await page.keyboard.press('Enter');
      await page.waitForURL(url + '#donate');
      await tabTo(page, '[data-stellar-link]');
      await checkFocus(page);
      await tabTo(page, '.asset-details summary');
      await page.keyboard.press('Enter');
      assert.ok(await page.locator('.asset-details code').isVisible());
      assert.ok(await page.evaluate(() => document.documentElement.scrollWidth <= innerWidth));
    }
    console.log(`Keyboard checks passed at ${width}px across four locales with JavaScript disabled.`);
  } finally {
    await context.close();
  }
}

(async () => {
  const browser = await chromium.launch({ executablePath: process.env.CHROME_PATH });
  try {
    for (const width of [320, 768, 1280]) await check(browser, width);
  } finally {
    await browser.close();
  }
})().catch(error => {
  console.error(error);
  process.exitCode = 1;
});
