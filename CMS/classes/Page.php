<?php

class Page {

    var $id = -1;
    var $alias = '';
    var $title = '';
    var $gesperrt = -1;
    var $editable = -1;
    var $activated = -1;
    var $owner = -1;
    var $menu = -1;
    
    private $breadcrump;
    private $breadcrump_zaehler = 0;
    
    public function Page () {
        
        if (!isset($_REQUEST['include'])) {
            $this->alias = "Startseite";
        } else {
            $this->alias = $_REQUEST['include'];
        }
        
        $this->loadPage();
        
    }
    
    public function loadPage () {
    
    global $db;
        
        $sql = "SELECT * FROM `pages` WHERE `alias` = '" . $db->escape($this->alias) . "'; ";
        
        $db_erg = $db->query($sql) or die("Anfrage fehlgeschlagen.");//Fehlerbehebung mit Exceptions, ... kommt später.
        
        $i = 0;
        
        while ($zeile = $db->fetch_array($db_erg, MYSQL_ASSOC)) {
            $this->id = $zeile['id'];
            $this->title = $zeile['title'];
            $this->gesperrt = $zeile['gesperrt'];
            $this->editable = $zeile['editable'];
            $this->activated = $zeile['activated'];
            $this->owner = $zeile['owner'];
            $this->alias = $zeile['alias'];
            $this->menu = $zeile['menu'];
            
            $i = $i + 1;
        }
        
        if ($i == 0) {//Seite ist nicht in der Datenbank "registriert".
            $this->alias = "404";//Seite wurde nicht gefunden.
            $this->loadPage();//Dieselbe Methode nochmal aufrufen, um die 404-Seite zu laden.
        }
        
        if ($i > 1) {//Seite ist mehrmals in der Datenbank vorhanden.
            //Ins Fehler-Protokoll schreiben (wird später geschrieben).
        }
        
    }
    
    public function getHeader () {
    
    global $db;
        
        $sql = "SELECT * FROM `cms_meta_global`";
        
        $db_erg = $db->query($sql) or die("Anfrage fehlgeschlagen.");
        
        $meta_tags = "";
        
        while ($zeile = $db->fetch_array($db_erg, MYSQL_ASSOC)) {
            $meta_tags = $meta_tags . "<meta name=\"" . $zeile['name'] . "\" content=\"" . $zeile['content'] . "\" />\r\n";
        }
        
        echo $meta_tags;
        
    }
    
    public function getTitle () {
        return $this->title;
    }
    
    public function getContent () {
    
        $filename = $this->alias;
        
        $file = preg_replace("/[^a-z0-9\-\/]/i","",$filename);
        if(isset($file[0]) && $file[0] == "/"){
            $file = substr($filename,1);
        }
        
        $file = "Content/pages/" . $file;
        $file .= ".php";
        
        if(!file_exists($file)){
            $file = "Content/pages/404.php";
            $this->alias = "404";
            $this->loadPage();//Seite 404.php laden.
            $this->getContent();//Methode erneuert aufrufen.   
        } else {
            require($file); 
        }   
        
    }
    
    public function getMenu () {
        $menu = new Menu();
        $menu->getMenu();
    }
    
    public function getBreadcrump () {
        
        if ($this->owner == -1) {
            $this->addBreadcrump($this->alias, $this->title, $this->id, $this->owner);
        } else {
            $this->getOwner($this->id);
        }
        
        $this->showBreadcrump();
        
    }
    
    public function getOwner ($owner) {
    
    global $db;
    global $skincontroller;
    
        $sql = "SELECT * FROM `pages` WHERE `id` = '" . $owner . "';";
        
        $db_erg = $db->query($sql) or die("Anfrage fehlgeschlagen.");
        
        $owner_title = "";
        $owner_alias = "";
        $owner_owner = -1;
        $owner_id = 1;
        
        while ($zeile = $db->fetch_array($db_erg, MYSQL_ASSOC)) {
            $owner_id = $zeile['id'];
            $owner_alias = $zeile['alias'];
            $owner_title = $zeile['title'];
            $owner_owner = $zeile['owner'];
        }
        
        //$skincontroller->showBreadcrump($owner_alias, $owner_title, $owner_id, $owner_owner);
        $this->addBreadcrump($owner_alias, $owner_title, $owner_id, $owner_owner);
        
        if ($owner_owner != -1) {
            $this->getOwner($owner_owner);
        }
        
    }
    
    public function addBreadcrump ($alias, $title, $id, $owner) {
        $this->breadcrump[$this->breadcrump_zaehler]['alias'] = $alias;
        $this->breadcrump[$this->breadcrump_zaehler]['title'] = $title;
        $this->breadcrump[$this->breadcrump_zaehler]['id'] = $id;
        $this->breadcrump[$this->breadcrump_zaehler]['owner'] = $owner;
        $this->breadcrump_zaehler++;
    }
    
    public function showBreadcrump () {
    
    global $skincontroller;
        
        for ($i = $this->breadcrump_zaehler - 1; $i >= 0; $i = $i - 1) {
            $skincontroller->showBreadcrump($this->breadcrump[$i]['alias'], $this->breadcrump[$i]['title'], $this->breadcrump[$i]['id'], $this->breadcrump[$i]['owner']);
        }
        
    }
    
    public function getWebsiteTitle () {
        return Settings::getSetting("title");
    }
    
}

?>