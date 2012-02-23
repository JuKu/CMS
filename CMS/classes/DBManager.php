<?php

class DBManager {

private $is_init = false;
private $db_;

    public function DBManager ($config) {

    if ($config != FALSE) {
        $this->is_init = true;
    } else {
        throw new Exception("parameter_has_no_config");
    }

    if ($this->isInit()) {

        if (file_exists("CMS/databases/" . $config['DBManager']['DatabaseDriver'] . ".php")) {
            require("CMS/databases/" . $config['DBManager']['DatabaseDriver'] . ".php");
        } else {
            require("../CMS/databases/" . $config['DBManager']['DatabaseDriver'] . ".php");
        }
        $klasse   = $config['DBManager']['DatabaseDriver'];
        $this->db_ = new $klasse('.'/*$config['DBManager']['DatabaseDriver']*/);
        return $this->db_;

    } else {
        $this->db_ = false;
    }

    }

    public function isInit () {
        return $this->is_init;
    }

    public function getDBDriver () {

    if (isset($this->db_) && !empty($this->db_)) {
        return $this->db_;
    } else {
        throw new Exception("db doesn't exists."); // dann Exception werfen
    }

    }

}

?>