<?php

class Bootsygen {

    /**
     * @brief move a file/folder
     */
    private static function move($source, $target = 'out') {
        exec('cp -R ' . __DIR__ . '/../' . $source . ' ' . $target);
    }

    public static function build() {
        require_once('config.php');
        try {
            Util::verifyConfig();
        } catch (Exception $e) {
            die('Error has occurred checking config.php:' . "\n\t" . $e->getMessage() . "\n\t" . $e->getTraceAsString());
        }
        Util::setNavbarSortFunction();
        /* Get fresh Bootstrap build into out/ */


        if (!is_dir($GLOBALS['CONFIG']['output']))
            exec('mkdir ' . $GLOBALS['CONFIG']['output']); //make out folder

        $GLOBALS['logger'] = new Logger('log.out');

        $website = Website::create($GLOBALS['CONFIG']);
//var_dump($website);

        $website->build();

        Bootsygen::move('res/js', $GLOBALS['CONFIG']['output']);
        Bootsygen::move('res/css', $GLOBALS['CONFIG']['output']);
        Bootsygen::move('res/img', $GLOBALS['CONFIG']['output']);
    }
}

?>