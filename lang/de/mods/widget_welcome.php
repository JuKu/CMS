<?php

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(//Mit dem Befehl array_merge füge ich dem Array ein Array hinzu, d.h., wenn es etwas noch nicht gibt, wird die Standart-Sprachdatei genommen.
    'WIDGET_WELCOME_TITLE'	    => 'Willkommen im CMS Admin-Bereich',
    'WIDGET_WELCOME_TEXT'       => 'Herzlich Willkommen in Admin-Bereich.<br />Mit diesem Dashboard kannst du manche Aufgaben noch einfacher meistern.<br /><br />Schau dich doch mal um! ;-)'
));

?>