<?php

    class assn5 extends Appcontroller {

        public function __construct($parent) {

            // var_dump($parent);

            // $this->parent=$parent;
            //$this->parent->getView('test');

            $this->parent=$parent;

            

            //var_dump($this->parent); 

        }

        public function index() {

            $data = array();
            $data["pagename"] = "Assignment 5";
            $data["navigation"] = $this->parent->nav;
            $this->getView('header');
            $this->getView("navigation", $data);
            $random = substr( md5(rand()), 0, 7);
            $this->getView("assn5", array("cap"=>$random));
            // echo 'home';
            $this->getView("footer");

            // public function contact(){

            //     $this->getView("header", array("pagename"=>"contact"));
                
            //     $random = substr( md5(rand()), 0, 7);
                
            //     $this->getView("contact",array("cap"=>$random));
                
            //     }

        }

        public function contactRecv(){

            $data = array();
            $data["pagename"] = "Assignment 5";
            $data["navigation"] = $this->parent->nav;
            $this->getView('header');
            $this->getView("navigation", $data);
            
            if($_POST["captcha"]==$_SESSION['captchas']){
            
                if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
                // if($_POST['email'] != 'mike123@aol.com'){
                    
                    $_SESSION['loggedin'] = 0;
                    echo "<br>Email invalid";
                    
                    echo "<br><a href='/assn5'>Click here to go back</a>";
                
                }else{
                
                    // echo "<br><br>".$_POST['email'];
                    // echo "<br>Email valid";
                    $_SESSION['loggedin'] = 1;
                    header('Location:/carousels');
                    
                
                }
            
            }else{
            
                $_SESSION['loggedin'] = 0;
                echo "<br><br><br>Invalid captcha";
                
                echo "<br><a href='/assn5'>Click here to go back</a>";
            
            }
            
        }

    }

?>