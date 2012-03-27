<?php 

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(//Mit dem Befehl array_merge füge ich dem Array ein Array hinzu, d.h., wenn es etwas noch nicht gibt, wird die Standart-Sprachdatei genommen.
    'ADMIN_CONFIG'				=> 'Administrator-Konfiguration',
    'CATEGORY'                  => 'Categorie',
    'CHANGE'                    => 'Change',
    'UPDATE'                    => 'Update',
    'ADMIN_PASSWORD'            => 'Administrator-Password',
    'ADMIN_PASSWORD_CONFIRM'    => 'Confirm Administrator-Password'
));

?>