let CLIENTE = 0;

function añadirPuntos(id_cliente, precio) {
    puntos = precio * 100;
    CLIENTE = id_cliente;
    console.log("ID_CLIENTE: " + CLIENTE);
    console.log("PUNTOS: " + puntos);

    let puntosCliente = {
        id_cliente: CLIENTE,
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
            
            restaPrecio();

        })
        .catch(error => {
            console.error(error);
        });
}

document.addEventListener('DOMContentLoaded', function () {
    let puntos = document.getElementById('puntos');
    let puntosActuales = document.getElementById('puntosAcutales').innerHTML;
    puntosActuales.textContent += ' Puntos';

    console.log("1 " + puntos);
    console.log("2 " + puntosActuales);

    if (puntosActuales.length == 0) {
        puntos.setAttribute("max", 0);
    }else{
        puntos.setAttribute("max", puntosActuales);
    }

    puntos.setAttribute("min", 0);
    puntos.setAttribute("placeholder", puntosActuales);


});


var inputPuntos = document.getElementById('puntos');
var puntosUtilizados = document.getElementById('puntosUtilizados');

// Agregar un listener para el evento 'input' del control deslizante
inputPuntos.addEventListener('input', function() {
    // Actualizar el contenido del párrafo con el valor del control deslizante
    puntosUtilizados.textContent = 'Puntos utilizados: ' + inputPuntos.value;
});


function restaPrecio() {
    let puntos = document.getElementById('puntos').value;

    if (puntos == '' || puntos == 0) {
        console.log("No ha usado puntos");
        return;
    } else {

        let puntosUsados = {
            id_cliente: CLIENTE,
            puntos: puntos,
        }

        let puntosUsadosJSON = JSON.stringify(puntosUsados);

        console.log(puntosUsadosJSON);

        fetch("http://proyectoperez.com/gato-preto/?controller=API&action=usePoints", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: puntosUsadosJSON
        })
        .then(response => response.text())
        .then(data => {

            console.log(data);

        })
        .catch(error => {
            console.error(error);
        });
    }
}