<?php

class testwidget extends Widget {

    public function Widget ($lang) {
        $this->lang = $lang;
    }
    
    public function load() {
      $this->headline = "Test-Widget";
      $this->content = "<!-- <p style=\"text-align:center; \"> -->
                        <!-- <h2>Dies ist ein Test-Widget</h2><br />
                        <b>Test-Widget</b> -->
                        <br /><h2>test</h2><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam magna sem, fringilla in, commodo a, rutrum ut, massa. Donec id nibh eu dui auctor tempor. Morbi laoreet eleifend dolor. Suspendisse pede odio, accumsan vitae, auctor non, suscipit at, ipsum. Cras varius sapien vel lectus.</p>
                        <!-- </p> -->";
                        
      $this->title = "Test-Widget";
      $this->widgetcolor = "green";
    }
    
}

?>