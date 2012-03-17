<?php

class Language {
    
    public $lang = array();
    
    public function Language ($token) {
        
        $path = "lang/" . $token;
        $lang = null;
        
        if (!file_exists($path)) {
            $path = "../lang/" . $token;
        }
        
        if (!file_exists($path)) {
            echo "<b style=\"color:red; \">The directory \"" . $path . "\" doesn't exists.</b>";
            exit;
        }
        
        $this->includeFolders($path);
        
        if (file_exists($path . "/" . "mods")) {
            $this->includeFolders($path . "/mods");
        }
        
    }
    
    public function checkFileName ($filename) {
        
        if ($filename != "Lang.php") {
            return true;
        } else {
            return false;
        }
    }
    
    public function getLanguage () {
        return $this->lang;
    }
    
    public function includeFolders ($folder) {
        
        $lang = $this->lang;
        $path = $folder;
        
        if ( is_dir ($path))
        {
            //Öffnen des Verzeichnisses
            if ( $handle = opendir($path) )
            {
            // einlesen der Verzeichnisses
            while (($file = readdir($handle)) !== false)
            {

                if ($this->checkFileName($file) && !is_dir($path . "/" . $file)) {
                    require($path . "/" . $file);
                    //echo "require: " . $path . "/" . $file . "<br />";
                }

            }
            closedir($handle);
            }
        } else {
            echo "<b style=\"color:red; \">The path \"" . $path . "\" isn't a directory.'</b>";
        }
        
        $this->lang = $lang;
        
    }
    
    public static function loadLanguage () {
        
        $language_token = Settings::getSetting("language_token");
        return new Language($language_token);
        
    }

}



?>