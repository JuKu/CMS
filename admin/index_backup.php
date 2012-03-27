<?php

session_start();
error_reporting(E_ALL);

require("../CMS/constants.php");

//Für den AutoLoader
function auto_load ($class) {
    require("../CMS/classes/" . $class . ".php");//Hinweis: Ihr könnt die Klammern auch weglassen, nähere Infos gibt es bei Simon^^ (http://www.developertalk.de/user/2-simon/)
}

function __autoload ($class) {

    // die bösesten zeichen in klassennamen mal sicherheitshalber verbieten
    if (strpos ($class, '.') !== false || strpos ($class, '/') !== false
      || strpos ($class, '\\') !== false || strpos ($class, ':') !== false) {
    return;
    }

    if (file_exists ("../CMS/classes/" . $class . ".php")) {
    auto_load($class);
    } else {
        //
    }

}

$config_ = new Config("../config.ini");
$DBManager = new DBManager($config_->getConfig());

if (!$DBManager->isInit() || !$DBManager->getDBDriver()) {
    echo "Ein Fehler ist aufgetreten.";
    exit;
}

//Standart-Sprachdateien laden
$language = new Language("en");
$lang = $language->getLanguage();

$db = $DBManager->getDBDriver();
$db->connect($config_->getConfig());

$language = Language::loadLanguage();
$lang = array_merge($lang, $language->getLanguage());

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
  <head>
    <title>Admin-Bereich</title>
    <style type="text/css">
    #navi {
        color:blue;
    }
    #navi li {
        list-style-type : none;
        height:40px;
        background:url('../images/admin/Navi.gif') no-repeat;
        color:white;
        padding-left:20px;
        padding-top:10px;
        float: left;
        margin-top:0px;
        width:140px;
    }
    
    a {
        /*color:#00C9FF;*/
        color:#FFA200;
    }
    
    #inhalt {
        background-color:#F1F1F1;
        color:black;
        position:absolute;
        top:120px;
        width:80%;
        min-height:250px;
    }
    
    #adminchat_ {
        position:absolute;
        top:120px;
        left:81%;
        width:20%;
        background-color:#99AEEB;
        color:#2F5EEB;
    }
    </style>
    <style type="text/css">
/*--Setzt alle Abstände auf "Null"--*/
* {
margin: 0;
padding: 0;
}

/*--formatiert die Menüleiste--*/
#menu {
width: 100%;
padding: 0 20px;
background: #003366;
font-family: Verdana;
font-size: 1em;
line-height: 1.5;
float: left;
}

/*--formatiert die Themenblöcke--*/
#menu ul {
float: left;
width: 140px;
list-style-type: none;
}

/*--definiert die Blocküberschriften--*/
#menu h3 {
font-size: 1em;
text-align: center;
color: #000;
border: 1px solid #003366; /*--erforderlich für IE 7--*/
background: #ff8000;
}

/*--definiert die "Drop-Down-Links" im Normalzustand--*/
#menu a {
text-decoration: none;
display: block;
border: 1px solid #ccc;
text-align: center;
background: #ff9224;
color: #003366;
}

/*--definiert die "Drop-Down-Links" im Hoverzustand--*/
#menu a:hover {
color: #ff9224;
background: #003366;
}

/*
*verhindert im Zusammenhang mit position absolute bei ul ul
*eine Höhenvergrößerung von #menu beim Hovern--
*/

#menu li {
position: relative;
}

/*--versteckt die "Drop-Down-Links", solange nicht gehovert wird--*/
#menu ul ul {
position: absolute;
z-index: 2;
display: none;
}

/*--lässt die Dropdown-Links beim Hovern erscheinen--*/
#menu ul li:hover ul {
display: block;
}

/*--nur für IE-Versionen kleiner gleich 6 erkennbar--*/

* html #menu ul li {
float: left;
width: 100%;
}

/*--nur für IE 7 erkennbar--*/

*+ html #menu ul li {
float: left;
width: 100%;
}

/*--bewirkt Hover-Effekt für IE kleiner 7 auch für ul- und li-Elemente--*/
*html body {
behavior: url(csshover3-source.htc);
font-size: 100%;
}

*html #menu ul li a {
height: 1%;
}

/*--definiert einen Einzellink im Normalzustand, wenn kein Drop-Down erforderlich--*/

#menu a.direkt:link {
font-size: 1em;
font-weight: bold;
text-align: center;
color: #000;
border: 1px solid #003366;
background: #ff8000;
}

/*--definiert einen Einzellink im Hoverzustand, wenn kein Drop-Down erforderlich--*/

#menu a.direkt:hover {
color: #ff9224;
background: #003366;
border: 1px solid #ccc;
}

/*--versteckt die dritte Ebene--*/

#menu ul li:hover ul ul {
display: none;
}

/*-- lässt die dritte Ebene beim Hovern über die zweite in Erscheinung treten und nach rechts ausklappen--*/

div#menu ul ul li:hover ul {
display: block;
position: absolute;
top: 0;
left: 100%;
}
</style>
  </head>
  <body>
  
  
  <?php
  

  
  $user = new User("loginformular.php", $lang);

if (isset($_REQUEST['option']) && $_REQUEST['option'] == "logout") {
    $user->logout();
}

if ($user->islogin()) {

    echo "<h1>Herzlich Willkommen " . $user->getName() . "</h1>";

} else {
    $user->login();
    echo "</body></html>";

    exit;
}

if (isset($ausgeloggt_ok) && $ausgeloggt_ok == 1) {
      echo "<p>Sie wurden erfolgreich ausgeloggt.</p>";
}

AdminMenu::getMenu();

echo "<div id=\"inhalt\" style=\"background-color:#003366; \"><div style=\"color:white; \">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Admin-Bereich</b></div><div style=\"margin:20px; margin-top:8px; background-color:/*#008080*//*#308182*//*#003366*/#F1F1F1; min-height:240px; \">test";

echo "</div></div>";
  
  ?>
  
  </body>
</html>