<!DOCTYPE html>
<html>
    <head>
        <?php include("header.php"); ?>
        <?php include("config.php"); ?>
        <?php include("clean_input.php"); ?>
        <?php include("dbconn.php"); ?>
    </head>

    <body onload="start(document.dateform);">
        <?php
        
        include('navbar.php'); 
        ?>
        <?php include('main.php'); ?>
        <?php include("footer.php"); ?>
    </body>
</html>