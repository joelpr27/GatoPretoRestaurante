function añadirPuntos(id_cliente, precio){
    puntos = precio * 100;
    console.log("ID_CLIENTE: " + id_cliente);
    console.log("PUNTOS: " + puntos);

        let puntosCliente = {
            id_cliente: id_cliente,
            puntos: puntos,
        }
    
        let puntosJSON = JSON.stringify(puntosCliente);
    
        console.log(puntosJSON);
    
        fetch("http://proyectoperez.com/gato-preto/?controller=API&action=addPoints", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: puntosJSON
        })
        .then(response => response.text())
        .then(data => {
            
            console.log(data);
    
        })
        .catch(error => {
            console.error(error);
        });
}