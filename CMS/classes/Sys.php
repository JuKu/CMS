<?php

class Sys {
    
    protected $db = null;
    protected $lang = array();
    protected $widgetcontroller = null;
    protected $log = null;
    
    protected $iconsets = null;
    
    public function Sys ($db, $lang, $log) {
        $this->db = $db;
        $this->lang = $lang;
        
        $this->log = $log;
    }
    
    public function getDB () {
        return $this->db;
    }
    
    public function getLang () {
        return $this->lang;
    }
    
    public function getLog () {
        return $this->log;
    }
    
    public function getIconSets () {
        return $this->iconsets;
    }
    
    public function setIconSets ($iconsets) {
        $this->iconsets = $iconsets;
    }
    
}

?>