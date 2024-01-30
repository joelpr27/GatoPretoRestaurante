<?php
    include_once 'config/dataBase.php';
    include_once 'resenas.php';


    class ResenasDAO{

        public static function getAllReseñas(){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT pedidos.id_cliente as id_cliente, clientes.nombre as nombre_cliente, pedidos.valoracion as valoracion, pedidos.reseña as resena FROM pedidos JOIN clientes ON pedidos.id_cliente = clientes.id"); 

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            $res =[];

            while($reseña = $result->fetch_object('resenas')){
                $res[] = $reseña;
            }

            return $res;
        }
        
    }

?>