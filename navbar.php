<nav class="mainheader">
    <div class="page-title"><a href="index.php" id="header"><?=$lang['SITE_NAME']?></a></div>
    <div class="user">
        <?php
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            ?>
        Witaj <b><?= $user['username'] ?></b>
            <a href="action_logout.php"><?=$lang['MENU_LOGOUT']?></a>
            
        <?php } else { ?>
            <a href="login.php">Login</a>
            ||
            <a href="register.php">Rejestracja</a>
        <?php } ?>
    </div>
    <?php
        if (isset($_SESSION['user'])) {
    ?>
    <div class="user_menu">
        <a href="page_history.php"><?=$lang['MENU_HISTORY']?></a>
        <a href="page_list.php"><?=$lang['MENU_YOUR']?></a>
        <a href="json.php">Wyswietl jsona</a>
        <a href="xml.php">Wyswietl xmla</a>
    </div>
        <?php }?>
</nav>
<!-- FLASH MESSAGES -->
<?php
if (isset($_SESSION['flash'])) {
    echo "<div class='flash'>" . $_SESSION['flash'] . "</div>";
    unset($_SESSION['flash']);
}
?>

