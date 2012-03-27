<?php

class Einfuehrung extends Widget {

    public function Widget ($sys) {
        $this->sys = $sys;
        $this->lang = $this->sys->getLang();
    }

    public function load() {
      $this->headline = "Einf&uuml;hrung";
      $this->content = "<br /><h2>Einf&uuml;hrung</h2><p>Herzlich Willkommen im Dashboard!<br /><br />
                        Das Dashboard soll die Konfiguration des CMS erheblich erleichtern.<br />
                        Hier siehst du die neuesten Kommentare, Plugins, ... auf einen Blick und du kannst das Dashboard sogar auf deine W&uuml;nsche anpassen:<br /><br />
                        Aber Achtung!: Wenn du das Dashboard umordnest, ... werden dieser &Auml;nderungen nicht gespeichert, damit das Dashboard immer so aussieht,<br />
                        wie du es vorgefunden hast. <br /><br />
                        
                        Probier es mal!<br />
                        Versuche einen Block zu verschieben oder zu editieren (nur den Titel) oder vllt. sogar die Farbe zu wechseln! ;-)
                        </p>";

      $this->title = "Einf&uuml;hrung";
      $this->widgetcolor = "blue";
    }

}

?>