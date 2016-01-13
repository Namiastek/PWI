<?php include("config.php"); ?>
<?php include("clean_input.php"); ?>
<?php include("dbconn.php"); ?>
<?php

session_start();
$dbc = dbc::instance();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $userId = (int)$user['id'];
    $bookId = (int)$_GET['id'];
} else {
    $_SESSION['flash'] = "Zaloguj się";
    header("Location: " . $_SERVER['HTTP_REFERER']);
    die();
}

$userBook = $dbc->prepare("DELETE FROM user_books
            WHERE 
            user_id =:user_id AND
            book_id =:book_id");
$userBook->bindParam(':user_id', $userId, PDO::PARAM_INT);
$userBook->bindParam(':book_id', $bookId, PDO::PARAM_INT);


$available = date('Y-m-d H:i:s', strtotime('-1 days'));
$book = $dbc->prepare("UPDATE books
            SET `available` =:available
            WHERE `id` =:id");
$book->bindParam(':available', $available, PDO::PARAM_STR);
$book->bindParam(':id', $bookId, PDO::PARAM_INT);

$first = $dbc->execute($userBook);
$third = $dbc->execute($book);
if ($first && $third) {
    $_SESSION['flash'] = "Oddałes  książkę, zachęcamy do wypożyczenia kolejnej.";
} else {
    $_SESSION['flash'] = "Wystąpił błąd";
}

header("Location: " . $_SERVER['HTTP_REFERER']);
die();
?>
