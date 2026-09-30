<?php
declare(strict_types=1);
require __DIR__ . '/auth.php';
if (is_authenticated()) {
    header('Location: index.php', true, 302);
    exit;
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;
    $lockedUntil = (int) ($_SESSION['locked_until'] ?? 0);
    if (!valid_csrf()) {
        $error = 'Please refresh the page and try again.';
    } elseif ($lockedUntil > time()) {
        $error = 'Please wait a minute before trying again.';
    } else {
        if ($lockedUntil !== 0) {
            $_SESSION['attempts'] = 0;
            unset($_SESSION['locked_until']);
        }
        $config = require __DIR__ . '/auth-config.php';
        $passwordMatches = is_string($password) && strlen($password) <= 1024
            && password_verify($password, $config['password_hash']);
        if (is_string($username) && hash_equals($config['username'], $username) && $passwordMatches) {
            session_regenerate_id(true);
            $_SESSION = [
                'authenticated' => true,
                'last_seen' => time(),
                'csrf' => bin2hex(random_bytes(32)),
            ];
            header('Location: index.php', true, 303);
            exit;
        }
        $_SESSION['attempts'] = (int) ($_SESSION['attempts'] ?? 0) + 1;
        if ($_SESSION['attempts'] >= 5) {
            $_SESSION['locked_until'] = time() + 60;
        }
        $error = 'The username or password is incorrect.';
    }
}
?>
<!doctype html>
<html lang="en-GB">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#10131c">
  <meta name="robots" content="noindex, nofollow">
  <title>Sign in — Chris Irlam</title>
  <link rel="icon" type="image/svg+xml" href="assets/favicon.svg">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="login-page">
  <div class="ambient" aria-hidden="true"></div>
  <main class="login-panel">
    <a class="brand" href="index.php"><span class="brand-mark">ci<span>.</span></span><span>CHRIS IRLAM<span class="brand-sub">PROJECTS & IDEAS</span></span></a>
    <p class="eyebrow">YOUR COLLECTION, ONE SIGN-IN AWAY</p>
    <h1>Welcome <span class="gradient-text">back.</span></h1>
    <p class="login-intro">Sign in to explore the project collection.</p>
    <?php if ($error !== ''): ?>
      <p class="login-error" role="alert"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
    <form method="post" action="login.php" class="login-form">
      <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') ?>">
      <label for="username">Username</label>
      <input id="username" name="username" type="text" autocomplete="username" maxlength="100" required autofocus>
      <label for="password">Password</label>
      <input id="password" name="password" type="password" autocomplete="current-password" maxlength="1024" required>
      <button class="button" type="submit">Open the collection <span aria-hidden="true">↗</span></button>
    </form>
    <p class="login-note">CHRIS IRLAM / PROJECTS & DIGITAL EXPERIENCES</p>
  </main>
</body>
</html>
