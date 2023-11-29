<?php 
    class DataBase{
        
        public static function connect($host ='localhost', $user='root', $password='', $db_name='gatopreto_db'){

            $conexion = new mysqli($host,$user,$password,$db_name);
            if($conexion == false){
                die('DATABASE ERROR');
            }else{
                return $conexion;
            }

        }
        
    }
?>