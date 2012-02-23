<?php

class MySqlDatabase extends Database {

public function connect ($config) {

    $this->host = $config['Database']['host'];
    $this->user = $config['Database']['user'];
    $this->password = $config['Database']['password'];
    $this->database = $config['Database']['database'];

    $this->db_link = mysql_connect($this->host, $this->user, $this->password) or die("Anfrage fehlgeschlagen.");

    mysql_select_db($this->database) or die("Die datenbank konnte nicht ausgew&auml;hlt werden.");

}

public function escape ($string) {
    return mysql_real_escape_string(trim($string));
}

public function query ($sql) {

    $db_erg = mysql_query($sql);

    if($db_erg) {
        return $db_erg;
    } else {
        return false;
    }

}

public function fetch_array($db_erg_) {
    if (!isset($db_erg_) or empty($db_erg_)) {
        return false;
    } else {
        return mysql_fetch_array($db_erg_, MYSQL_ASSOC);
    }
}

}

?>