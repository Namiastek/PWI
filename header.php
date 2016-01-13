<?php include ('languages/langcommon.php');?>
<?php
if (!isset($page_title))
    $page_title = $lang['PAGE_TITLE'];
if (!isset($page_keywords))
    $page_keywords = "slowa kluczowe";
if (!isset($page_desc))
    $page_desc = "Jakis opis";
?> 

<title><?php echo $page_title; ?></title> 
<meta charset="UTF-8" />
<meta NAME="description" CONTENT="<?php echo $page_desc; ?>"> 
<meta NAME="keywords" CONTENT="<?php echo $page_keywords; ?>"> 
<meta name="language" content="<?php echo $langShortName; ?>" /> 
<meta name="Distribution" content="Global"> 
<meta name="author" content="Piotr  Kurek"> 
<meta NAME="ROBOTS" CONTENT="NOINDEX/NOFOLLOW"> 
<link rel="stylesheet" type="text/css" href="css/site.css">
<script src="js/site.js" type="text/javascript" charset="utf-8"></script>
