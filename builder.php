<?php

$GLOBALS['logger'] = new Logger('log.out');

//ini_set('memory_limit','256M');

function __autoload($class) {
    require_once(__DIR__ . '/lib/' . strtolower($class) . '.php');
}

if (isset($argv[1]) && $argv[1] == 'config') {
    $config = Util::getConfig(); //get raw config file
    $f = fopen('config.php', 'w+');
    fwrite($f, $config);
    return;
} else {
    if (!file_exists('config.php')) {
        $errormsg = 'Error: config.php does not exist. Please verify that the config file is present in your working directory, or run /path/to/builder.php config to generate a new config file.';
        $GLOBALS['logger']->log($errormsg);
        die($errormsg . "\n");
    }
}

Bootsygen::build();
?>