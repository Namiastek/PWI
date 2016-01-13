<?php include("config.php"); ?>
<?php include("clean_input.php"); ?>
<?php include("dbconn.php"); ?>
<?php
session_start();
if (isset($_POST['password'])) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $dbc = dbc::instance();
    $result = $dbc->prepare("SELECT * from users where username =:username and password =:password");
    $result->bindParam(':username', $username, PDO::PARAM_STR);
    $result->bindParam(':password', $password, PDO::PARAM_STR);
    $rows = $dbc->executeGetRows($result);
    if (count($rows)) {
        $_SESSION['flash'] = "Zalogowano. IP Adres: ".$ip;
        $_SESSION['user'] = $rows[0];
    } else {
        $_SESSION['flash'] = "Logowanie nie  udane. IP Adres: ".$ip;
    }
} else
    $_SESSION['flash'] = "Logowałes się bez podania danych?";

header('Location: '."index.php");
die();
?>