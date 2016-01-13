<?php

session_start();
header('Cache-control: private'); // IE 6 FIX

if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];

// jak user wybierze to  do  sesji i ciastka
    $_SESSION['lang'] = $lang;

    setcookie('lang', $lang, time() + (3600 * 24 * 30));
    header('Location: '."index.php");
} else if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else if (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'pl';
}
$langShortName = $lang;
switch ($lang) {
    case 'en':
        $lang_file = 'lang.en.php';
        break;

    case 'pl':
        $lang_file = 'lang.pl.php';
        break;

    case 'es':
        $lang_file = 'lang.es.php';
        break;

    default:
        $lang_file = 'lang.pl.php';
}

include('languages/' . $lang_file);
?>