<?php

class Menu {

private $globalmenuID = 1;
    
    public function getMenu () {
    
    global $db;
        
        $sql = "SELECT * FROM `menu` WHERE `menuID` = '" . $this->globalmenuID . "' AND `activated` = '1'; ";
        
        $db_erg = $db->query($sql) or die("Anfrage fehlgeschlagen.");
        
        $skincontroller = new SkinController();//Wird eig. nur statisch aufgrerufen, deßhalb muss erst einmal ein Objekt erstellt werden.
        
        while ($zeile = $db->fetch_array($db_erg, MYSQL_ASSOC)) {
            $skincontroller->showMenu($zeile['href'], $zeile['content'], $zeile['id'], $zeile['menuID']);
        }
        
    }
    
    public function getUnderMenu ($menu) {
    
    global $db;
    
        $skincontroller = new SkinController();
        
        $sql = "SELECT * FROM `menu` WHERE `menuID` = '" . $this->globalmenuID . "' AND `owner` = '" . $menu . "'; ";
        
        $db_erg = $db->query($sql) or die("Anfrage fehlgeschlagen.");
        
        while ($zeile = $db->fetch_array($db_erg, MYSQL_ASSOC)) {
            $skincontroller->showUnderMenu($zeile['href'], $zeile['content'], $zeile['id'], $zeile['menuID']);
        }
        
    }
    
}

?>