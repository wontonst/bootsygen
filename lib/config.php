<?php
if(!$GLOBALS['CONFIG']['output'])
  throw new Exception('Navbar output directory may not be empty');
if(!$GLOBALS['CONFIG']['input'])
  throw new Exception('Navbar input directory may not be empty');
if(empty($GLOBALS['CONFIG']['navbar']))
  throw new Exception('Navbar order array may not be empty. Please open config.php to edit.');
$GLOBALS['CONFIG']['pages']=Parser::parseDir($GLOBALS['CONFIG']['input']);
if(empty($GLOBALS['CONFIG']['pages']))throw new Exception('Source directory is empty.');

/*Ordering the NavBar*/
$GLOBALS['CONFIG']['navbarfunction']=function($a,$a2) {
  foreach($GLOBALS['CONFIG']['navbar'] as $v)
    $arr[]=$v;
  if(array_search($a,$arr) === false)
    $GLOBALS['logger']->log('WARNING: config.php does not have navbar compare for categorie '.$a);
  if(array_search($a2,$arr)===false)
    $GLOBALS['logger']->log('WARNING: config.php does not have navbar cmopare for category '.$a2);
  return array_search($a,$arr)-array_search($a2,$arr);
};




?>