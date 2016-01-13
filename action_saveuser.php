<?php

include("clean_input.php"); 
if( ($username=="") OR ($password=="") )
{
 include("register.php");
 exit;
}
include("config.php"); 
include("dbconn.php");
$qupdate = "INSERT INTO users
            SET password =:password,
                username =:username";
$dbc = dbc::instance();
$result = $dbc->prepare($qupdate);
$result->bindParam(':username', $username, PDO::PARAM_STR);
$result->bindParam(':password', $password, PDO::PARAM_STR);
$result = $dbc->execute($result); 
header('Location: '."register.php");
die();
?>