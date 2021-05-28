<?php
    class ManagerConexiune{
        private static $conexiuneLaBD = NULL;

        public static function getConexiuneLaBD(){
            if(is_null(self::$conexiuneLaBD)){
                self::$conexiuneLaBD = mysqli_connect("localhost","root","","globalterrorism");
            }

            return self::$conexiuneLaBD;
        }
   }
    
?>