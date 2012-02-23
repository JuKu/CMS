<?php

abstract class Database {

protected $host = "localhost";//Host
protected $user = "root";//Benutzername
protected $password = "Passwort";
protected $database = "CMS";
public $db_link;

    public abstract function connect($config);
    public abstract function query($sql);
    public abstract function escape($string);
    public abstract function fetch_array($db_erg);

}

?>