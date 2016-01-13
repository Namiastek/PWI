<!DOCTYPE html>
<html>
    <head>
        <?php $page_title = "Moje Książki"; ?>
        <?php include("header.php"); ?>
        <?php include("config.php"); ?>
        <?php include("clean_input.php"); ?>
        <?php include("dbconn.php"); ?>
    </head>

    <body>
        <?php
        include('navbar.php');
        ?>
        <hr>

        <br><strong>Twoje książki:</strong>
        <table class="table table-bordered">
            <thead>
            <th>Nazwa</th>
            <th>Autor</th>
            <th>Gatunek</th>
            <th>Czy do oddania</th>
            <th>Akcje</th>
        </thead>
        <tbody>
            <?php
            $dbc = dbc::instance();
            $result = $dbc->prepare("SELECT b.*,g.name as 'genre' FROM `user_books` u "
                    . "left join books b on u.book_id = b.id "
                    . "left join genre g on b.genre_id = g.id "
                    . "where u.user_id = :user_id");
            $result->bindParam(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);
            $rows = $dbc->executeGetRows($result);

            if (count($rows)) {
                foreach ($rows as $key => $value) {
                    $today = new DateTime(date('Y-m-d H:i:s'));
                    $expire = new DateTime($value['available']);
                    $avail = $expire < $today;
                    if ($avail) {
                        $class = 'danger';
                        $status = "Tak";
                    } else {
                        $class = 'success';
                        $status = "Nie";
                    }
                    ?>
                    <tr class="<?= $class ?>">
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['author'] ?></td>
                        <td><?= $value['genre'] ?></td>
                        <td><?= $status ?></td>
                        <td>
                            <a type="button" target="_blank" href="page_download.php?id=<?= $value['id'] ?>">Pobierz</a> ||
                            <a type="button" href="action_return.php?id=<?= $value['id'] ?>">Oddaj</a> ||
                            <a type="button" href="page_show.php?id=<?= $value['id'] ?>">Zobacz Więcej</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <div class="legend">
        <span class="redText">Czerwony</span> kolor informuje że książka jest już przetrzymana;<br>
        <span class="greenText">Zielony</span> kolor oznacza że wciąż możemy ją posiadać.
    </div>
    <hr>
    <?php include("footer.php"); ?>
</body>
</html>