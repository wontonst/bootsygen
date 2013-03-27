<?php

require_once(__DIR__ . '/page.php');

class Website {

    /**
      Stores configuration information about the website retrieved from config.php.
     * @var type array
     */
    private $metadata;

    /**
     * An array of pages.
     * @var type array
     */
    private $pages;

    private function __construct() {

    }

    /**
     * Takes the configuration file and builds the webpage out of it.
     */
    public static function create(&$config) {
        $website = new Website();
        $website->metadata = $config;
        foreach ($config['pages'] as $v) {
            $filename = $config['input'] .'/'. $v . '.md';
            $website->add(Parser::parse($filename));
        }
        return $website;
    }

    public function add(&$page) {
        $this->pages[] = $page;
	//	var_dump($page);
    }

    public function build() {
        $file = fopen('out/index.html', 'w+');
        foreach ($this->metadata as $k => $v) {//this is not pointless - it sets the variables for index.html
            $$k = $v;
        }
        $pages = $this->pages;
        $previews = $this->createPreviews();
        ob_start();
        $navbar = Navbar::create($pages, 'index');
        include(__DIR__ . '/../modules/body.php');
        $index = ob_get_clean();
        fwrite($file, $index);
        foreach($this->pages as $p) {
            ob_start();
            fclose($file);
            $file = fopen($GLOBALS['CONFIG']['output']. '/'.$p->getTitle().'.html','w+');
            $title=$p->getTitle();
            $content = $p->getContent();
            if($p->hasDescription())$description=$p->getDescription();
            $navbar = Navbar::create($pages,$title);
            include(__DIR__.'/../modules/page.php');
            if(!$index=ob_get_clean())throw new Exception('website.php ob_get_clean() has encountered an issue at line '.__LINE__);
            fwrite($file,$index);
        }
    }
    private function buildIndex()
    {

    }
    private function buildAllPages()
    {

    }
    private function buildPage()
    {

    }
    private function createPreviews() {
      $array=array();
        foreach ($this->pages as $page) {
            if($page->hasDescription())
                $array[$page->getTitle()]=$page->getDescription();
        }
        return $array;
    }
}

?>