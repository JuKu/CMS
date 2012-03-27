<?php

class WidgetUpdate extends Widget {

    protected $iconsets = null;

    public function Widget ($sys) {
        $this->sys = $sys;
        $this->lang = $this->sys->getLang();
        $this->log = $sys->getLog();
        $this->db = $sys->getDB();
        
        $this->iconsets = $sys->getIconSets();
    }
                                                                     
    public function load() {
      $this->headline = "Updates"; $iconsets = $this->iconsets;
      $this->content = "<br /><h2>Updates</h2>
      
                        <div style=\"margin:20px; \"><ul>
                        
                        <li style=\"list-style-image: url('../" . $this->sys->getIconSets()->getIconPath() . "/accept.png" . "'); \">Ihr CMS ist auf dem neuesten Stand.</li>
                        <li style=\"list-style-image: url('../" . $this->sys->getIconSets()->getIconPath() . "/accept.png" . "'); \">Ihre Plugins sind auf dem neuesten Stand.</li>
                        
                        </ul></div>
                        
                        <!-- </p> -->";
      $this->title = "Update";
      $this->widgetcolor = "orange";
    }

}

?>