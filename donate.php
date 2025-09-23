<?php
declare(strict_types=1);

header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: no-referrer');
header('Cache-Control: no-store');

$method = $_GET['method'] ?? '';
$amount = (string) ($_GET['amount'] ?? '');

if ($method === 'mtl') {
  // Keep only digits for MTL Wallet
  $amount = preg_replace('/[^0-9]/', '', $amount);
  $url = 'https://t.me/MyMTLWalletBot?start=eurmtl_tfm_voice-' . $amount;
  header('Location: ' . $url, true, 302);
  exit;
}

if ($method === 'stellar') {
  // Allow digits and dot for Stellar amount
  $amount = preg_replace('/[^0-9.]/', '', $amount);
  $stellar = 'web+stellar:pay?destination=GCSAXEHZBQY65URLO6YYDOCTRLIGTNMGCQHVW2RZPFNPTEJN6VN7TFIN'
    . '&amount=' . $amount
    . '&asset_code=EURMTL'
    . '&asset_issuer=GACKTN5DAZGWXRWB2WLM6OPBDHAMT6SJNGLJZPQMEZBUR4JUGBX2UK7V'
    . '&memo=Donate+by+site'
    . '&memo_type=MEMO_TEXT';
  $redirect = 'https://montelibero.net/redirect/?to=' . rawurlencode($stellar);
  header('Location: ' . $redirect, true, 302);
  exit;
}

http_response_code(400);
echo 'Invalid method';
exit;
