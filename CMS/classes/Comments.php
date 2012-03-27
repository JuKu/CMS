<?php

class Comments {

    protected $db = null;
    protected $lang = array();
    
    public function __construct ($db, $lang) {
        $this->db = $db;
        $this->lang = $lang;
    }
    
    public function getComments ($pageid) {
        
        $sql = "SELECT * FROM `" . TABLE_COMMENTS . "` WHERE `pageid` = '" . $this->db->escape($pageid) . "' AND `activated` = '1'; ";
        $db_erg = $this->db->query($sql) or die($this->lang['ERROR_DATABASE_QUERY'] . mysql_error());
        
        $res = array();
        
        while ($zeile = $this->db->fetch_array($db_erg)) {
            $res[] = $zeile;
        }
        
        return $res;
        
    }
    
    public function addComment ($pageid, $username, $userid, $email, $text) {
    
        $comments = Settings::getSettings("comments");
    
        if ($comments == 2) {
            $i = 2;
        } else if ($comments == 1) {
            $i = 1;
        } else {
            return -1;
        }
        
        if (Settings::getSetting("page_settings_comment") == 1) {//Seiteneinstellungen überprüfen
            
            $sql = "SELECT * FROM `" . TABLE_PAGES . "` WHERE `pageid` = '" . $this->db->escape($pageid) . "' AND `acivated` = '1'; ";
            $db_erg = $this->db->query($sql) or die($this->lang['ERROR_DATABASE_QUERY'] . mysql_error());
            
            while ($zeile = $this->db->fetch_array($db_erg)) {
                
                if ($zeile['comments'] == 1) {
                    $i = 1;
                } else if ($zeile['comments'] == 2) {
                    $i = 2;
                } else {
                    $i = 0;
                    return -1;
                }
                
            }
            
        }
        
        if ($userid == null || $userid == 0 || $userid == -1) {
            $userid = Settings::getSetting("guest_userid");
        }
        
        $sql = "INSERT INTO `" . TABLE_COMMENTS . "` (
        `id`, `pageid`, `username`, `userid`, `email`, `text`, `date`, `activated`
        ) VALUES (
        NULL, '" . $this->db->escape($pageid) . "', '" . $this->db->escape($username) . "', '" . $this->db->escape($userid) . "', '" . $this->db->escape($email) . "', '" . $this->db->escape($text) . "', CURRENT_TIMESTAMP, '" . $i . "'
        ); ";
        $db_erg = $this->db->query($sql) or die($this->lang['ERROR_DATABASE_QUERY'] . mysql_error());
        
        return true;
        
    }
    
}

?>