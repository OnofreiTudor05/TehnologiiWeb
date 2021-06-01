<?php

    class Admin {
        public function login($data){
            $data = json_decode($data, TRUE);
            if($data["numeUtilizator"] === "admin" && hash('sha256', $data["password"]) === "a504b29fa631ec2dcd149a617107850c96485c8f96741cabbd47c074f43a245b"){
                setcookie ("adminAntiTero", "a504b29fa631ec2dcd149a617107850c96485c8f96741cabbd47c074f43a245b",  time() + (86400 * 2),  "/", "" , true , true );
            }

            if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
                $uri = 'https://';
            } else {
                $uri = 'http://';
            }
            $uri .= $_SERVER['HTTP_HOST'];
            header('Location: '.$uri.'/TehnologiiWeb/public/admin');
        }

    }

?>