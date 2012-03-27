<?php

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(//Mit dem Befehl array_merge füge ich dem Array ein Array hinzu, d.h., wenn es etwas noch nicht gibt, wird die Standart-Sprachdatei genommen.
    'ERROR_NO_STYLE'	=> 'Fehler: Es wurde kein Style angegeben.',
    'ERROR_NO_LANGUAGE'	=> 'Fehler: Es wurde keine Sprach-Datei angegeben.',
    'ERROR_NO_COMMENT'  => 'Fehler: Es wurde keine Kommentar-Option ausgew&auml;hlt.',
    'ERROR_NO_GUEST_USERID' => 'Fehler: Es wurde keine Gast-UserId angegeben.',
    'ERROR_NO_WHO_CAN_COMMIT' => 'Fehler: Es wurde keine Option ausgew&auml;hlt, wer kommentieren darf.',
    'ERROR_NO_PAGE_SETTINGS_COMMIT' => 'Fehler: Es wurden keine Seiten-Einstellungen zu den Kommentaren ausgew&auml;hlt.',
    'ERROR_NO_BREADCRUMP' => 'Fehler: Es wurde keine Option bei der Breadcrump-Navigation ausgew&auml;hlt.',
    'ERROR_LANGUAGE_WASNT_FOUND' => 'Fehler: Die Sprach-Datei konnte nicht gefunden werden.',
    'SAVE_SETTINGS_OK'  => 'Die Einstellungen wurden erfolgreich gespeichert.'
));  

?>