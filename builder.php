<?php
require_once('config.php');

function __autoload($class) {
    require_once(__DIR__.'/lib/' . strtolower($class) . '.php');
}

include(__DIR__.'/lib/config.php');

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