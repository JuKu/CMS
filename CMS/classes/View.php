<?php

class View {

private $style_path = "";

    public function View ($style_path) {
        $this->style_path = $style_path;
    }
    
    public function showPage () {
    
    global $page;
        
        require($this->style_path);
        
    }
    
}

?>