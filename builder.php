<?php
require_once('config.php');

if(empty($NAVBAR_ORDER))
  throw new Exception('Navbar order array may not be empty. Please open config.php to edit.');
/*Ordering the NavBar*/
$GLOBALS['NAVBAR_COMPARE']=function($a,$a2) {
  global $NAVBAR_ORDER;
  foreach($NAVBAR_ORDER as $v)
    $arr[]=$v;

    if(array_search($a,$arr) === false)
        $GLOBALS['logger']->log('WARNING: config.php does not have navbar compare for categorie '.$a);
    if(array_search($a2,$arr)===false)
        $GLOBALS['logger']->log('WARNING: config.php does not have navbar cmopare for category '.$a2);
    return array_search($a,$arr)-array_search($a2,$arr);
};

function __autoload($class) {
    require_once(__DIR__.'/lib/' . strtolower($class) . '.php');
}
/*Get fresh Bootstrap build into out/*/
function move($source,$target = 'out')
{
exec('cp -R '.$source.' '.$target);
}
if(!is_dir('out'))exec('mkdir out');//make out folder

$GLOBALS['logger'] = new Logger('log.out');

$website = Website::create($config);
//var_dump($website);
$website->build();

move('res/js');
move('res/css');
move('res/img');
?>