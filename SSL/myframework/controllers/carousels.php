<?php

    class carousels extends Appcontroller {

        public function __construct($parent) {

            // var_dump($parent);

            // $this->parent=$parent;
            //$this->parent->getView('test');
            if($_SESSION['loggedin'] && $_SESSION['loggedin'] == 1) {
                $this->parent=$parent;
            } else {
                header('Location:/assn5');
            }

            

            //var_dump($this->parent); 

        }

        public function index() {

            $data = array();
            $data["pagename"] = "Carousel";
            // $data["url"] = $parent->urlPathParts[0];
            $data["navigation"] = array("Home" => "/", "Assignment 5" => "/assn5", "Carousel" => "/carousels", "Progress" => '/progess', "Contact" => "/contact", "Ajax" => "/Ajax");
            $this->parent->getView('header');
            $this->parent->getView("navigation", $data);

            $this->parent->getView("carousels");
            $this->parent->getView("footer");

        }
    }

?>