<?php

class Statistics extends Controller{
    public function render($name = ''){
       // $user = $this->model('User');
        //$user->name = $name;
        
        $this->view('home/statistics');
    }

}