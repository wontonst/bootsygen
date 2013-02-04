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
            $filename = 'source/' . $v . '.txt';
            if (!file_exists($filename)) {
                $GLOBALS['logger']->log('FILE DOES NOT EXIST: ' . $filename);
                continue;
            }
            $file = fopen($filename, 'r');
            $content = fread($file, 1000000000);
//            var_dump(Parser::parse($content));
            $website->add(Parser::parse($content));
        }
        return $website;
    }

    public function add(&$page) {
        $this->pages[] = $page;
    }

    public function build() {
        $file = fopen('out/index.html', 'w+');
        foreach ($this->metadata as $k => $v) {
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
            $page = $p->getContent();
            if($p->hasDescription())$page['description']=$p->getDescription();
            $navbar = Navbar::create($pages,$title);
            include(__DIR__.'/../modules/page.php');
            if(!$index=ob_get_clean())throw new Exception('website.php ob_get_clean() has encountered an issue at line '.__LINE__);
            fwrite($file,$index);
        }
    }
    private function createPreviews() {
        foreach ($this->pages as $page) {
            if($page->hasDescription())
                $array[$page->getTitle()]=$page->getDescription();
        }
        return $array;
    }
}

?>