<?php

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(//Mit dem Befehl array_merge füge ich dem Array ein Array hinzu, d.h., wenn es etwas noch nicht gibt, wird die Standart-Sprachdatei genommen.
    'GENERAL'	                => 'Allgemeines',
    'SETTINGS'                  => 'Einstellungen',
    'STARTPAGE'                 => 'Startseite',
    'DESIGN'                    => 'DESIGN',
    'MANAGE_USERS'              => 'User verwalten',
    'MANAGE_GROUPS'             => 'Gruppen verwalten',
    'EDIT_METATAGS'             => 'Meta-Tags verwalten',
    'PAGES_AND_MENUS'           => 'Seiten &amp; Men&uuml;s',
    'EDIT_PAGES'                => 'Seiten verwalten',
    'EDIT_MENUS'                => 'Men&uuml;s verwalten',
    'GUESTBOOK'                 => 'G&auml;stebuch',
    'NEWS'                      => 'News',
    'PLUGINS'                   => 'Plugins',
    'EXTRAS'                    => 'Extras',
    'LOGOUT'                    => 'Logout'
));

?>