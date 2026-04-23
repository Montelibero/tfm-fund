(function () {
  function legacyCopy(text) {
    if (typeof document.execCommand !== 'function') {
      return false;
    }

    var textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.setAttribute('readonly', '');
    textarea.style.position = 'absolute';
    textarea.style.left = '-9999px';
    document.body.appendChild(textarea);
    textarea.select();

    var copied = false;

    try {
      copied = document.execCommand('copy');
    } catch (error) {
      copied = false;
    }

    document.body.removeChild(textarea);

    return copied;
  }

  async function copyText(text) {
    if (navigator.clipboard && typeof navigator.clipboard.writeText === 'function') {
      try {
        await navigator.clipboard.writeText(text);
        return true;
      } catch (error) {
        return legacyCopy(text);
      }
    }

    return legacyCopy(text);
  }

  var buttons = document.querySelectorAll('[data-copy]');

  buttons.forEach(function (button) {
    var statusId = button.getAttribute('data-copy-status-id');
    var status = statusId ? document.getElementById(statusId) : null;
    var timeoutId = 0;

    button.addEventListener('click', async function () {
      var text = button.getAttribute('data-copy') || '';
      var copied = await copyText(text);

      if (!copied || !status) {
        return;
      }

      status.textContent = button.getAttribute('data-copy-success') || 'Copied';
      status.hidden = false;

      window.clearTimeout(timeoutId);
      timeoutId = window.setTimeout(function () {
        status.hidden = true;
        status.textContent = '';
      }, 2000);
    });
  });
}());
