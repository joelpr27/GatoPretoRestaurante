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
    
            // Aquí puedes realizar las operaciones necesarias con los datos recibidos
            // Por ejemplo, puedes llamar a tu función para agregar reseñas
            ProductoDAO::addReseña($id_pedido, $valoracion, $reseña);
    
            // Puedes enviar una respuesta JSON si es necesario
            $response = array('success' => true, 'message' => 'Reseña agregada correctamente');
            echo json_encode($response);
        } else {
            // Manejo de error si no se proporcionan todos los campos necesarios
            $response = array('success' => false, 'message' => 'Campos incompletos');
            echo json_encode($response);
        }
    }
    
}
