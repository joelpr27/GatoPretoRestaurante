<?php
//Creamos el controlador de pedidos
include_once 'model/productosDAO.php';
include_once 'model/pedido.php';
include_once 'model/favorito.php';




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

        include_once 'views/panelPedido.php';

        //include footer   

    }   

    public function compra(){
        session_start();
        
        include_once 'views/header.php';

        include_once 'views/panelCompra.php';
   
    }

    public function favorito(){
        session_start();
        
        include_once 'views/header.php';

        include_once 'views/panelFavorito.php';
   
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
            if(isset($_POST['id'])){
                $pedido = new Pedido(ProductoDAO::getProductById($_POST['id']));

                array_push($_SESSION['carrito'], $pedido);
            }
        }

        header("Location:".URL."?controller=producto");

    }

    public function deleteCart(){
        session_start();

        $_SESSION['carrito'] = array();
 
        header("Location:".URL."?controller=producto");

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

        $_SESSION['favorito'] = array();
 
        header("Location:".URL."?controller=producto");

    }
}


?>