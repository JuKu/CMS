<?php

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(//Mit dem Befehl array_merge füge ich dem Array ein Array hinzu, d.h., wenn es etwas noch nicht gibt, wird die Standart-Sprachdatei genommen.
    'ERROR_FILE_NOT_FOUND'	=> 'The file could not be found.',
    'ERROR_DATABASE_CONNECT'    => 'It could not connect to database.',
    'ERROR_DATABASE_SELECT'     => 'Die Datenbank konnte nicht ausgew&auml;hlt werden.',
    'ERROR_DATABASE_QUERY'      => 'Request failed.',
    'ERROR_TABLE_NOT_EXISTS'    => 'The Database-Table %s does not exists.',
    'ERROR_NO_INDEX'            => 'Die Datenbank-Tabelle hat keinen Index.'
));

?>