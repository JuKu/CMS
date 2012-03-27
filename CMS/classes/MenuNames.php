<?php

class MenuNames {
    
    public static function getName ($name) {
    
    global $lang;
        
        foreach ($lang as $index => $value){          
            $name = str_replace("{" . $index . "}", $value, $name);//Ersetzt den Namen, falls in der Sprach-Datei einer vorhanden ist.
        }
        
        return $name;
    }
    
}

?>