<?php

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(//Mit dem Befehl array_merge füge ich dem Array ein Array hinzu, d.h., wenn es etwas noch nicht gibt, wird die Standart-Sprachdatei genommen.
    'ERROR_FILE_NOT_FOUND'		=> 'Die Datei konnte nicht gefunden werden.',
    'ERROR_DATABASE_CONNECT'    => 'Es konnte keine Verbindung zur Datenbank hergestellt werden.',
    'ERROR_DATABASE_SELECT'     => 'Die Datenbank konnte nicht ausgew&auml;hlt werden.',
    'ERROR_DATABASE_QUERY'      => 'Anfrage fehlgeschlagen.',
    'ERROR_TABLE_NOT_EXISTS'    => 'Die Datenbank-Tabelle %s ist nicht vorhanden.',
    'ERROR_NO_INDEX'            => 'Die Datenbank-Tabelle hat keinen Index.'
));

?>