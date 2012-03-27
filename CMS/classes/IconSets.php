<?php

class IconSets {

    protected $sys = null;
    protected $db = null;
    
    protected $log = null;
    protected $lang = array();

    public function __construct ($sys, $db) {
        $this->sys = $sys;
        $this->db = $db;
        $this->log = $sys->getLog();
        $this->lang = $sys->getLang();
    }
    
    public function getIconSet () {
        
        $icon_set = Settings::getSetting("icon_set");
        
        $sql = "SELECT * FROM `" . TABLE_ICONSETS . "` WHERE `name` = '" . $icon_set . "'; ";
        $db_erg = $this->db->query($sql) or die($this->lang['ERROR_DATABASE_QUERY'] . mysql_error());
        
        $res = null;
        
        $zeile = $this->db->fetch_array($db_erg);
        
        if ($zeile) {
            $res = $zeile;
        } else {
            $res = -1;
        }
        
        return $res;
        
    }
    
    public function getAllIconSets () {
        
        $sql = "SELECT * FROM `" . TABLE_ICONSETS . "`; ";
        $db_erg = $this->db->query($sql) or die($this->lang['ERROR_DATABASE_QUERY'] . mysql_error());
        
        $res = array();
        
        while ($zeile = $this->db->fetch_array($db_erg)) {
            $res[] = $zeile;
        }
        
        return $res;
        
    }
    
    public function getIconPath () {
        
        $icon_set = $this->getIconSet();
        return $icon_set['path'];
        
    }
    
    public function addIconSet ($name, $path, $copyright, $lizenz) {
    
    global $user;
        
        $sql = "INSERT INTO `" . TABLE_ICONSETS . "` (
        `name`, `path`, `copyright`, `lizenz_text`
        ) VALUES (
        '" . $this->db->escape($name) . "', '" . $this->db->escape($path) . "', '" . $this->db->escape($copyright) . "', '" . $this->db->escape($lizenz) . "'
        ); ";
        
        $db_erg = $this->db->query($sql) or die($this->lang['ERROR_DATABASE_QUERY'] . mysql_error());
        
        if (isset($user) && !empty($user)) {
            //
        } else {
            $user = "System";
        }
        
        $this->log->writeLog($user, "Icon-Set &quot;" . $this->db->escape($name) . "&quot; hinzugef&uuml;gt.");
        
    }
    
    public function setIconSet ($name) {
        Settings::setSetting("icon_set", $this->db->escape($name));
    }
    
}

?>