<?php

class Widget_Log extends Widget {

    public function Widget ($sys) {
        $this->sys = $sys;
        $this->lang = $this->sys->getLang();
        
        $this->log = $sys->getLog();
        $this->db = $sys->getDB();
    }

    public function load() {
      $this->headline = "Admin-Log";
      $this->content = "<br /><h2>Admin-Protokoll</h2><!-- <p> -->
                        <ul>";
                        
                        $log_array = $this->sys->getLog()->getLog();
                        
                        foreach ($log_array as $log_data) {
                            $this->content = $this->content . "<li>" . $log_data['user'] . ": " . $log_data['text'] . "</li>";
                        }
                        
                        $this->content = $this->content . "</ul>
                        <!-- </p> -->";

      $this->title = "Admin-Protokoll";
      $this->widgetcolor = "red";
    }

}

?>