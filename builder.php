<?php

function __autoload($class) {
    require_once('lib/' . strtolower($class) . '.php');
}

require_once('config.php');
$GLOBALS['logger'] = new Logger('log.out');

$website = Website::create($config);
//var_dump($website);
$website->build();
?>