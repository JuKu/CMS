<?php

error_reporting(E_ALL);

require("CMS/classes/Database.php");//Hinweis: Ihr könnt die Klammern auch weglassen, nähere Infos gibt es bei Simon^^ (http://www.developertalk.de/user/2-simon/)
require("CMS/classes/Lang.php");
require("CMS/classes/Settings.php");
require("CMS/classes/DBManager.php");
require("CMS/classes/Config.php");
require("CMS/classes/SkinController.php");
require("CMS/classes/View.php");
require("CMS/classes/Page.php");
require("CMS/classes/Menu.php");

$config_ = new Config("config.ini");
$DBManager = new DBManager($config_->getConfig());

if (!$DBManager->isInit() || !$DBManager->getDBDriver()) {
    echo "Ein Fehler ist aufgetreten.";
    exit;
}

$db = $DBManager->getDBDriver();
$db->connect($config_->getConfig());

$skincontroller = new SkinController();
$page = new Page();

//echo Settings::getSetting("selectedskin") . "<br />";//Zum testen, danach bitte diese zeile entfernen
//echo "Ihr Style-Pfad: " . SkinController::getSelectedSkin();

$view = new View(SkinController::getSkinPath() . "/index.php");
$view->showPage();

?>