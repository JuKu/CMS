<?php

class Config {

    private $config;
    private $configdatei;//Erst einmal unnötig, wird später noch gebraucht.

    public function Config ($configdatei) {//Pfad zur Ini-datei (wegen Wiederverwertbarkeit)

        if (file_exists($configdatei)) {
            $this->config = parse_ini_file($configdatei, TRUE);
            $this->configdatei = $configdatei;
        } else {
        $config = "";
        throw new Exception("Es konnte keine Verbindung zur MYSQL-datenbank hergestellt werden."); // dann Exception werfen

        $this->configdatei = "";
        }

    }

    public function getConfig () {

        if (!empty($this->config)) {
            return $this->config;
        } else {
            return false;
        }

    }

}

?>