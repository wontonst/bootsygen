<?php

class Navbar {

    public static function create(&$pages, $highlight) {
        $top = '<div class = "span3">
               <div class = "well sidebar-nav">
               <ul class = "nav nav-list">';
        $bot = '</ul>
               </div><!--/.well-->
               </div><!--/span-->';
        $mid = Navbar::buildList($pages, $highlight);
        return $top . $mid . $bot . "\n";
    }

    private static function buildList(&$pages, $highlight) {
        $out = '<li ';
        $out .= ($highlight == 'index' ? 'class="active"' : '');
        $out .='><a href="index.html">Home</a></li>';
        $out = "$out\n";
        $categories = array();


foreach($pages as $v){
//var_dump($pages);
if(!empty($v))           $out.='<li class = "nav-header">' . $v[0]->getCategory() . '</li>' . "\n";
            $toprint=$v;
            uasort($toprint,'Page::comparePages');
            foreach($toprint as $p) {
	      $out.='<li ' . ($highlight == $p->getTitle() ? 'class="active"' : '') . '><a href="' . str_replace(' ','%20',$p->getTitle()) . '.html">' . $p->getTitle() . '</a></li>' . "\n";

            }
}
return $out;
    }
}
?>

