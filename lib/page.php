<?php

class Page {

    private $title; ///<page title
    private $description; ///<page description
    private $category;///<page category on navbar
    private $content; ///<HTML of page content

    private function __construct() {

    }

    /**
      Constructs the page from the array of various modules.
     */
    public static function create($info) {
        $page = new Page();
        foreach ($info as $k => $v) {
            $v = Page::parseContent($v);
            switch (strtoupper($k)) {
            case 'TITLE':
                $page->title = $v;
                break;
            case 'DESCRIPTION':
                $page->description = $v;
                break;
            case 'CATEGORY':
                $page->category=$v;
                break;
	    case 'CONTENT':
	      $page->content = $v;
	      break;
            default:
	      die('Page: invalid array passed to constructor: key '.$k.' is not a valid page data.');
            }
        }
        return $page;
    }
    public static function parseContent(&$content) {
        $exploded = explode("\n",$content);
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
        return implode("\n",$exploded);
    }
    public function getTitle() {
        return $this->title;
    }
    public function getCategory() {
        return $this->category;
    }
    public function getContent() {
        return $this->content;
    }
    public function getDescription() {
        return $this->description;
    }
    public function hasDescription() {
        return isset($this->description);
    }


    public static function comparePages($p1,$p2) {
        return strcmp($p1->getTitle(),$p2->getTitle());
    }
}

?>