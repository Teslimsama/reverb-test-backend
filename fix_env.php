<?php
$envFile = '.env';
if (!file_exists($envFile)) {
    echo ".env not found\n";
    exit(1);
}

$content = file_get_contents($envFile);
$newContent = $content;

// 1. Ensure BROADCAST_CONNECTION is reverb
if (preg_match('/^BROADCAST_CONNECTION=.*$/m', $content)) {
    $newContent = preg_replace('/^BROADCAST_CONNECTION=.*$/m', 'BROADCAST_CONNECTION=reverb', $newContent);
} else {
    $newContent .= "\nBROADCAST_CONNECTION=reverb";
}

// 2. Add Reverb keys if missing
$reverbKeys = [
    'REVERB_APP_ID' => 'test_app_id',
    'REVERB_APP_KEY' => 'test_app_key',
    'REVERB_APP_SECRET' => 'test_app_secret',
    'REVERB_HOST' => 'localhost',
    'REVERB_PORT' => '8080',
    'REVERB_SCHEME' => 'http',
];

foreach ($reverbKeys as $key => $value) {
    if (!preg_match("/^$key=/m", $newContent)) {
        $newContent .= "\n$key=$value";
    }
}

file_put_contents($envFile, $newContent);
echo "Updated .env successfully.\n";
