<?php

include_once 'model/resenasDAO.php';
include_once 'model/usuariosDAO.php';
include_once 'model/pedidosDAO.php';
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

    public function addPoints(){
        
        $inputJSON = file_get_contents('php://input');
        $data = json_decode($inputJSON, TRUE);
        
        if(isset($data['id_cliente']) && isset($data['puntos'])) {

            $id_cliente = $data['id_cliente'];
            $puntos = $data['puntos'];
            
            $puntosCliente = UsuariosDAO::getPoints($id_cliente);

            $puntosAcuales = $puntosCliente->getPuntos();
            $puntosNuevos = $puntosAcuales += $puntos;

            $addPuntosCliente = UsuariosDAO::addPoints($puntosNuevos, $id_cliente);
    
            $response = array('success' => true, 'message' => $puntos.' puntos agregados correctamente al usuario', 'PuntosTotales' => $puntosNuevos);
            
            echo json_encode($response);

            $ultimoPedido = PedidosDAO::getUltimoPedido($id_cliente);
            $id_ultimoPedido = $ultimoPedido->getId();

            $addPuntosPedido = UsuariosDAO::modifyPointsPedido($puntos, $id_ultimoPedido);

            $response2 = array('success' => true, 'message' => $puntos.' puntos agregados correctamente al pedido');

            echo json_encode($response2);

        } else {

            $response = array('success' => false, 'message' => 'Error al añadir los puntos');
            echo json_encode($response);
        
        }
    }

    public function usePoints(){
        
        $inputJSON = file_get_contents('php://input');
        $data = json_decode($inputJSON, TRUE);
        
        if(isset($data['id_cliente']) && isset($data['puntos'])) {

            $id_cliente = $data['id_cliente'];
            $puntos = $data['puntos'];
            
            $puntosCliente = UsuariosDAO::getPoints($id_cliente);

            $puntosAcuales = $puntosCliente->getPuntos();
            $puntosNuevos = $puntosAcuales -= $puntos;

            $deletePuntosCliente = UsuariosDAO::addPoints($puntosNuevos, $id_cliente);
    
            $response = array('success' => true, 'message' => $puntos.' puntos borrados correctamente al usuario', 'PuntosTotales' => $puntosNuevos);
            
            echo json_encode($response);


        } else {

            $response = array('success' => false, 'message' => 'Error al borrar los puntos');
            echo json_encode($response);
        
        }
    }
    
}
