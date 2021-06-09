<?php

class Admin extends Controller{
    public function render(){
        if(isset($_COOKIE['adminAntiTero']) && $_COOKIE['adminAntiTero'] === "a504b29fa631ec2dcd149a617107850c96485c8f96741cabbd47c074f43a245b")
            $this->view('home/administration');
        else 
            $this->view('home/admin');
    }
}