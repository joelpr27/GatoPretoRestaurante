<?php
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

    public function addProduct(){
        session_start();

        include_once 'views/header.php';
        include_once "views/addProduct.php";
        include_once 'views/footer.php';

    }

    public function seeProducts(){
        session_start();
     
        $productos = ProductoDAO::getAllProducts();

        include_once 'views/header.php';
        include_once "views/allProducts.php";
        include_once 'views/footer.php';

    }

    
    public function add(){

        $nombre = $_POST['nombre'];
        $id_categoria = $_POST['id_categoria'];
        $tiempo_preparacion = $_POST['tiempo_preparacion'];
        $precio = $_POST['precio'];
        $descuento = $_POST['descuento'];
        $img = $_POST['img'];


        $producto = ProductoDAO::addProduct($nombre,$id_categoria,$tiempo_preparacion,$precio,$descuento,$img);

        header("Location:".URL."?controller=producto&action=seeProducts");
    }

    public function delete(){
        $id = $_POST['id'];

        ProductoDAO::deleteProduct($id);

        header("Location:".URL."?controller=producto&action=seeProducts");
    }

    public function updateProduct(){

        session_start();

        $id = $_POST['id'];
     
        $producto = ProductoDAO::getProductById($id);

        include_once 'views/header.php';
        include_once "views/editProduct.php";
        include_once 'views/footer.php';
    }

    public function update(){

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $id_categoria = $_POST['id_categoria'];
        $tiempo_preparacion = $_POST['tiempo_preparacion'];
        $precio = $_POST['precio'];
        $img = $_POST['img'];
        $descuento = $_POST['descuento'];

        

    
        $producto = ProductoDAO::updateProduct($id,$nombre,$id_categoria,$tiempo_preparacion,$precio,$img,$descuento);

        header("Location:".URL . "?controller=producto&action=seeProducts");
    }
    

    public function select(){

        $id = $_POST['id'];

        $pedido = new Pedido( ProductoDAO::getProductById($id));

        header("Location:".URL."?controller=producto");
    }

    public function addCart(){

        session_start();

        if(isset($_SESSION['usuario'])){

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

            header("Location:".URL."?controller=producto&action=carta");

            
        }else{
            
            header("Location:".URL . "?controller=producto&action=sessionStart");

        }

    }

    public function deleteCart(){
        session_start();

        if(isset($_POST['id'])) {              
            
            $pos = $_POST['pos'];
 
            unset($_SESSION['carrito'][$pos]);

            $_SESSION['carrito'] = array_values($_SESSION['carrito']);
        }
 
        header("Location:".URL . '?controller=producto&action=compra');

    }

    public function addFavorite(){

        session_start();

        if(isset($_SESSION['usuario'])){

            if(!isset($_SESSION['favorito'])){
                $_SESSION['favorito'] = array();

            }else{
                if(isset($_POST['id'])){
                    $pedido = new Favorito(ProductoDAO::getProductById($_POST['id']));

                    array_push($_SESSION['favorito'], $pedido);
                }
            }

            header("Location:".URL."?controller=producto");

        }else{

            header("Location:".URL . "?controller=producto&action=sessionStart");

        }

    }

    public function deleteFavorite(){
        session_start();

        if(isset($_POST['id'])) {              
                
            $pos = $_POST['pos'];
            
            unset($_SESSION['favorito'][$pos]);

            $_SESSION['favorito'] = array_values($_SESSION['favorito']);
        
        }

        header("Location:".URL . '?controller=producto&action=favorito');
    }

    public function carta(){
        session_start();
        
        $productos = ProductoDAO::getProductWhitCategory();
        $categorias = ProductoDAO::getAllCategory();
        $bebidas = ProductoDAO::getBebidas();

        include_once 'views/header.php';
        include_once 'views/carta.php';
        include_once 'views/footer.php';

   
    }

    public function goCategory(){
        session_start();
        
        $categoria_id = $_POST['categoria'];

        $productos = ProductoDAO::getProductByCategory($categoria_id);

        include_once 'views/header.php';
        include_once 'views/productByCategory.php';
        include_once 'views/footer.php';

   
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

        if($users != null){
            
            session_start();

            $_SESSION['usuario'] = array();
            
            array_push($_SESSION['usuario'], $users);

            header("Location:".URL."?controller=producto");

        }else{

            header("Location:".URL . "?controller=producto&action=sessionStart");
 
        }
   
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

    public function userPage(){
        session_start();

        $id = $_SESSION['usuario'][0]->getId();
     
        $user = ProductoDAO::getUserById($id);

        $pedidos = ProductoDAO::getPedidos($id);

        if(isset($_COOKIE['ultimoPedido'])){
            $ultimoPedido = ProductoDAO::getUltimoPedido($_COOKIE['ultimoPedido']);
        }
        
        include_once 'views/header.php';
        include_once "views/userPage.php";
        include_once 'views/footer.php';

    }

    public function cerrarSession(){
        session_start();

        unset($_SESSION['usuario']);

        session_destroy();

        header("Location:".URL."?controller=producto");

    }

    public function goUpdateUser(){

        session_start();

        $id = $_POST['id'];

        $user = ProductoDAO::getUserById($id);

        include_once 'views/header.php';
        include_once "views/editUser.php";
        include_once 'views/footer.php';
    }


    public function updateUser(){

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $contraseña = $_POST['contraseña'];

    
        $cliente = ProductoDAO::updateUser($id,$nombre,$apellido,$contraseña);


        // header("Location:".URL . "?controller=producto&action=userPage");
    }

    public function createPedido(){

        session_start();
        
        include_once "utils/calculadoraPrecios.php";

        $id_cliente = $_SESSION['usuario'][0]->getId();
        $precioTotal = CalculadoraPrecios::calculadoraPrecioFinal($_SESSION['carrito']);


        $pedidoID = ProductoDAO::addPedido($id_cliente, $precioTotal);
        

        foreach ($_SESSION['carrito'] as $producto) {
            
            $id_producto = $producto->getProducto()->getId();
            $cantidad = $producto->getCantidad();
            $tiempo_P = $producto->getProducto()->getTiempo_preparacion();
            $tiempo_P_Total = $tiempo_P * $cantidad;

            if($producto->getProducto()->getDescuento() != null){
                $precio = $producto->getProducto()->getPrecioDescuento();
            }else{
                $precio = $producto->getProducto()->getPrecio();
            }

            $pedidoProductos = ProductoDAO::addPedidoProducto($pedidoID,$id_producto,$cantidad,$tiempo_P_Total,$precio);
            
        }

        unset($_SESSION['carrito']);

        setcookie('ultimoPedido', $pedidoID , time()+3600);


        header("Location:".URL . "?controller=producto");
    }
    
    public function detallePedido(){
        session_start();

        $id = $_POST['id'];

        $pedidos = ProductoDAO::getDetallePedidos($id);

        $productos = [];

        foreach($pedidos as $pedido){
            $producto = ProductoDAO::getProductById($pedido->getId_producto());
            $productos[] = $producto;
        }

        include_once 'views/header.php';
        include_once "views/detallePedido.php";
        include_once 'views/footer.php';
    }

    public function reseñas(){
        session_start();
        
        $reseñas = ProductoDAO::getAllPedidos();

        include_once 'views/header.php';
        include_once 'views/reseñas.php';
        include_once 'views/footer.php';
    
    }
}



?>