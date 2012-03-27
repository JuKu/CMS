<?php

class Welcome extends Widget {

    public function Widget ($sys) {
        $this->sys = $sys;
        $this->lang = $this->sys->getLang();
    }

    public function load() {
      $this->headline = "" . $this->lang['WIDGET_WELCOME_TITLE'];
      $this->content = "<br /><h2>" . $this->lang['WIDGET_WELCOME_TITLE'] . "</h2><p>" . $this->lang['WIDGET_WELCOME_TEXT'] . "</p>";

      $this->title = "Willkommen";
      $this->widgetcolor = "green";
    }

}

?>