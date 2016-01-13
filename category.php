<!DOCTYPE html>
<html>
    <head>
        <?php $page_title = "Kategoria"; ?>
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
        <?php
//        $parts = parse_url($_REQUEST['url']);
//        parse_str($parts['query'], $params);
        $dbc = dbc::instance();
        $result = $dbc->prepare("SELECT * from genre where id =:id limit 1");
        $result->bindParam(':id', $_REQUEST['id'], PDO::PARAM_INT);
        $value = $dbc->executeGetRows($result)[0];
        ?>
        Lista książek  w kategorii <b> <a href="category.php?id=<?= $value['id'] ?>"><?= $value['name'] ?></a></b>
        <br><br>
        <table class="table table-bordered">
            <thead>
            <th><a href="category.php?id=<?= $value['id'] ?>&order=name">Nazwa</a></th>
            <th><a href="category.php?id=<?= $value['id'] ?>&order=author">Autor</a></th>
            <th><a href="category.php?id=<?= $value['id'] ?>&order=available">Dostępnosc</a></th>
            <th>Akcje</th>
        </thead>
        <tbody>
        <form action="action_search.php" name="search" METHOD="POST">
            <tr>
                <td><input name="name" type="text"></td>
                <td><input name="author" type="text"></td>
                <td colspan="2"><input type="submit" value="Szukaj"></td>
            </tr>
        </form>
        <?php
        if (isset($_SESSION['books'])) {
            $rows = $_SESSION['books'];
            unset($_SESSION['books']);
        } else {
            if (isset($_REQUEST['order'])) {
                $orders=array("name","author","available");
                $key=array_search($_GET['order'],$orders);
                $order=$orders[$key];
                $result = $dbc->prepare("SELECT * from books where genre_id =:genre_id order by $order asc");
//                $result->bindParam(':order', $_GET['order'], PDO::PARAM_STR);
            } else {
                $result = $dbc->prepare("SELECT * from books where genre_id =:genre_id order by available asc");
            }
            $result->bindParam(':genre_id', $_REQUEST['id'], PDO::PARAM_INT);
            $rows = $dbc->executeGetRows($result);
        }
        if (count($rows)) {
            foreach ($rows as $key => $value) {
                $today = new DateTime(date('Y-m-d H:i:s'));
                $expire = new DateTime($value['available']);
                $avail = $expire < $today;
                if ($avail) {
                    $class = 'success';
                    $status = "Dostępna";
                } else {
                    $class = 'danger';
                    $status = "Nie dostępna";
                }
                ?>
                <tr class="<?= $class ?>">
                    <td><?= $value['name'] ?></td>
                    <td><?= $value['author'] ?></td>
                    <td><?= $status ?></td>
                    <td>
                        <?php if ($avail)   { ?>
                            <a type="button" href="action_rent.php?id=<?=$value['id']?>">Wypożycz</a> ||
                        <?php }  ?>
                            <a type="button" href="page_show.php?id=<?=$value['id']?>">Zobacz Więcej</a>
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