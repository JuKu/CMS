<?php

class Log {

    protected $db = null;
    protected $lang = array();

    public function Log ($db, $lang) {
        $this->db = $db;
        $this->lang = $lang;
    }
    
    public function writeLog ($user, $text) {
        
        $sql = "INSERT INTO `" . TABLE_LOG . "` (
        `id`, `user`, `text`, `activated`
        ) VALUES (
        NULL, '" . $this->db->escape($user) . "', '" . $this->db->escape($text) . "', '1'
        ); ";
        $db_erg = $this->db->query($sql) or die($lang['ERROR_DATABASE_QUERY'] . mysql_error());
        
    }
    
    public function getLog () {
        
        $sql = "SELECT * FROM `" . TABLE_LOG . "` ORDER BY `id` DESC LIMIT 0, 5; ";
        $db_erg = $this->db->query($sql) or die($this->lang['ERROR_DATABASE_QUERY'] . mysql_error());
        
        $res = array();
        
        while ($zeile = $this->db->fetch_array($db_erg)) {
            $res[] = $zeile;
        }
        
        return $res;
        
    }
    
}

?>