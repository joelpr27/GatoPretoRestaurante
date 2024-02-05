<?php

include_once 'model/resenasDAO.php';
include_once 'model/resenas.php';

class APIController
{

    public function api(){
        if ($_POST['accion'] == 'consultaResenas') {

            $resenas = ResenasDAO::getAllReseñas();

            $arrayAsc = [];
            foreach ($resenas as $resena) {
                $arrayAsc[] = [
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

    public function addReseñas() {

        $inputJSON = file_get_contents('php://input');
        $data = json_decode($inputJSON, TRUE);
        
        if(isset($data['id_pedido']) && isset($data['valoracion']) && isset($data['reseña'])) {

            $id_pedido = $data['id_pedido'];
            $valoracion = $data['valoracion'];
            $reseña = $data['reseña'];
            

            $reseñaDB = ResenasDAO::addReseña($valoracion, $reseña, $id_pedido);
    
            $response = array('success' => true, 'message' => 'Resena agregada correctamente ', 'RespuestaDB' => $reseñaDB);
                        
            echo json_encode($response);

        } else {

            $response = array('success' => false, 'message' => 'Hay campos incompletos');
            echo json_encode($response);
        
        }
    }
    
}
