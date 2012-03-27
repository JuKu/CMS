<?php

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(//Mit dem Befehl array_merge füge ich dem Array ein Array hinzu, d.h., wenn es etwas noch nicht gibt, wird die Standart-Sprachdatei genommen.
    'ERROR_NO_USERNAME'		=> 'The Username is empty.',
    'ERROR_NO_PASSWORD'         => 'The Password is empty.',
    'LOGIN_OK'                  => 'Your LOgin was successful.',
    'ACCOUNT_DEACTIVATED'       => 'This Account was be look.',
    'BACK'                      => 'Back',
    'PASSWORD_WRONG'            => 'The Password is wrong.',
    'USERNAME_NOT_ISSET'        => 'This Username does not exist in the database.',
    'LOGOUT_OK'                 => 'You have successfully logged out.',
    'WELCOME'			=> 'Welcome',
    'LOGIN_TITLE'		=> 'Login',
    'USERNAME'			=> 'Username',
    'PASSWORD'			=> 'Password',
    'LOGIN'			=> 'Login',
    'IS_LOGIN'			=> 'Is login.'     
));

?>