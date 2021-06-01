<?php
    class Response{
        static function responseCode($responseCode){
            http_response_code($responseCode);
        }

        static function content($data){
            header("Content-Type: application/json");
            echo json_encode($data);
        }
    }

?>