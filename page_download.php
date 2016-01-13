<?php
$file = "download.txt"; 

header("Content-Description: File Transfer"); 
header("Content-Type: text/html"); 
header("Content-Disposition: attachment; filename=\"$file\""); 

readfile ($file); 
?>