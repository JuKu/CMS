<?php

class Plugin_DBManager {
    
    public function getTables () {
    
    global $db;
    global $lang;
    
        $tables = array();
    
        $res = $db->query("SHOW TABLES") or die("Plugin DBManager: " . $lang['ERROR_DATABASE_QUERY']);
      while($row = mysql_fetch_row($res)){
        $tables[] = $row[0];
      }
      sort($tables);
      return $tables;
    }
    
}

?>