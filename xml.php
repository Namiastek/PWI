<?php header('Content-type: text/xml');?>
<?php include("config.php"); ?>
<?php include("clean_input.php"); ?>
<?php include("dbconn.php"); ?>
<?php
$dbc = dbc::instance();
$result = $dbc->prepare("SELECT * FROM genre ");
$rows = $dbc->executeGetRows($result);
?>
<category><title>Lista Kategorii</title>
    <CategoryDiv><title>Kategorie</title>
        <CategoryList>
            <?php if (count($rows)) {
                foreach ($rows as $key => $value) {
                    ?>
                    <CategoryEntry ID="<?=$value['id']?>" SortOrder="id">
                        <CatName><?=$value['name']?></CatName>
                        <CatUrl><?="category.php?id=" .$value['id']?></CatUrl>
                    </CategoryEntry>
    <?php }
} ?>
        </CategoryList>
    </CategoryDiv>
</category>