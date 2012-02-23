<?php

class Messages {
    
    private $userid = 0;
    private $fehlermeldung_gesperrt = "";
    
    public function Messages ($userid) {
        $this->userid = $userid;
    }
    
    public function getMessage ($id) {
    
    global $db;
        
        $sql = "SELECT * FROM `messages` WHERE `id` = '" . $db->escape($id) . "'; ";
        $db_erg = $db->query($sql);
        
        $i = 0;
        
        while ($zeile = $db->fetch_array($db_erg)) {
            
            if ($zeile['to_userid'] == $this->userid) {
                
                if ($zeile['activated'] == 0) {
                    echo $this->fehlermeldung_gesperrt;
                }
                
            }
            
            $i++;
        }
        
    }
    
}

?>