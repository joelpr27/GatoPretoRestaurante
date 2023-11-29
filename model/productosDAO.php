<?php
    include_once 'config/dataBase.php';
    include_once 'productos.php';
    include_once 'categorias.php';

    class ProductoDAO{

        public static function getAllProducts (){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM productos");
       
            $stmt->execute();
            $result = $stmt->get_result();
            
            $res =[];

            while($producto = $result->fetch_object('productos')){
                $res[] = $producto;
            }

            return $res;
            
        }

        public static function getProductById($id){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM productos WHERE `id` = ?"); 
            $stmt->bind_param("i",$id);


            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            $producto = $result->fetch_object('productos');

            return $producto;
        }


        public static function getAllCategory(){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM categorias"); 

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            while($categorias = $result->fetch_object('categorias')){
                $res[] = $categorias;
            }

            return $res;
        }

        public static function getCategoryById($id){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM categorias WHERE `id` = ?"); 
            $stmt->bind_param("i",$id);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            $result = $result->fetch_object('categorias');

            return $result;
        }

        public static function getProductWhitCategory(){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT productos.id, productos.nombre AS nombre, productos.id_categoria, categorias.nombre AS nombre_categoria, tiempo_preparacion, precio, productos.img AS img FROM `productos` INNER JOIN `categorias` ON productos.id_categoria = categorias.id"); 
            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();


            while($producto = $result->fetch_object('productos')){
                $res[] = $producto;
            }

            return $res;
        }

        public static function addProduct($nombre,$id_categoria,$tiempo_preparacion,$precio,$img){
            $con = DataBase::connect();

            $stmt = $con->prepare("INSERT INTO `productos` (`id`, `nombre`, `id_categoria`, `tiempo_preparacion`, `precio`, img) VALUES (NULL, ?, ?, ?, ?, ?)");
            $stmt->bind_param("siids", $nombre, $id_categoria, $tiempo_preparacion ,$precio,$img);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();
            return $result; 
        }


        public static function deleteProduct($id){
            $con = DataBase::connect();

            $stmt = $con->prepare("DELETE FROM productos WHERE `id`= ?");
            $stmt->bind_param("i",$id);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();
            return $result;
        }

        public static function updateProduct($id,$nombre,$id_categoria,$tiempo_preparacion,$precio,$img){
            $con = DataBase::connect();

            $stmt = $con->prepare("UPDATE `productos` SET `nombre` = ?, `id_categoria` = ? , `tiempo_preparacion` = ?, `precio` = ?, `img` = ? WHERE `id` = ?");
            $stmt->bind_param("siidsi",$nombre, $id_categoria ,$tiempo_preparacion ,$precio,$img, $id);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            return $result;

        }
        
    }

?>