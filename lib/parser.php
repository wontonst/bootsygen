<?php
require_once(__DIR__.'/page.php');
class Parser {

  /*
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
  */
  public static function parse($string)
  {
    return Markdown::defaultTransform($string);
  }
    public static function parseDir(&$dirpath) {
        $dir = opendir($dirpath);
        while($a = readdir($dir)) {
            if(strlen($a) > 4 && substr($a,-3) == '.md')
                $arr[]=substr($a,0,-3);
        }
        return $arr;
    }

}

?>