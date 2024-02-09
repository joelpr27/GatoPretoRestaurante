<?php
    include_once 'config/dataBase.php';


    class UsuariosDAO{

        public static function getUserById($id){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM clientes WHERE `id` = ?"); 
            $stmt->bind_param("i",$id);


            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            $user = $result->fetch_object('clientes');

            return $user;
        }

        public static function updateUser($id,$nombre,$apellido,$contraseña){
            $con = DataBase::connect();

            $stmt = $con->prepare("UPDATE `clientes` SET `nombre` = ?, `apellido` = ? , `contraseña` = ? WHERE `id` = ?");
            $stmt->bind_param("sssi",$nombre,$apellido,$contraseña,$id);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            return $result;

        }

        public static function getPoints($id){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT puntos FROM clientes WHERE id = ?");
            $stmt->bind_param("i",$id);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            $puntos = $result->fetch_object('clientes');

            return $puntos;
        } 

        public static function addPoints($puntos,$id){
            $con = DataBase::connect();

            $stmt = $con->prepare("UPDATE clientes SET puntos = ? WHERE id = ?");
            $stmt->bind_param("ii",$puntos,$id);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            return $result;

        }
        
    }

?>