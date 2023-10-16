<?php
    include_once 'controller/pedidoController.php';
    include_once 'config/parameters.php';

    if(!isset($_GET['controller'])){
        //Si no se pasa nada se pasara la pagina principal de pedidos
        header("Location:". URL ."?controller=pedido");
    }else{
        $nombre_controller = $_GET['controller'].'Controller';

        if(class_exists($nombre_controller)){
            //Miramos si nos pasa una accion, en caso contrario mostramos accion por defecto

            $controller = new $nombre_controller();

            if(isset($_GET['acction'])){
                $acction = $_GET['acction'];
            }else{
                $acction = action_default;
            }

            $controller->$acction();
        
        }else{
            header("Location:". URL ."?controller=pedido");
        }

    }



?>