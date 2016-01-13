<?php include("config.php"); ?>
        <?php include("clean_input.php"); ?>
        <?php include("dbconn.php"); ?>
<?php

$dbc = dbc::instance();
$result = $dbc->prepare("SELECT * FROM genre ");
$rows = $dbc->executeGetRows($result);
$data = array();
if (count($rows)) {
    foreach ($rows as $key => $value) {
        $data['category'][$key]['id'] = $value['id'];
        $data['category'][$key]['name'] = $value['name'];
        $data['category'][$key]['url'] = "category.php?id=" .$value['id'];
    }
}
header('Content-Type: application/json');
echo json_encode($data);
