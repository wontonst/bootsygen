<?php
function __autoload($class) {
    require_once(__DIR__.'/lib/' . strtolower($class) . '.php');
}


if(isset($argv[1]) && $argv[1] == 'config')
  {
    echo Util::getConfig();
    return;
  }else{
  if(!file_exists('config.php'))
    die('Error: config.php does not exist. Please verify that the config file is present in your working directory, or run 
    /path/to/builder.php config
to generate a new config file.
');
}

require_once('config.php');
try{
  Util::verifyConfig();
}catch(Exception $e)
{
  die( 'Error has occurred checking config.php:'. "\n\t".$e->getMessage()."\n\t".$e->getTraceAsString());
}
/*Get fresh Bootstrap build into out/*/
function move($source,$target = 'out') {
    exec('cp -R '.$source.' '.$target);
}
if(!is_dir($GLOBALS['CONFIG']['output']))exec('mkdir '.$GLOBALS['CONFIG']['output']);//make out folder

$GLOBALS['logger'] = new Logger('log.out');

$website = Website::create($GLOBALS['CONFIG']);
//var_dump($website);
$website->build();

move('res/js');
move('res/css');
move('res/img');
?>