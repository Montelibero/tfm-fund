<?php $stellarInfoHref = wiki_ru('Stellar'); ?>
  <section id="donate" class="section">
    <div class="container">
      <h2><?= e($t['donate']['heading']) ?></h2>
      <p><?= e($t['donate']['lead']) ?></p>

      <div class="donation-methods">
        <div class="donation-method">
          <h3><?= e($t['donate']['methods']['mtl']['title']) ?></h3>
          <p><?= e($t['donate']['methods']['mtl']['body']) ?></p>
          <form class="donation-custom" action="/donate.php" method="get" aria-label="<?= e($t['donate']['methods']['mtl']['form_label']) ?>">
            <input type="hidden" name="method" value="mtl">
            <label class="sr-only" for="amount-mtl"><?= e($t['donate']['amount_label']) ?></label>
            <input id="amount-mtl" type="number" name="amount" min="1" step="1" placeholder="<?= e($t['donate']['amount_placeholder']) ?>" value="10" required>
            <button type="submit"><?= e($t['shared']['custom_amount']) ?></button>
          </form>
        </div>

        <div class="donation-method">
          <h3><?= e($t['donate']['methods']['stellar']['title']) ?></h3>
          <p><?= e($t['donate']['methods']['stellar']['body']) ?></p>
          <form class="donation-custom" action="/donate.php" method="get" aria-label="<?= e($t['donate']['methods']['stellar']['form_label']) ?>">
            <input type="hidden" name="method" value="stellar">
            <label class="sr-only" for="amount-stellar"><?= e($t['donate']['amount_label']) ?></label>
            <input id="amount-stellar" type="number" name="amount" min="1" step="1" placeholder="<?= e($t['donate']['amount_placeholder']) ?>" value="10" required>
            <button type="submit"><?= e($t['shared']['custom_amount']) ?></button>
          </form>
        </div>

        <div class="donation-method">
          <h3><?= e($t['donate']['methods']['direct']['title']) ?></h3>
          <p><?= e($t['donate']['methods']['direct']['body']) ?></p>
          <div class="wallet-address">
            <button
              type="button"
              class="address-text"
              data-copy="<?= e(STELLAR_TFM_DONATION_ACCOUNT) ?>"
              data-copy-success="<?= e($t['donate']['methods']['direct']['copied']) ?>"
              data-copy-status-id="wallet-copy-status"
              aria-describedby="wallet-copy-note wallet-copy-status"
            >
              <code><?= e(STELLAR_TFM_DONATION_ACCOUNT) ?></code>
            </button>
          </div>
          <p class="donation-note" id="wallet-copy-note"><?= e($t['donate']['methods']['direct']['note']) ?></p>
          <p class="donation-toast" id="wallet-copy-status" aria-live="polite" hidden></p>
        </div>
      </div>

      <div class="donation-info">
        <a class="btn btn--brand" href="<?= e($stellarInfoHref) ?>" target="_blank" rel="noopener noreferrer"><?= e($t['donate']['stellar_info_label']) ?></a>
      </div>
    </div>
  </section>
