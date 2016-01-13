<?php include("config.php"); ?>
<?php include("clean_input.php"); ?>
<?php include("dbconn.php"); ?>
<?php

session_start();
$dbc = dbc::instance();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $userId = $user['id'];
    $bookId = $_GET['id'];
} else {
    $_SESSION['flash'] = "Zaloguj się";
    header("Location: " . $_SERVER['HTTP_REFERER']);
    die();
}

$userBook = $dbc->prepare("INSERT INTO user_books
            SET user_id =:user_id,
                book_id =:book_id");
$userBook->bindParam(':user_id', $userId, PDO::PARAM_INT);
$userBook->bindParam(':book_id', $bookId, PDO::PARAM_INT);

$archive = $dbc->prepare("INSERT INTO archive
            SET user_id =:user_id,
                book_id =:book_id");
$archive->bindParam(':user_id', $userId, PDO::PARAM_INT);
$archive->bindParam(':book_id', $bookId, PDO::PARAM_INT);

$available = date('Y-m-d H:i:s', strtotime('+7 days'));
$book = $dbc->prepare("UPDATE books
            SET `available` =:available
            WHERE `id` =:id");
$book->bindParam(':available', $available, PDO::PARAM_STR);
$book->bindParam(':id', $bookId, PDO::PARAM_INT);

$first = $dbc->execute($userBook);
$second = $dbc->execute($archive);
$third = $dbc->execute($book);
if ($first && $second && $third) {
    $_SESSION['flash'] = "Wypożyczyłes książkę do " . $available.", wejdź na listę swoich książek aby podjąć dalsze działania.";
} else {
    $_SESSION['flash'] = "Wystąpił błąd";
}

header("Location: " . $_SERVER['HTTP_REFERER']);
die();
?>
