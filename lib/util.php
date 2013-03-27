<?php

class Util{

  public static function getConfig()
  {
    $config = <<<'CONFIG'
      <?
      $GLOBALS['CONFIG'] = array(
				 //website title
				 'title' => '',
				 
				 //website description
				 'description' => '',
				 
				 'author' => '',
				 
				 //copyright year
				 'year' => '2013',
				 
				 /*
				   navbar configuration. list your navbar categories in the order you want
				 */
				 'navbar' => array(
						   'Category1',
						   'Category2',//replace these with your own category
						   ),
				 
				 //output directory
				 'output' => 'out',
				 
				 //source directory
				 'input'=>'.',
				 );
    ?>
CONFIG;
    return $config;
  }
  
  /**
     verifies that everything in the config file is good
   */
  public function verifyConfig(){
    if(!$GLOBALS['CONFIG']['output'])
      throw new Exception('Navbar output directory may not be empty');
    if(!$GLOBALS['CONFIG']['input'])
      throw new Exception('Navbar input directory may not be empty');
    if(!is_dir($GLOBALS['CONFIG']['input']))
      throw new Exception('Input directory does not exist');
    if(empty($GLOBALS['CONFIG']['navbar']))
      throw new Exception('Navbar order array may not be empty. Please open config.php to edit.');
    $GLOBALS['CONFIG']['pages']=Parser::parseDir($GLOBALS['CONFIG']['input']);
    if(empty($GLOBALS['CONFIG']['pages']))throw new Exception('Source directory is empty.');
  }
  
  /**
     sets the ordering of the navbar
  */
  public function orderNavbar(){
    
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
  }
  
}

?>