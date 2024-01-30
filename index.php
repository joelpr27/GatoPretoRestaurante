<?php
    include_once 'controller/productoController.php';
    include_once 'controller/APIController.php';
    include_once 'config/parameters.php';

    if(!isset($_GET['controller'])){
        //Si no se pasa nada se pasara la pagina principal de producto
        header("Location:". URL ."?controller=producto");
    }else{
        $nombre_controller = $_GET['controller'].'Controller';

        if(class_exists($nombre_controller)){
            //Miramos si nos pasa una accion, en caso contrario mostramos accion por defecto

            $controller = new $nombre_controller();

            if(isset($_GET['action']) && method_exists($controller,$_GET['action'])){
                $action = $_GET['action'];
            }else{
                $action = action_default;
            }

            $controller->$action();
        
        }else{
            header("Location:". URL ."?controller=producto");
        }

    }
?>