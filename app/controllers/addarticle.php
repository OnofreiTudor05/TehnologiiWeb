<?php

class AddArticle extends Controller{
    public function render($name = ''){
        /*$user = $this->model('User');
        $user->name = $name;
        
        $this->view('home/map', ['name' => $user->name]);*/

        $this->view('home/addarticle');
    }

}