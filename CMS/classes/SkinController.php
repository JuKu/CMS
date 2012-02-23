<?php

class SkinController {

private $text_menu_list = "";
private $text_undermenu_list = "";
private $text_breadcrump_first_list = "";
private $text_breadcrump_list = "";
private $breadcrump_zaehler = 0;

    public function SkinController () {
        
        $handle = fopen ("styles/" . SkinController::getSelectedSkin() . "/menu_list.php", "r");

        while (!feof($handle)) {
        $buffer = fgets($handle);
        $this->text_menu_list .= $buffer;
        }
        
        fclose($handle);
        
        $handle = fopen ("styles/" . SkinController::getSelectedSkin() . "/undermenu_list.php", "r");

        while (!feof($handle)) {
        $buffer = fgets($handle);
        $this->text_undermenu_list .= $buffer;
        }

        fclose($handle);
        
        $handle = fopen ("styles/" . SkinController::getSelectedSkin() . "/breadcrump_first_list.php", "r");

        while (!feof($handle)) {
        $buffer = fgets($handle);
        $this->text_breadcrump_first_list .= $buffer;
        }

        fclose($handle);
        
        $handle = fopen ("styles/" . SkinController::getSelectedSkin() . "/breadcrump_list.php", "r");

        while (!feof($handle)) {
        $buffer = fgets($handle);
        $this->text_breadcrump_list .= $buffer;
        }

        fclose($handle);
        
    }
    
    public function getSelectedSkin () {
        return Settings::getSetting("selectedskin");
    }
    
    public function getSkinPath () {
    
    if (!file_exists("Cache")) {
        mkdir("Cache");
    }
    
    if (!file_exists("Cache/styles")) {
        mkdir("Cache/styles");
    }
    
    if (!file_exists("Cache/styles/" . SkinController::getSelectedSkin())) {
        mkdir("Cache/styles/" . SkinController::getSelectedSkin());
    }
    
    if (!file_exists("Cache/styles/" . SkinController::getSelectedSkin()) . "/style.css") {
        
        if (file_exists("styles/" . SkinController::getSelectedSkin() . "/style.css")) {
            copy ("styles/" . SkinController::getSelectedSkin() . "/style.css", "Cache/styles/" . SkinController::getSelectedSkin() . "/style.css");
        }
        
    }
    
    if (!file_exists("Cache/styles/" . SkinController::getSelectedSkin() . "/index.php")) {
    
        $handle = fopen ("styles/" . SkinController::getSelectedSkin() . "/index.php", "r");
        
        $text = "";
        
        while (!feof($handle)) {
        $buffer = fgets($handle);
        $text .= $buffer;
        }
        
        fclose ($handle);
        
        $text = str_replace("{CONTENT}", SkinController::PHPCode("$" . "page->getContent()"), $text);
        $text = str_replace("{STYLE}", SkinController::PHPCode("echo Settings::getSetting(\"selectedskin\");"), $text);
        $text = str_replace("{HEADER}", SkinController::PHPCode("$" . "page->getHeader();"), $text);
        $text = str_replace("{TITLE}", SkinController::PHPCode("echo " . "$" . "page->getTitle();"), $text);
        $text = str_replace("{MENU}", SkinController::PHPCode("echo " . "$" . "page->getMenu();"), $text);
        $text = str_replace("{BREADCRUMP}", SkinController::PHPCode("echo " . "$" . "page->getBreadcrump();"), $text);
        
        $text = str_replace("{STYLEPATH}", "Cache/styles/" . SkinController::getSelectedSkin() , $text);
        
        $handle = fopen ("Cache/styles/" . SkinController::getSelectedSkin() . "/index.php", "w");
        
        fwrite($handle, $text);
        
        fclose($handle);
        
        return "Cache/styles/" . SkinController::getSelectedSkin();
        
    } else {
        return "Cache/styles/" . SkinController::getSelectedSkin();
    }

    }
    
    public function PHPCode ($text) {
        return "<" . "?" . "php " . $text . " ?" . ">";
    }
    
    public function showMenu ($href, $content, $id, $menuID) {
        
        $text = $this->text_menu_list;
        
        $text = str_replace("{HREF}", $href, $text);
        $text = str_replace("{CONTENT}", $content, $text);
        $text = str_replace("{ID}", $id, $text);
        $text = str_replace("{MENUID}", $menuID, $text);
        
        echo "" . $text;
        
        $menu = new Menu();
        $menu->getUnderMenu($id);
        
    }
    
    public function showUnderMenu ($href, $content, $id, $menuID) {

        $text = $this->text_undermenu_list;

        $text = str_replace("{HREF}", $href, $text);
        $text = str_replace("{CONTENT}", $content, $text);
        $text = str_replace("{ID}", $id, $text);
        $text = str_replace("{MENUID}", $menuID, $text);

        echo "" . $text;

    }
    
    public function showBreadcrump ($alias, $title, $id, $owner) {
        
        if ($this->breadcrump_zaehler == 0) {
            $text = $this->text_breadcrump_first_list;
        } else {
            $text = $this->text_breadcrump_list;
        }

        $text = str_replace("{HREF}", $alias . ".html", $text);
        $text = str_replace("{ALIAS}", $alias, $text);
        $text = str_replace("{CONTENT}", $title, $text);
        $text = str_replace("{ID}", $id, $text);
        $text = str_replace("{OWNER}", $owner, $text);

        echo "" . $text;
        
        $this->breadcrump_zaehler = $this->breadcrump_zaehler + 1;
        
    }
    
}

?>