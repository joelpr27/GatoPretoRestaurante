<?php
    include_once 'config/dataBase.php';
    include_once 'productos.php';
    include_once 'bebidas.php';
    include_once 'categorias.php';
    include_once 'clientes.php';
    include_once 'pedidoDB.php';
    include_once 'detallePedidoDB.php';




    class ProductoDAO{

        public static function getAllProducts (){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT productos.id, productos.nombre AS nombre, productos.id_categoria, categorias.nombre AS nombre_categoria, tiempo_preparacion, precio, productos.img AS img, productos.descuento AS descuento FROM `productos`  INNER JOIN `categorias` ON productos.id_categoria = categorias.id");
       
            $stmt->execute();
            $result = $stmt->get_result();
            
            $res =[];

            while($producto = $result->fetch_object('productos')){
                $res[] = $producto;
            }

            return $res;
            
        }

        public static function getProductByCategory($id_categoria){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT productos.id, productos.nombre AS nombre, productos.id_categoria, categorias.nombre AS nombre_categoria, tiempo_preparacion, precio, productos.img AS img, productos.descuento AS descuento FROM `productos`  INNER JOIN `categorias` ON productos.id_categoria = categorias.id WHERE productos.id_categoria = ?"); 
            $stmt->bind_param("i",$id_categoria);


            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            
            while($producto = $result->fetch_object('productos')){
                $res[] = $producto;
            }

            return $res;
        }

        public static function getBebidaByCategory($id_categoria){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT productos.id, productos.nombre AS nombre, productos.id_categoria, categorias.nombre AS nombre_categoria, tiempo_preparacion, precio, productos.img AS img, productos.descuento AS descuento, productos.pajita AS pajita FROM `productos`  INNER JOIN `categorias` ON productos.id_categoria = categorias.id WHERE productos.id_categoria = ?"); 
            $stmt->bind_param("i",$id_categoria);


            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            
            while($producto = $result->fetch_object('bebidas')){
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

        public static function getBebidas(){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM productos WHERE `id_categoria` IN ('4','5','6')");

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            $res =[];

            while($bebidas = $result->fetch_object('bebidas')){
                $res[] = $bebidas;
            }

            return $res;

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

            $stmt = $con->prepare("SELECT productos.id, productos.nombre AS nombre, productos.id_categoria, categorias.nombre AS nombre_categoria, tiempo_preparacion, precio, productos.img AS img, productos.descuento AS descuento FROM `productos` INNER JOIN `categorias` ON productos.id_categoria = categorias.id"); 
            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();


            while($producto = $result->fetch_object('productos')){
                $res[] = $producto;
            }

            return $res;
        }

        public static function addProduct($nombre,$id_categoria,$tiempo_preparacion,$precio,$descuento,$img){
            $con = DataBase::connect();

            $stmt = $con->prepare("INSERT INTO `productos` (`id`, `nombre`, `id_categoria`, `tiempo_preparacion`, `precio`, descuento, img) VALUES (NULL, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("siidis", $nombre, $id_categoria, $tiempo_preparacion ,$precio,$descuento,$img);

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

        public static function updateProduct($id,$nombre,$id_categoria,$tiempo_preparacion,$precio,$img,$descuento){
            $con = DataBase::connect();

            $stmt = $con->prepare("UPDATE `productos` SET `nombre` = ?, `id_categoria` = ? , `tiempo_preparacion` = ?, `precio` = ?, `descuento` = ?, `img` = ? WHERE `id` = ?");
            $stmt->bind_param("siidisi",$nombre, $id_categoria ,$tiempo_preparacion ,$precio,$descuento,$img,$id);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            return $result;

        }

        public static function logIn($mail,$password){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM clientes WHERE correo = ? AND contraseña = ?");
            $stmt->bind_param("ss", $mail, $password);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            $cliente = $result->fetch_object('clientes');

            return $cliente;

        }

        public static function register($name,$surname,$mail,$password){
            $con = DataBase::connect();

            $stmt = $con->prepare("INSERT INTO clientes (nombre, apellido, correo, contraseña) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $surname, $mail, $password);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            return $result; 
        }

        public static function checkMail($mail){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM clientes WHERE correo = ?");
            $stmt->bind_param("s",$mail);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            return $result; 
        }

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

        public static function addPedido($id_cliente,$precioTotal){
            $con = DataBase::connect();

            $stmt = $con->prepare("INSERT INTO `pedidos` (`id_cliente`, `precio_total`) VALUES (?, ?)");
            $stmt->bind_param("id",$id_cliente, $precioTotal );

            $stmt->execute();
            $result=$stmt->get_result();

            $pedidoProd = $con->prepare("SELECT `id` FROM `pedidos` WHERE `id_cliente` = ? ORDER BY `fecha` DESC LIMIT 1");
            $pedidoProd->bind_param("i",$id_cliente);

            $pedidoProd->execute();
            $resultPP = $pedidoProd->get_result();
            
            $res = $resultPP->fetch_assoc();
            
            $id = intval($res['id']);

            return $id;   
        }

        public static function addPedidoProducto($pedidoID,$id_producto,$cantidad,$tiempo_P_Total,$precio){
            $con = DataBase::connect();

            $stmt = $con->prepare("INSERT INTO `pedido_producto` (`id_pedido`, `id_producto`, `cantidad_producto`,`precio_producto`,`tiempo_total`) VALUES (?, ? ,? ,? ,?)");
            $stmt->bind_param("iiidd",$pedidoID,$id_producto,$cantidad,$precio,$tiempo_P_Total);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();
            return $result; 
        }

        public static function getPedidos($id){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM pedidos WHERE `id_cliente` = ?"); 
            $stmt->bind_param("i",$id);


            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            $res =[];

            while($producto = $result->fetch_object('pedidoDB')){
                $res[] = $producto;
            }

            return $res;
        }

        public static function getUltimoPedido($id){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM pedidos WHERE `id` = ?"); 
            $stmt->bind_param("i",$id);


            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            $res = $result->fetch_object('pedidoDB');

            return $res;
        }

        public static function getDetallePedidos($id){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM pedido_producto WHERE `id_pedido` = ?"); 
            $stmt->bind_param("i",$id);


            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            $res =[];

            while($producto = $result->fetch_object('detallePedidoDB')){
                $res[] = $producto;
            }

            return $res;
        }

        
        
    }

?>