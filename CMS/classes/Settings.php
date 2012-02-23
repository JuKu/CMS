<?php

class Settings {
    
    public static function getSetting($property) {
        
        global $db;
        
        $sql = "SELECT `value` FROM `cms_settings` WHERE `property` = '" . $db->escape($property) . "'; ";
        $db_erg = $db->query($sql) or die("Anfrage fehlgeschlagen.");

        $zeile = $db->fetch_array($db_erg);

        if (isset($zeile['value'])) {
            return $zeile['value'];
        } else {
            return false;
        }
        
    }
    
    public static function setSetting($property, $value) {
        
        global $db;
        
        $property = $db->escape($property);
        $value = $db->escape($value);
        $sql = "UPDATE `cms_settings` SET `value` = '" . $value . "' WHERE `property` = '" . mysql_real_escape_string(trim($property)) . "'; ";
        $db_erg = $db->query($sql) or die("Anfrage fehlgeschlagen.");
        
    }
    
}

?>