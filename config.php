<?php
$config = array(
		//website title
              'title' => '',
	      //website description
              'description' => '',
              'author' => '',
	      //copyright year
              'year' => '2013',
	      //list of pages the program should look for under /source directory
              'pages' => array(
                  
              )
          );
$GLOBALS['NAVBAR_COMPARE']=function($a,$a2) {
/*
navbar configuration. list your navbar categories in the order you want in the format
$arr[] = 'My first category';
$arr[] = 'My second category';
*/
    $arr[]='';
    $arr[]='';


    if(array_search($a,$arr) === false)
        $GLOBALS['logger']->log('WARNING: config.php does not have navbar compare for categorie '.$a);
    if(array_search($a2,$arr)===false)
        $GLOBALS['logger']->log('WARNING: config.php does not have navbar cmopare for category '.$a2);
    return array_search($a,$arr)-array_search($a2,$arr);
};

?>