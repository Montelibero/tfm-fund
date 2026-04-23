<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/partials/headers.php';

send_security_headers([
  'cache_control' => 'no-store',
]);

$method = $_GET['method'] ?? '';
$amount = (string) ($_GET['amount'] ?? '');

if ($method === 'mtl') {
  // Keep only digits for MTL Wallet
  $amount = preg_replace('/[^0-9]/', '', $amount);
  $url = TG_WALLET_BOT_BASE . 'eurmtl_tfm_voice-' . $amount;
  header('Location: ' . $url, true, 302);
  exit;
}

if ($method === 'stellar') {
  // Allow digits and dot for Stellar amount
  $amount = preg_replace('/[^0-9.]/', '', $amount);
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

http_response_code(400);
echo 'Invalid method';
exit;
