<?php

abstract class Widget {
    
    protected $content = "";
    protected $widgetcolor = "white";
    protected $lang = array();
    protected $title = "";
    
    protected $sys = null;
    
    public function Widget ($sys) {
        $this->sys = $sys;
        $this->lang = $this->sys->getLang();
    }
    
    public abstract function load();
    
    public final function show () {
    
        echo "<li class=\"widget color-" . $this->widgetcolor . "\">\r\n";
        echo "\t<div class=\"widget-head\">\r\n";
        echo "\t\t<h3>" . $this->title . "</h3>\r\n";
        echo "\t</div>\r\n";
        echo "\t<div class=\"widget-content\">\r\n";
        echo "" . $this->content . "\r\n";
        echo "\t</div>\r\n";
        echo "</li>\r\n \r\n";
        
    }
    
}

?>