<?php
require_once(__DIR__.'/page.php');
class Parser {

    public static function parse($string) {
        $exploded = array();
        $key=strtok($string,'{}');
        $value=strtok('{}');
        $exploded[trim($key)]=trim($value);
        while($key=strtok('{}')) {
            $value=strtok('{}');
            $exploded[trim($key)]=trim($value);
        }
        return Page::create($exploded);
    }

}

?>