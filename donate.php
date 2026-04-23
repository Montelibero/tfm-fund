<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/partials/headers.php';
require_once __DIR__ . '/partials/helpers.php';

send_security_headers([
  'cache_control' => 'no-store',
]);

function donate_render_error(array $locales, string $locale, string $title, string $message, string $backLabel): never
{
  http_response_code(400);
  header('Content-Type: text/html; charset=UTF-8');

  $errorLang = $locales[$locale]['html_lang'];
  $backHref = (locale_path($locale, $locales) ?? '/eng/') . '#donate';
  $errorTitle = $title;
  $errorMessage = $message;

  require __DIR__ . '/partials/error.php';
  exit;
}

$localeData = locale_data();
$locales = $localeData['items'];
$locale = locale_detect_from_request($locales, $localeData['default']);
$t = locale_strings($locale);

$method = $_GET['method'] ?? '';
$amount = trim((string) ($_GET['amount'] ?? ''));

if (!in_array($method, ['mtl', 'stellar'], true)) {
  donate_render_error(
    $locales,
    $locale,
    $t['error']['title'],
    $t['error']['invalid_method'],
    $t['error']['back_to_donate']
  );
}

if (preg_match('/^\d{1,7}(\.\d{1,7})?$/', $amount) !== 1) {
  donate_render_error(
    $locales,
    $locale,
    $t['error']['title'],
    $t['error']['invalid_amount'],
    $t['error']['back_to_donate']
  );
}

$amountValue = (float) $amount;
if ($amountValue <= 0 || $amountValue > 1000000) {
  donate_render_error(
    $locales,
    $locale,
    $t['error']['title'],
    $t['error']['invalid_amount'],
    $t['error']['back_to_donate']
  );
}

if ($method === 'mtl') {
  $url = TG_WALLET_BOT_BASE . 'eurmtl_tfm_voice-' . $amount;
  header('Location: ' . $url, true, 302);
  exit;
}

if ($method === 'stellar') {
  $stellar = 'web+stellar:pay?destination=' . STELLAR_TFM_DONATION_ACCOUNT
    . '&amount=' . $amount
    . '&asset_code=EURMTL'
    . '&asset_issuer=' . EURMTL_ISSUER
    . '&memo=Donate+by+site'
    . '&memo_type=MEMO_TEXT';
  $redirect = MTL_REDIRECT_BASE . rawurlencode($stellar);
  header('Location: ' . $redirect, true, 302);
  exit;
}
