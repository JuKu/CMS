<?php

class Dashboard {
    
    protected $cols = array();
    protected $dashboard_id = 1;
    protected $db = null;
    protected $lang = array();
    
    protected $log = null;
    protected $sys = null;
    
    public function Dashboard ($sys) {
        $this->sys = $sys;
        $this->db = $sys->getDB();
        $this->lang = $sys->getLang();
        $this->log = $sys->getLog();
    }
    
    public function load () {
        $this->cols[] = $this->loadWidgetsByColumn(1);
        $this->cols[] = $this->loadWidgetsByColumn(2);
        
        $this->cols[] = $this->loadWidgetsByColumn(3);
    }
    
    public function loadWidgetsByColumn($id) {
        
        $id = $this->db->escape($id);
        $res = array();
        
        $sql = "SELECT path FROM `" . TABLE_DASHBORAD_WIDGETS . "` WHERE `col` = '" . $id . "' AND `id` = '" . $this->dashboard_id . "' ORDER BY `row`; ";
        $db_erg = $this->db->query($sql) or die($this->lang['ERROR_DATABASE_QUERY'] . mysql_error());
        
        $widgetcontroller = new WidgetController($this->sys);
        
        while ($zeile = $this->db->fetch_array($db_erg)) {
            $widgetData = $widgetcontroller->getWidgetData($zeile['path']);
            $widget = $widgetcontroller->getWidget($widgetData);
            $widget->load();
            $res[] = $widget;
        }
        
        return $res;
        
    }
    
    public function show () {
    
        echo "<div id=\"columns\">";
        $this->showColumn(0);
        $this->showColumn(1);
        $this->showColumn(2);
        
        echo "</div>";
        
   ?>
   
        <script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.2.6.min.js"></script>
        <script type="text/javascript" src="jquery-ui-personalized-1.6rc2.min.js"></script>
        <script type="text/javascript" src="inettuts.js"></script>
        <style type="text/css">
        @import "inettuts.css";
        </style>
        <!-- <link href="inettuts.css" rel="stylesheet" type="text/css" /> -->
        
   <?php
   
    }
    
    public function showColumn($id){
  ?>
    <ul id="column<?PHP echo $id + 1; ?>" class="column">
      <?php
        if($this->cols[$id]){
        
          foreach($this->cols[$id] as $widget){
          
            if ($widget) {
                $widget->show();
            }
            
          }
          
        }
     ?>
    </ul>
  <?PHP
    }
    
}

?>