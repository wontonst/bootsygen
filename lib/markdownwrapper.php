<?php

class MarkdownWrapper {

    private static $using_php = null; ///<using the PHP markdown parser rather than system Markdown cmd

    public static function markdown($text) {
        if (MarkdownWrapper::$using_php == null)
            MarkdownWrapper::determineMarkdownMethod();

        if (MarkdownWrapper::$using_php) {
            return Markdown($text);
        } else {
            $handle = fopen('BOOTSYGEN_TMP_', 'w+');
            fwrite($handle, $text);
            $return = array();
            exec('markdown BOOTSYGEN_TMP_', $return);
            $treturn = '';
            foreach ($return as $line) {
                $treturn .= $line;
            }
            exec('rm -f BOOTSYGEN_TMP_');
return $treturn;
        }
    }

    private static function determineMarkdownMethod() {
        $s = exec('which markdown');
        if (!$s) {
            MarkdownWrapper::$using_php = true;
            $GLOBALS['logger']->log('Using built-in Markdown parser.');
        } else {
            MarkdownWrapper::$using_php = false;
            exec('markdown --version',$versraw);
            $version = 'VERSION NOT DETECTED';
            foreach ($versraw as $line) {
                if (strpos(strtolower($line), 'version')) {
                    $version = substr($line, strpos(strtolower($line), 'version'));
                }
            }
            $GLOBALS['logger']->log('Using system Markdown ' . $version);
        }
    }

}

?>