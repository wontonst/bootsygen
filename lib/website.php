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

    private function __construct() { }

    /**
     * Takes the configuration file and builds the webpage out of it.
     */
    public static function create(&$config) {
        $website = new Website();
        $website->metadata = $config;
	$website->metadata['description']=MarkdownWrapper::markdown($website->metadata['description']);
        foreach ($config['pages'] as $v) {
            $filename = $config['input'] .'/'. $v . '.md';
            $website->add(Parser::parse($filename));
        }
        return $website;
    }

    public function add(&$page) {
        $this->pages[$page->getCategory()][] = $page;
	//	var_dump($page);
    }

    public function build() {
      $this->buildIndex();
        $pages = $this->pages;
        foreach($this->pages as $p) {
foreach($p as $v)
	  $this->buildPage($v);
        }
    }
/**
builds index.html (outputs to index.html)
 */
    private function buildIndex()
    {
        $file = fopen($this->metadata['output'].'/index.html', 'w+');
        foreach ($this->metadata as $k => $v) {//this is not pointless - it sets the variables for including /modules/body.php
	  $$k = $v;
        }
        $navbar = Navbar::create($this->pages, 'index');
        $previews = $this->createPreviews();
        ob_start();
        include(__DIR__ . '/../modules/body.php');
        $index = ob_get_clean();
        fwrite($file, $index);
	fclose($file);
    }
    /**
builds a single page (outputs to file)
     */
    private function buildPage(&$p)
    {
        foreach ($this->metadata as $k => $v) {//this is not pointless - it sets the variables for /modules/body.php
	  $$k = $v;
        }
            ob_start();
            $file = fopen($GLOBALS['CONFIG']['output']. '/'.$p->getTitle().'.html','w+');
            $title=$p->getTitle();
            $content = $p->getContent();
            $description=($p->hasDescription())?$p->getDescription():'';
            $navbar = Navbar::create($this->pages,$title);
            include(__DIR__.'/../modules/page.php');
            if(!$index=ob_get_clean())throw new Exception('website.php ob_get_clean() has encountered an issue at line '.__LINE__);
            fwrite($file,$index);
	    fclose($file);
    }
    private function createPreviews() {
      $array=array();
        foreach ($this->pages as $page2) {
foreach($page2 as $page)
            if($page->hasDescription())
                $array[$page->getTitle()]=$page->getDescription();
        }
        return $array;
    }
}

?>