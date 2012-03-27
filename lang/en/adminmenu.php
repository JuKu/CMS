<?php

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(//Mit dem Befehl array_merge füge ich dem Array ein Array hinzu, d.h., wenn es etwas noch nicht gibt, wird die Standart-Sprachdatei genommen.
    'GENERAL'	                => 'Gerneral',
    'SETTINGS'                  => 'Settings',
    'STARTPAGE'                 => 'Startpage',
    'DESIGN'                    => 'Design',
    'MANAGE_USERS'              => 'manage Users',
    'MANAGE_GROUPS'             => 'manage Groups',
    'EDIT_METATAGS'             => 'edit Meta-Tags',
    'PAGES_AND_MENUS'           => 'Pages &amp; Menus',
    'EDIT_PAGES'                => 'edit Pages',
    'EDIT_MENUS'                => 'edit Menus',
    'GUESTBOOK'                 => 'Guestbook',
    'NEWS'                      => 'News',
    'PLUGINS'                   => 'Plugins',
    'EXTRAS'                    => 'Extras',
    'LOGOUT'                    => 'Logout'
));

?>