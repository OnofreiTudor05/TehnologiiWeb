<?php

class Home extends Controller{
    public function render($name = ''){
        //$user = $this->model('User');
       // $user->name = $name;
        
        //$this->view('home/index', ['name' => $user->name]);
        $this->view('home/home');
    }

}