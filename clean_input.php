<?php
//clean user input to be save from any type of injection
if (!function_exists('clean_input'))
{
 function clean_input($string)
 {
  $patterns = array(// strip out:
                '@script*?>.*?</script@si', // javascript
                '@<[\/\!]*?[^<>]*?>@si', // HTML tags
                '@"@si', //double quotes
                "@'@si" //single quotes
                );
  $string = preg_replace($patterns,'',$string);
  $string = trim($string);
  $string = stripslashes($string);
  return htmlentities($string);
 }
}
foreach ($_REQUEST AS $key => $value) $$key = clean_input($value);//clean any and all user input