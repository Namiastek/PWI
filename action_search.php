<?php include("config.php"); ?>
<?php include("clean_input.php"); ?>
<?php include("dbconn.php"); ?>
<?php

session_start();
$dbc = dbc::instance();
$name = !empty($_POST['name']) ? "%" . $_POST['name'] . "%" : "%%";
$author = !empty($_POST['author']) ? "%" . $_POST['author'] . "%" :  "%%";
$result = $dbc->prepare("SELECT * from books where lower(name) like lower(:name) AND lower(author) like lower(:author)");
$result->bindParam(':name', $name, PDO::PARAM_STR);
$result->bindParam(':author', $author, PDO::PARAM_STR);

$rows = $dbc->executeGetRows($result);
if (count($rows)) {
    $_SESSION['flash'] = "Znaleziono " . count($rows) . " rekordów.";
    $_SESSION['books'] = $rows;
} else {
    $_SESSION['flash'] = "Nieznaleziono książki";
}

header("Location: " . $_SERVER['HTTP_REFERER']);
die();
?>
