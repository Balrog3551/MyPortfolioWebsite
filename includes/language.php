<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'tr';
}

$lang_file = __DIR__ . '/../lang/' . $_SESSION['lang'] . '.php';

if (file_exists($lang_file)) {
    require_once $lang_file;
} else {
    require_once __DIR__ . '/../lang/en.php';
}
?>