<?php

class WidgetIconSets extends Widget {

    protected $iconsets = null;

    public function Widget ($sys) {
        $this->sys = $sys;
        $this->lang = $this->sys->getLang();
        $this->log = $sys->getLog();
        $this->db = $sys->getDB();

        $this->iconsets = $sys->getIconSets();
    }

    public function load() {
    
    $iconsets = $this->sys->getIconSets();
    $icon_set = $iconsets->getIconSet();
    
      $this->headline = "Icon-Sets"; 
      $this->content = "<br /><h2><img src=\"../" . $iconsets->getIconPath() . "/images.png" . "\" alt=\"Icon\" style=\"border:none; float:left; height:16px; \" /><div style=\"margin-top:5px; \">Icon-Sets</div></h2>
                        <div style=\"margin:20px; \">
                        <b>Ihr ausgew&auml;hltes Icon-Set: " . $icon_set['name'] . "</b><br />
                        Pfad: " . $icon_set['path'] . "<br />
                        <br />
                        <img src=\"../" . $iconsets->getIconPath() . "/information.png" . "\" alt=\"Icon\" style=\"border:none; float:left; margin:0px; \" />&nbsp; &copy; " . $icon_set['copyright'] . "
                        </div>
                        <!-- </p> -->";
      $this->title = "Icon-Sets";
      $this->widgetcolor = "white";
    }

}

?>