<?php

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(//Mit dem Befehl array_merge füge ich dem Array ein Array hinzu, d.h., wenn es etwas noch nicht gibt, wird die Standart-Sprachdatei genommen.
    'PROPERTY'				    => 'Einstellung',
    'VALUE'                     => 'Wert',
    'SETTING_SELECTEDSKIN'      => 'Ausgew&auml;hlter Style',
    'SETTING_SELECTEDSKIN_DESCRIPTION' => 'Hier k&ouml;nnen Sie einen Style ausw&auml;hlen, der angezeigt werden soll.<br />Dieser Style muss zuvor installiert sein.',
    'LANGUAGE'                  => 'Sprache',
    'LANGUAGE_DESCRIPTION'      => 'Hier k&ouml;nnen Sie die Sprache ausw&auml;hlen, die genutzt werden soll.',
    'TITLE'                     => 'Titel',
    'TITLE_DESCRIPTION'         => 'Geben Sie hier den Webseiten-Titel an, wie er oben auf allen Seitem angezeigt werden soll.',
    'COMMENT_FUNCTION'          => 'Kommentar-Funktion',
    'COMMENT_DESCRIPTION'       => 'Geben Sie hier an, ob Sie die Kommentar-Funktion ein oder ausschalten wollen.<br /><br /><b>Achtung!: </b><br />Wenn Sie diese Funktion ausschalten, werden weitere Einstellungen zu dieser Option evtl. ausgeblendet.',
    'OPTION_OFF'                => 'Ausgeschaltet',
    'OPTION_ON'                 => 'Eingeschaltet',
    'OPTION_WAIT'               => 'Mit Warteschlange',
    'GUEST_USERID'              => 'Gast-Account UserId',
    'GUEST_DESCRIPTION'         => 'Der Gast-Zugang ist haupts&auml;chlich f&uuml;r die Kommentar-Funktion vorhanden, damit auch User, die nicht eingeloggt sind, Kommentare schreiben k&ouml;nnen.',
    'WHO_CAN_COMMIT'            => 'Wer darf Kommentare schreiben?',
    'WHO_CAN_COMMIT_DESCRIPTION' => 'Gib hier an, wer Kommentare schreiben darf.',
    'OPTION_EVERYBODY'          => 'Jeder',
    'OPTION_LOGIN_USER'         => 'Angemeldete Benutzer',
    'OPTION_ADMIN'              => 'Administratoren',
    'OPTION_PAGE_FOUNDER'       => 'Seitengr&uuml;nder',
    'PAGE_SETTINGS_COMMIT'      => 'Kommentar-Einstellungen bei &quot;Seite bearbeiten&quot; anzeigen',
    'PAGE_SETTINGS_COMMIT_DESCRIPTION' => 'Geben Sie hier an, ob die Kommentar-Einstellungen angezeigt werden sollen, wenn jemand die Seite bearbeitet.',
    'OPTION_YES'                => 'Ja',
    'OPTION_NO'                 => 'Nein',
    'SAVE'                      => 'Speichern',
    'SAVE_SETTINGS'             => 'Einstellungen speichern',
    'SETTINGS'                  => 'Einstellungen',
    'BREADCRUMP'                => 'Breadcrump-Navigation',
    'BREADCRUMP_DESCRIPTION'    => 'Die Breadcrump-Navigation ist die Navigation ganz oben auf einer Seite, die die Seiten und ihre Unterseiten anzeigt.',
    'BREADCRUMP_TEXT'           => 'Breadcrump-Text: ',
    'BREADCRUMP_TEXT_DESCRIPTION' => 'Hier k&ouml;nne Sie einen Text eingeben, der vor der Breadcrump-Navigation erscheinen soll.'
));

?>