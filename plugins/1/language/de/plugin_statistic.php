<?php

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(//Mit dem Befehl array_merge füge ich dem Array ein Array hinzu, d.h., wenn es etwas noch nicht gibt, wird die Standart-Sprachdatei genommen.
    'PLUGIN_STATISTIC_HOME'	=> 'Statistiken-Plugin',
    'PLUGIN_STATISTIC_ERROR'	=> 'Ein Error ist bei diesem Plugin aufgetreten.'
));

?>