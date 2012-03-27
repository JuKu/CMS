<?php

class TemplateEngine {

private $lang = array();

    public function TemplateEngine ($lang) {
        $this->lang = $lang;
    }
    
    public function getFile ($base, $folder, $file) {
    
    $lang = $this->lang;
        
        $handle = fopen ($folder . "/" . $file, "r");

        $text = "";

        while (!feof($handle)) {
        $buffer = fgets($handle);
        $text .= $buffer;
        }

        fclose ($handle);

        foreach ($lang as $index => $value){
            $text = str_replace("{" . $index . "}", $value, $text);//Ersetzt den Namen, falls in der Sprach-Datei einer vorhanden ist.
        }
        
        if (!file_exists($base . "Cache")) {
            mkdir($base . "Cache");
        }
        
        if (!file_exists($base . "Cache/template")) {
            mkdir($base . "Cache/template");
        }

        $handle = fopen ($base . "Cache/template/" . $file, "w");
        fwrite($handle, $text);
        
        fclose($handle);
        
        return $base . "Cache/template/" . $file;
        
    }
    
}

?>