// Optional conveniences. All navigation and payment links are ordinary HTML.
const copyButton = document.querySelector('[data-copy]');
if (copyButton && navigator.clipboard?.writeText) {
  const address = document.getElementById(copyButton.dataset.copy);
  const status = document.getElementById('copy-status');
  copyButton.hidden = false;
  copyButton.addEventListener('click', async () => {
    status.textContent = '';
    try {
      await navigator.clipboard.writeText(address.value);
      status.textContent = copyButton.dataset.success;
    } catch {
      address.focus();
      address.select();
      status.textContent = copyButton.dataset.failure;
    }
  });
}

const languagePicker = document.querySelector('[data-disclosure]');
if (languagePicker) {
  document.addEventListener('click', (event) => {
    if (!languagePicker.contains(event.target)) languagePicker.open = false;
  });
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && languagePicker.open) {
      if (languagePicker.contains(document.activeElement)) {
        languagePicker.querySelector('summary').focus();
      }
      languagePicker.open = false;
    }
  });
}
