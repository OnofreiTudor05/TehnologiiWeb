<?php

class Admin extends Controller{
    public function render($name = ''){
        /*$user = $this->model('User');
        $user->name = $name;
        
        $this->view('home/index', ['name' => $user->name]);*/
        if(isset($_COOKIE['admin']) && $_COOKIE['admin']==='testcookie')
            $this->view('home/administration');
        else 
            $this->view('home/admin');
    }

}