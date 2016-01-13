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

        <br><strong>Szczegóły:</strong>
        <div class="details">
        <table class="table table-bordered wide">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            } else {
                $_SESSION['flash'] = "Wystąpił błąd, nie podano id";
                header("Location: " . $_SERVER['HTTP_REFERER']);
                die();
            }
            ?>
            <thead>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?php
            $dbc = dbc::instance();
            $result = $dbc->prepare("SELECT * FROM books where id=:id");
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $row = $dbc->executeGetRows($result)[0];

            if (!empty($row)) {
                ?>
                <tr>
                    <td>Nazwa:</td>
                    <td><?= $row['name'] ?></td>
                </tr>
                <tr>
                    <td>Autor:</td>
                    <td><?= $row['author'] ?></td>
                </tr>
                <tr>
                    <td>Okładka:</td>
                    <td><?= $row['img'] ?></td>
                </tr>
                <tr>
                    <td>Opis</td>
                    <td class="extraHeight"><?= $row['description'] ?></td>
                </tr>
                <tr>
                    <td>Popularnosć</td>
                    <td><?= $row['amount'] ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    </div>
    <hr>
    <?php include("footer.php"); ?>
</body>
</html>