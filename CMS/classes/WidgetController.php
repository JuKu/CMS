<?php

class WidgetController {

    protected $db = null;
    protected $lang = array();
    protected $sys = null;
    protected $log = null;

    public function WidgetController ($sys) {
        $this->sys = $sys;
        $this->db = $sys->getDB();
        $this->lang = $sys->getLang();
        $this->log = $sys->getLog();
    }
    
    //Fügt ein Widget hinzu.
    public function addWidget ($name, $path, $class) {
        
        $name = $this->db->escape($name);
        $path = $this->db->escape($class);
        
        $path = $this->db->escape($path);
        
        $sql = "INSERT INTO `" . TABLE_WIDGETS . "` (
        `name`, `path`, `class`, `activated`
        ) VALUES (
        '" . $name . "', '" . $path . "', '" . $class . "', '1'
        )";
        
        $db_erg = $this->db->query($sql) or die($this->lang['ERROR_DATABASE_QUERY'] . mysql_error());
        
    }
    
    //Löscht ein Widget.
    public function deleteWidget ($path) {
        
        $sql = "DELETE FROM `" . TABLE_WIDGETS . "` WHERE `path` = '" . $this->db->escape($path) . "'; ";
        $db_erg = $this->db->query($sql) or die($this->lang['ERROR_DATABASE_QUERY'] . mysql_error());
        
    }
    
    //Liefert alle Widgets als Array zurück.
    public function getWidgets () {
        
        $widget_data = $this->getAllWidgetData();
        $res = array();
        
        if ($widget_data) {
            foreach($widget_data as $widgetdata) {
                $res[] = $widgetdata;
            }
        }
        
        return $res;
        
    }
    
    //Gibt alle Widgets zurück.
    public function getAllWidgetData () {
    
        $res = array();
    
        $sql = "SELECT class, path FROM `" . TABLE_WIDGETS . "` WHERE `activated` = '1'; ";
        $db_erg = $this->db->query($sql) or die($this->lang['ERROR_DATABASE_QUERY'] . mysql_error());
    
        while ($zeile = $this->db->fetch_array($db_erg)) {
            $res[] = $zeile;
        }
  
        return $res;

    }
    
    //Gibt WidgetData als Array zurück.
    public function getWidgetData ($path) {
    
    $db = $this->db;
        
        $sql = "SELECT class, path FROM `" . TABLE_WIDGETS . "` WHERE `path` = '" . $db->escape($path) . "' AND `activated` = '1'; ";
        $db_erg = $this->db->query($sql) or die($this->lang['ERROR_DATABASE_QUERY'] . mysql_error());
        
        return $this->db->fetch_array($db_erg);
        
    }
    
    //Includiert ein Array und gibt das Widget als Objekt zurück.
    public function getWidget ($widgetdata) {
        
        require_once("../" . $widgetdata['path']);
        return new $widgetdata['class']($this->sys);
        
    }
    
}

?>