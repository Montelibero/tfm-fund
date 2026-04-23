<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/partials/headers.php';
require_once __DIR__ . '/partials/helpers.php';

send_security_headers([
  'cache_control' => 'no-store',
]);

function donate_norm_lang(string $code): string
{
  $code = strtolower(trim($code));
  if (preg_match('/^[a-z]{2,3}/', $code, $match) === 1) {
    return $match[0];
  }

  return $code;
}

function donate_locale_from_accept(?string $header): string
{
  if (!$header) {
    return 'eng';
  }

  $candidates = [];
  foreach (explode(',', $header) as $part) {
    $part = trim($part);
    if ($part === '') {
      continue;
    }

    $q = 1.0;
    if (stripos($part, 'q=') !== false) {
      if (preg_match('/q=([0-9.]+)/i', $part, $match) === 1) {
        $q = (float) $match[1];
      }
      $lang = trim(explode(';', $part, 2)[0]);
    } else {
      $lang = $part;
    }

    $candidates[] = [
      'lang' => donate_norm_lang($lang),
      'q' => $q,
    ];
  }

  usort($candidates, static fn(array $a, array $b): int => $b['q'] <=> $a['q']);

  foreach ($candidates as $candidate) {
    $lang = $candidate['lang'];
    if ($lang === 'ru') {
      return 'rus';
    }
    if (in_array($lang, ['cnr', 'sr', 'bs', 'hr', 'sh'], true)) {
      return 'cnr';
    }
    if ($lang === 'es') {
      return 'spa';
    }
  }

  return 'eng';
}

function donate_detect_locale(array $locales): string
{
  $cookieLang = $_COOKIE['lang'] ?? null;
  if (is_string($cookieLang) && isset($locales[$cookieLang])) {
    return $cookieLang;
  }

  $accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? null;
  $locale = donate_locale_from_accept(is_string($accept) ? $accept : null);

  return isset($locales[$locale]) ? $locale : 'eng';
}

function donate_render_error(array $locales, string $locale, string $title, string $message, string $backLabel): never
{
  http_response_code(400);
  header('Content-Type: text/html; charset=UTF-8');

  $errorLang = $locales[$locale]['html_lang'];
  $backHref = $locales[$locale]['path'] . '#donate';
  $errorTitle = $title;
  $errorMessage = $message;

  require __DIR__ . '/partials/error.php';
  exit;
}

$localeData = require __DIR__ . '/partials/data/locales.php';
$locales = $localeData['items'];
$locale = donate_detect_locale($locales);
$t = require __DIR__ . '/partials/strings/' . $locale . '.php';

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
