<?php

function __autoload($class) {
    require_once('lib/' . strtolower($class) . '.php');
}
function move($source,$target = 'out')
{
exec('cp -R '.$source.' '.$target);
}
if(!is_dir('out'))exec('mkdir out');

require_once('config.php');
$GLOBALS['logger'] = new Logger('log.out');

$website = Website::create($config);
//var_dump($website);
$website->build();

move('res/js');
move('res/css');
move('res/img');
?>