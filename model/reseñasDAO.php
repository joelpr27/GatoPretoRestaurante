<?php
    include_once 'config/dataBase.php';

    class ProductoDAO{
        
        public static function addReseña($valoracion,$reseña,$id){
            $con = DataBase::connect();

            $stmt = $con->prepare("UPDATE pedidos SET valoracion = ?, reseña = ? WHERE id = ?");
            $stmt->bind_param("isi",$valoracion,$reseña,$id);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            return $result;

        }
        
    }

?>