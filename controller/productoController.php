<?php
//Creamos el controlador de pedidos
include_once 'model/productosDAO.php';
include_once 'model/pedido.php';
include_once 'model/favorito.php';
include_once 'model/clientes.php';





class productoController{

    public function index(){
         
        
        session_start();

        if(!isset($_SESSION['carrito'])){
            $_SESSION['carrito'] = array();

        }else{
            if(isset($_POST['id'])){

                $pedido = new Pedido(ProductoDAO::getProductById($_POST['id']));

                
                array_push($_SESSION['carrito'], $pedido);
            }
        }

        
        if(!isset($_SESSION['favorito'])){
            $_SESSION['favorito'] = array();

        }else{
            if(isset($_POST['id'])){

                $favorito = new Pedido(ProductoDAO::getProductById($_POST['id']));

                array_push($_SESSION['favorito'], $favorito);
            }
        }
                    

        $productos = ProductoDAO::getProductWhitCategory();

        $categorias = ProductoDAO::getAllCategory();

        include_once 'views/home.php';

    }   

    public function compra(){
        session_start();
        if(isset($_POST['Add'])){
            $pedido = $_SESSION['carrito'][$_POST['Add']];
            $pedido->setCantidad($pedido->getCantidad()+1);
        }else if(isset($_POST['Del'])){
            $pedido = $_SESSION['carrito'][$_POST['Del']];
            if($pedido->getCantidad()==1){
                unset($_SESSION['carrito'][$_POST['Del']]);
                $_SESSION['carrito'] = array_values(($_SESSION['carrito']));
            }else{
                $pedido->setCantidad($pedido->getCantidad()-1);
            }
        }        
        include_once 'views/header.php';
        include_once 'views/panelCompra.php';
        include_once 'views/footer.php';

   
    }

    public function favorito(){
        session_start();
        
        include_once 'views/header.php';
        include_once 'views/panelFavorito.php';
        include_once 'views/footer.php';

   
    }

    public function addTable(){

        include_once "views/addProduct.php";

    }

    public function add(){

        $nombre = $_POST['nombre'];
        $id_categoria = $_POST['id_categoria'];
        $tiempo_preparacion = $_POST['tiempo_preparacion'];
        $precio = $_POST['precio'];
        $img = $_POST['img'];

        
        
        $producto = ProductoDAO::addProduct($nombre,$id_categoria,$tiempo_preparacion,$precio,$img);

        header("Location:".URL."?controller=producto");
    }

    public function delete(){
        $id = $_POST['id'];

        ProductoDAO::deleteProduct($id);

        header("Location:".URL."?controller=producto");
    }

    public function updateTable(){

        $id = $_POST['id'];
     
        $producto = ProductoDAO::getProductById($id);

        include_once "views/editProduct.php";
    }

    public function update(){

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $id_categoria = $_POST['id_categoria'];
        $tiempo_preparacion = $_POST['tiempo_preparacion'];
        $precio = $_POST['precio'];
        $img = $_POST['img'];

    
        $producto = ProductoDAO::updateProduct($id,$nombre,$id_categoria,$tiempo_preparacion,$precio,$img);

        header("Location:".URL."?controller=producto");
    }

    public function select(){

        $id = $_POST['id'];

        $pedido = new Pedido( ProductoDAO::getProductById($id));

        header("Location:".URL."?controller=producto");
    }

    public function addCart(){

        session_start();

        if(!isset($_SESSION['carrito'])){
            $_SESSION['carrito'] = array();

        }else{
            if (isset($_POST['id'])) {              
                $producto_id = $_POST['id'];
                $pedidoExistente = false;

                foreach ($_SESSION['carrito'] as $pedido) {
                    if ($pedido->getProducto()->getId() == $producto_id) {
                        $pedido->setCantidad($pedido->getCantidad() + 1);
                        $pedidoExistente = true;
                        break;
                    }
                }

                if ($pedidoExistente == false) {
                    $pedido = new Pedido(ProductoDAO::getProductById($_POST['id']));
                    array_push($_SESSION['carrito'], $pedido);
                }
            }
        }

        header("Location:".URL."?controller=producto");

    }

    public function deleteCart(){
        session_start();

        if(isset($_POST['id'])) {              
            $producto_id = $_POST['id'];
            $i = 0;

            foreach ($_SESSION['carrito'] as $pedido) {
                if ($pedido->getProducto()->getId() == $producto_id) {
                    if($i == 0){
                        $_SESSION['carrito'] = array();
                    }
                }

                $i++;

            }
        }
 
        header("Location:".URL . '?controller=producto&action=compra');

    }

    public function addFavorite(){

        session_start();

        if(!isset($_SESSION['favorito'])){
            $_SESSION['favorito'] = array();

        }else{
            if(isset($_POST['id'])){
                $pedido = new Favorito(ProductoDAO::getProductById($_POST['id']));

                array_push($_SESSION['favorito'], $pedido);
            }
        }

        header("Location:".URL."?controller=producto");

    }

    public function deleteFavorite(){
        session_start();

        if(isset($_POST['id'])) {              
            $producto_id = $_POST['id'];
            $i = 0;

            foreach ($_SESSION['favorito'] as $pedido) {
                if ($pedido->getProducto()->getId() == $producto_id) {
                    if($i == 0){
                        $_SESSION['favorito'] = array();
                    }
                }

                $i++;

            }
        }
 
        header("Location:".URL . '?controller=producto&action=favorito');

    }

    public function carta(){
        session_start();
        
        $productos = ProductoDAO::getProductWhitCategory();
        $categorias = ProductoDAO::getAllCategory();

        include_once 'views/header.php';
        include_once 'views/carta.php';
        include_once 'views/footer.php';

   
    }

    public function confirmar(){
        //Almacena el pedido en la base de datos

        //Guardo la cookie
            
        setcookie('ultimoPedido', $_POST['cantidadFinal'] , 3600);

    }

    public function sessionStart(){
        session_start();
        
        include_once 'views/header.php';
        include_once 'views/logIn.php';
        include_once 'views/footer.php';

    }

    public function logIn(){

        $mail = $_POST['mail'];
        $password = $_POST['password'];

    
        $users = ProductoDAO::logIn($mail,$password);

        var_dump($users->getCorreo());

        // header("Location:".URL."?controller=producto");
   
    }

    public function register(){

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];


        $users = ProductoDAO::checkMail($mail);

        if ($users->num_rows == 0) {

            $user = ProductoDAO::register($name,$surname,$mail,$password);
            
            header("Location:".URL."?controller=producto");

        }else{

            header("Location:".URL . "?controller=producto&action=sessionStart");
 
        }

    }

    
}


?>