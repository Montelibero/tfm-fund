(function () {
  function enhanceDisclosures() {
    var disclosures = document.querySelectorAll('[data-disclosure]');
    var menu = document.querySelector('[data-mobile-menu]');

    if (!disclosures.length) {
      return;
    }

    function closeDisclosure(disclosure, restoreFocus) {
      if (!disclosure.hasAttribute('open')) {
        return;
      }

      disclosure.removeAttribute('open');

      if (!restoreFocus) {
        return;
      }

      var summary = disclosure.querySelector('summary');

      if (summary && typeof summary.focus === 'function') {
        try {
          summary.focus({ preventScroll: true });
        } catch (error) {
          summary.focus();
        }
      }
    }

    document.addEventListener('click', function (event) {
      disclosures.forEach(function (disclosure) {
        if (!disclosure.contains(event.target)) {
          closeDisclosure(disclosure, false);
        }
      });
    });

    document.addEventListener('keydown', function (event) {
      if (event.key !== 'Escape') {
        return;
      }

      var activeElement = document.activeElement;

      disclosures.forEach(function (disclosure) {
        closeDisclosure(disclosure, disclosure.contains(activeElement));
      });
    });

    if (!menu) {
      return;
    }

    menu.addEventListener('click', function (event) {
      var target = event.target;
      var link = target && typeof target.closest === 'function'
        ? target.closest('a[href^="#"]')
        : null;

      if (!link || !menu.contains(link)) {
        return;
      }

      closeDisclosure(menu, true);
    });
  }

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

  enhanceDisclosures();

  var copyTargets = document.querySelectorAll('[data-copy]');

  copyTargets.forEach(function (copyTarget) {
    var statusId = copyTarget.getAttribute('data-copy-status-id');
    var status = statusId ? document.getElementById(statusId) : null;
    var timeoutId = 0;

    copyTarget.addEventListener('click', async function () {
      var text = copyTarget.getAttribute('data-copy') || '';

      if (typeof copyTarget.focus === 'function') {
        copyTarget.focus();
      }

      if (typeof copyTarget.select === 'function') {
        copyTarget.select();
      }

      var copied = await copyText(text);

      if (!copied || !status) {
        return;
      }

      status.textContent = copyTarget.getAttribute('data-copy-success') || 'Copied';
      status.hidden = false;

      window.clearTimeout(timeoutId);
      timeoutId = window.setTimeout(function () {
        status.hidden = true;
        status.textContent = '';
      }, 2000);
    });
  });
}());
