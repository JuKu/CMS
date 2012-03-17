<?php

class EventManager {

    public function addEvent ($event, $file) {
    
    global $db;
    global $lang;
    
        $sql = "INSERT INTO `" . TABLE_EVENTS . "` (
        `event`, `file`, `pluginEvent`, `page`
        ) VALUES (
        '" . $db->escape($event) . "', '" . $db->escape($file) . "', '-1', '-1'
        ); ";
        $db_erg = $db->query($sql) or die($lang['ERROR_DATABASE_QUERY'] . "" . mysql_error());
        
    }
    
    public function throwEvent ($event, $folder, $args) {
    
    global $db;
    global $lang;
            
        $handler = self::getEvent($event);
        if ($handler) {
            foreach($handler as $file) {
                require($folder . "/" . $file);
            }
        }
        
    }
    
    public function getEvent ($event) {
        
    global $db;
    
        $res = null;
    
        $db_erg = $db->query("SELECT file FROM `" . TABLE_EVENTS . "` WHERE `event` = '" . $db->escape($event) . "' AND `page` = '-1'; ");
        while($zeile = $db->fetch_array($db_erg)) {
            $res[] = $zeile['file'];
        }
        return $res;
        
    }
    
}

?>