<?php

abstract class Lang {

    public $connect_database_error = "";//Datenbank-verbindung ist fehlgeschlagen.
    public $database_selected_error = "";//Datenbank-Auswahl fehlgeschlagen.
    public $config_error = "";//Wenn Config.ini nicht gefunden werden konnte.
    public $settings_error = "";//Wennn eine Einstellung nicht gefunden werden konnte.
    public $table_doesnt_exists = "";//Wenn Tabelle nicht existiert.
    public $offline = "";//Wenn das CMS offline ist, also niemand darauf zugreifen darf.

}

?>