// Exercise optional copy behavior with clipboard access granted, denied or absent.
// No browser test dependency; the page itself is also checked without its script.
import assert from 'node:assert/strict';
import { readFileSync } from 'node:fs';
import vm from 'node:vm';

const source = readFileSync(new URL('../public/assets/copy.js', import.meta.url), 'utf8');
for (const mode of ['granted', 'denied', 'absent']) {
  let click, copied, selected = false;
  const button = {
    hidden: true,
    dataset: { copy: 'donation-address', success: 'Copied', failure: 'Copy manually' },
    addEventListener: (name, fn) => { if (name === 'click') click = fn; },
  };
  const address = { value: 'Visible address', focus() {}, select() { selected = true; } };
  const status = { textContent: '' };
  const clipboard = mode === 'absent' ? undefined : {
    async writeText(text) {
      if (mode === 'denied') throw new Error('Permission denied');
      copied = text;
    },
  };
  vm.runInNewContext(source, {
    navigator: { clipboard },
    document: {
      querySelector: selector => selector === '[data-copy]' ? button : null,
      getElementById: id => id === 'donation-address' ? address : status,
    },
  });
  assert.equal(button.hidden, mode === 'absent');
  if (click) {
    await click();
    assert.equal(status.textContent, mode === 'granted' ? 'Copied' : 'Copy manually');
    assert.equal(selected, mode === 'denied');
    assert.equal(copied, mode === 'granted' ? address.value : undefined);
  }
}
console.log('Clipboard checks passed: success, denied permission and unavailable API.');
