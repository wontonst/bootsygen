<?php

class Logger {

    private $fname;
    private $file;
    function __construct($fn) {
        $this->fname = $fn;
        $this->file=fopen($this->fname,'a+');
        $this->logOpening();
    }
    private function logOpening() {
        fwrite($this->file,"\n".'---------------------'."\n".'Log started '.date('F d, Y h:i:s'));
    }
    public function log($msg) {
        fwrite($this->file,"\n".$msg);
    }
}

?>