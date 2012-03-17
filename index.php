<?php

error_reporting(E_ALL);

require("CMS/constants.php");
require("CMS/functions.php");

$config_ = new Config("config.ini");
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

EventManager::throwEvent("include", ".", $db);

$language = Language::loadLanguage();
$lang = array_merge($lang, $language->getLanguage());

EventManager::throwEvent("lang_include", ".", array($language, $lang));

$skincontroller = new SkinController();
$page = new Page();

//echo Settings::getSetting("selectedskin") . "<br />";//Zum testen, danach bitte diese zeile entfernen
//echo "Ihr Style-Pfad: " . SkinController::getSelectedSkin();

$view = new View(SkinController::getSkinPath() . "/index.php");
$view->showPage();

?>