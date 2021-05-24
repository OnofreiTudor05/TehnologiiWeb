<?php

class Contact extends Controller{
    public function render($name = ''){
       // $user = $this->model('User');
       // $user->name = $name;
        
        $this->view('home/contact');
    }
}