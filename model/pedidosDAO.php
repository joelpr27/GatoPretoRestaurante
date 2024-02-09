<?php
    include_once 'config/dataBase.php';
    include_once 'pedidoDB.php';


    class PedidosDAO{

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

        public static function getAllPedidos(){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM pedidos"); 

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            $res =[];

            while($pedido = $result->fetch_object('pedidoDB')){
                $res[] = $pedido;
            }

            return $res;
        }

        public static function getPedidtoById($id){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM pedidos WHERE id = ?"); 
            $stmt->bind_param("i",$id);


            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            $user = $result->fetch_object('pedidoDB');

            return $user;
        }

        public static function getPedidos($id){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM pedidos WHERE `id_cliente` = ?"); 
            $stmt->bind_param("i",$id);


            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            $res =[];

            while($pedido = $result->fetch_object('pedidoDB')){
                $res[] = $pedido;
            }

            return $res;
        }

        public static function getUltimoPedidoCookies($id){
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

        public static function getUltimoPedido($id){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM `pedidos` WHERE id_cliente = ? ORDER BY fecha DESC LIMIT 1");
            $stmt->bind_param("i",$id);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            $puntos = $result->fetch_object('pedidoDB');

            return $puntos;
        } 

        public static function modifyPointsPedido($puntos,$propina,$id){
            $con = DataBase::connect();

            $stmt = $con->prepare("UPDATE pedidos SET puntos = ? , propina = ? WHERE id = ?");
            $stmt->bind_param("idi",$puntos,$propina,$id);

            $stmt->execute();
            $result=$stmt->get_result();

            $con->close();

            return $result;

        }
    }

?>