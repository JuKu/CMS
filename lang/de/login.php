<?php

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(//Mit dem Befehl array_merge füge ich dem Array ein Array hinzu, d.h., wenn es etwas noch nicht gibt, wird die Standart-Sprachdatei genommen.
    'ERROR_NO_USERNAME'		    => 'Sie haben keinen Benutzernamen angegeben.',
    'ERROR_NO_PASSWORD'         => 'Sie haben kein Passwort angegeben.',
    'LOGIN_OK'                  => 'Sie wurden erfolgreich eingeloggt.',
    'ACCOUNT_DEACTIVATED'       => 'Dieses Benutzerkonto wurde gesperrt.',
    'BACK'                      => 'Zur&uuml;ck',
    'PASSWORD_WRONG'            => 'Sie haben ein falsches Passwort angegeben.',
    'USERNAME_NOT_ISSET'        => 'Dieser Benutzername ist nicht in der Datenbank vorhanden.',
    'LOGOUT_OK'                 => 'Sie wurden erfolgreich ausgeloggt.'
));

?>