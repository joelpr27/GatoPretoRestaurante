<?php

    include_once 'model/resenasDAO.php';    
    include_once 'model/resenas.php';

    class APIController{

        public function api(){
            if ($_POST['accion'] == 'consultaResenas') {
             
                $resenas = ResenasDAO::getAllReseñas();
                
                $arrayAsc = [];
                foreach ($resenas as $resena) {
                    $arrayAsc [] = [
                        'id_cliente' => $resena->getId_cliente(),
                        'nombre_cliente' => $resena->getNombre_cliente(),
                        'valoracion' => $resena->getValoracion(),
                        'resena' => $resena->getResena(),
                    ];
                }

                echo json_encode($arrayAsc, JSON_UNESCAPED_UNICODE);

                return;
            }
        }
    }
?>