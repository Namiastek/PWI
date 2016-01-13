<!DOCTYPE html>
<html>
    <head>
        <?php $page_title = "Moje Archiwum"; ?>
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

        <br><strong>Twoje Archiwum  - książki które u nas czytałes:</strong>
        <table class="table table-bordered">
            <thead>
            <th>Nazwa</th>
            <th>Autor</th>
            <th>Gatunek</th>
            <th>Data</th>
            <th>Akcje</th>
        </thead>
        <tbody>
            <?php
            $dbc = dbc::instance();
            $result = $dbc->prepare("SELECT b.*,g.name as 'genre', u.date_rent FROM `archive` u "
                    . "left join books b on u.book_id = b.id "
                    . "left join genre g on b.genre_id = g.id "
                    . "where u.user_id = :user_id");
            $result->bindParam(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);
            $rows = $dbc->executeGetRows($result);

            if (count($rows)) {
                foreach ($rows as $key => $value) {
                    ?>
                    <tr>
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['author'] ?></td>
                        <td><?= $value['genre'] ?></td>
                        <td><?= $value['date_rent'] ?></td>
                        <td>
                            <a type="button" href="page_show.php?id=<?= $value['id'] ?>">Zobacz Więcej</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
    <hr>
    <?php include("footer.php"); ?>
</body>
</html>