<?php

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(//Mit dem Befehl array_merge füge ich dem Array ein Array hinzu, d.h., wenn es etwas noch nicht gibt, wird die Standart-Sprachdatei genommen.
    'PLUGIN_DBMANAGER_TITLE'	=> 'Datenbank-Manager',
    'PLUGIN_DBMANAGER_TABLES'	=> 'Datenbank-Tabellen'
));

?>