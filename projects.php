<?php
declare(strict_types=1);
require __DIR__ . '/auth.php';
require_login();
header('Content-Type: application/javascript; charset=utf-8');
echo require __DIR__ . '/private/project-data.php';
