<?php include("config.php"); ?>
<?php include("clean_input.php"); ?>
<?php include("dbconn.php"); ?>
<?php
session_start();
unset($_SESSION['user']);
$_SESSION['flash'] = "Wylogowano";

header('Location: '."index.php");
die();
?>