<?php

//Für den AutoLoader
function auto_load ($class) {
    require("CMS/classes/" . $class . ".php");//Hinweis: Ihr könnt die Klammern auch weglassen, nähere Infos gibt es bei Simon^^ (http://www.developertalk.de/user/2-simon/)
}

function __autoload ($class) {

    // die bösesten zeichen in klassennamen mal sicherheitshalber verbieten
    if (strpos ($class, '.') !== false || strpos ($class, '/') !== false
      || strpos ($class, '\\') !== false || strpos ($class, ':') !== false) {
    return;
    }
    
    if (file_exists ("CMS/classes/" . $class . ".php")) {
    auto_load($class);
    } else {
        //
    }
    
}

/*require("CMS/classes/Database.php");//Hinweis: Ihr könnt die Klammern auch weglassen, nähere Infos gibt es bei Simon^^ (http://www.developertalk.de/user/2-simon/)
require("CMS/classes/Language.php");
require("CMS/classes/Settings.php");
require("CMS/classes/DBManager.php");
require("CMS/classes/Config.php");
require("CMS/classes/SkinController.php");
require("CMS/classes/View.php");
require("CMS/classes/Page.php");
require("CMS/classes/Menu.php");*/

?>