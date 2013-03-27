class Util{

  public static function getConfig()
  {
$config = <<<<CONFIG
<?php
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
'Hey'
					     ),

			   //output directory
			   'output' => 'out',

			   //source directory
			   'input'=>'',
			   );
?>
CONFIG;
return $config;
  }

}