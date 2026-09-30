<?php
declare(strict_types=1);

header('Cache-Control: no-store, private, max-age=0');
header('Pragma: no-cache');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('Referrer-Policy: same-origin');
ini_set('session.use_strict_mode', '1');
ini_set('session.use_only_cookies', '1');
session_name('chrisirlam_session');
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    'httponly' => true,
    'samesite' => 'Lax',
]);
session_start();

function is_authenticated(): bool
{
    if (empty($_SESSION['authenticated'])) {
        return false;
    }
    if (time() - (int) ($_SESSION['last_seen'] ?? 0) > 28800) {
        unset($_SESSION['authenticated'], $_SESSION['last_seen']);
        return false;
    }
    $_SESSION['last_seen'] = time();
    return true;
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function valid_csrf(): bool
{
    $provided = $_POST['csrf'] ?? null;
    return is_string($provided) && isset($_SESSION['csrf'])
        && hash_equals($_SESSION['csrf'], $provided);
}

function require_login(): void
{
    if (!is_authenticated()) {
        header('Location: login.php', true, 302);
        exit;
    }
}
