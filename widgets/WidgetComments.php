<?php

class WidgetComments extends Widget {

    protected $iconsets = null;
    protected $max_comments = 5;

    public function Widget ($sys) {
        $this->sys = $sys;
        $this->lang = $this->sys->getLang();
        $this->log = $sys->getLog();
        $this->db = $sys->getDB();

        $this->iconsets = $sys->getIconSets();
        $this->db = $this->sys->getDB();
    }

    public function load() {
    
      $db = $this->sys->getDB();
    
      $this->headline = "Noch nicht freigegebene Kommentare"; $iconsets = $this->sys->getIconSets();
      $this->content = "<br /><h2><img src=\"../" . $iconsets->getIconPath() . "/comments.png" . "\" alt=\"Icon\" style=\"border:none; float:left; height:16px; margin:0px; \" />&nbsp;Noch nicht freigegebene Kommentare</h2>

                        <div style=\"margin:20px; \"><ul class=\"liste1\">
                        
                        ";
                        
                        $i = 0;
                        
                        $sql = "SELECT * FROM `" . TABLE_COMMENTS . "` WHERE `activated` = '2'; ";
                        $db_erg = $db->query($sql) or die($this->lang['ERROR_DATABASE_QUERY'] . mysql_error());
                        
                        while ($zeile = $db->fetch_array($db_erg)) {
                        
                            if ($i < 5) {
                                $this->content = $this->content . "<li style=\"list-style-image: url('../" . $this->sys->getIconSets()->getIconPath() . "/comment.png" . "'); \">" . $zeile['username'] . ": " . $zeile['text'] . "</li>";
                            }
                            
                            $i++;
                            
                        }
                        
                        if ($i == 0) {
                            $this->content .= "<b>Es sind keine Kommentare vorhanden, die auf Freigabe warten.</b>";
                        }

                        //<li style=\"list-style-image: url('../" . $this->sys->getIconSets()->getIconPath() . "/comment.png" . "'); \">Test-Kommentar 1</li>
                        //<li style=\"list-style-image: url('../" . $this->sys->getIconSets()->getIconPath() . "/comment.png" . "'); \">Test-Kommentar 2</li>

                        $this->content = $this->content . "</ul></div>
                        
                        <!-- <style type=\"text/css\">
                        .liste1 li {
                            margin:0px;
                        }
                        </style> -->

                        <!-- </p> -->";
                        
                        if (Settings::getSetting("comments") == "0") {
                            $this->content = "<p>Diese Funktion wurde in der Einstellungen ausgeschalten.</p>";
                        }
                        
      $this->title = "Kommentare";
      $this->widgetcolor = "yellow";
    }

}

?>