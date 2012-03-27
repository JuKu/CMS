<?php

class AdminMenu {
    
    public static function getMenu () {
    
    global $db;
    global $lang;
            
        echo "<div id=\"menu\">";
        
        $sql = "SELECT * FROM `" . TABLE_ADMINMENU . "` WHERE `OwnerMenu` = '-1' AND `activated` = '1' ORDER BY `showNumber`; ";
        $db_erg = $db->query($sql) or die($lang['ERROR_DATABASE_QUERY'] . mysql_error());
        
        while ($zeile = mysql_fetch_array($db_erg, MYSQL_ASSOC)) {
            echo "<ul>\r\n";
            
            if ($zeile['expand'] == "0") {
                echo "<li><a class=\"direkt\" href=\"index.php?include=" . $zeile['file'] . "\">" . MenuNames::getName($zeile['name']) . "</a></li>\r\n";
            } else {
                echo "<li><h3>" . MenuNames::getName($zeile['name']) . "</h3>\r\n";
                AdminMenu::getUntermenu($zeile['id']);
                
                echo "</li>\r\n";
            }
            
            echo "</ul>\r\n\r\n";
            echo "</div><!-- schließt die Menüleiste #menu -->";
            
            echo "<div style=\"clear: both;\"> </div>";
        
        }
        
    }
    
    function getUntermenu ($id) {
    
    global $db;
    global $lang;
        
        $sql = "SELECT * FROM `" . TABLE_ADMINMENU . "` WHERE `OwnerMenu` = '" . $db->escape(trim($id)) . "' AND `activated` = '1' ORDER BY `showNumber`; ";
        
        $db_erg = $db->query($sql) or die($lang['ERROR_DATABASE_QUERY'] . mysql_error());
        
        echo "<ul>";
        
        while ($zeile = mysql_fetch_array($db_erg, MYSQL_ASSOC)) {
            
            if ($zeile['expand'] == "0") {
                echo "<li><h3><a href=\"index.php?include=" . $zeile['file'] . "\">" . MenuNames::getName($zeile['name']) . "</a></h3></li>";
            } else {
                echo "<li><h3><a href=\"index.php?include=" . $zeile['file'] . "\">" . MenuNames::getName($zeile['name']) . "</a></h3>\r\n";
                
                echo "<ul>\r\n";
                
                $sql = "SELECT * FROM `" . TABLE_ADMINMENU . "` WHERE `Ownermenu` = '" . $zeile['id'] . "' AND `activated` = '1' ORDER BY `showNumber`; ";
                
                $db_erg = mysql_query($sql) or die($lang['ERROR_DATABASE_QUERY'] . mysql_error());
                
                while ($zeile_ = mysql_fetch_array($db_erg, MYSQL_ASSOC)) {
                    echo "<li><a href=\"index.php?include=" . $zeile_['file'] . "\">" . MenuNames::getName($zeile_['name']) . "</a></li>\r\n";
                }
                
                echo "</ul></li>\r\n";
            }
            
        }
        
        echo "</ul>";
        
    }
    
}

?>