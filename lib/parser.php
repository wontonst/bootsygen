<?php
require_once(__DIR__.'/markdown.php');

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
  /**
Takes a file name and parses the file.
   */
  public static function parse($filename)
  {
    $pagedata = array();                                                     //!! array to be sent to Page object constructor

    $file=explode('/',$filename);
    $pagedata['title'] = substr(end($file),0,-3);                                         //!!set page title

    $file = fopen($filename, 'r');
    $content = fread($file, 1000000000);

    $exploded = explode("\n",$content);

    ////////////////////////MACRO PARSING////////////////////
        foreach($exploded as &$line) {
            if(strpos($line,'$(') == 0) {
                $input = substr($line,2,-1);
                $input = explode(',',$input);
                foreach($input as &$v)$v=trim($v);
                switch($input[0]) {
                case 'IMG':
                    $line = '<a href="'.$input[1].'"><img alt="'.$input[2].'" src="'.$input[1].'" /></a>';
                    break;
                }
            }
        }
	////////////////////////////////////////////////////

    if(!$exploded[0][0] || $exploded[0][0] != '#')//check for category
      die('Error: Category not found in file '.$filename.' - please make sure line 1 starts with #enterYourCategoryHere');
    $pagedata['category']=substr($exploded[0],1);                                                //!!set page category
    if($exploded[1] && $exploded[1][0] == '#'){
      $pagedata['description'] = Markdown(substr($exploded[1],1));                               //!!set page description
      unset($exploded[1]);
    }
    unset($exploded[0]);
    $pagedata['content']= Markdown(implode("\n",$exploded));    //!!set page content
    return Page::create($pagedata);
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