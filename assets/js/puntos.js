let CLIENTE = 0;
let PRECIO = 0;
let PROPINA = 0;

let inputPuntos = document.getElementById('puntos');
let puntosUtilizados = document.getElementById('puntosUtilizados');
let divPU = document.getElementById('descuentoPuntos');

let textoPuntosUtilizados = document.createElement('p');
let descuento = document.createElement('p');


function añadirPuntos(id_cliente, precio) {

    puntos = precio * 100;
    CLIENTE = id_cliente;
    console.log("ID_CLIENTE: " + CLIENTE);
    console.log("PUNTOS: " + puntos);

    let puntosCliente = {
        id_cliente: CLIENTE,
        puntos: puntos,
        propina: PROPINA
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
    
    togglePropinaSeccion()

    //Actualiza variables globales de este JS
    PRECIO = document.getElementById('precioTotal').value

    propinaFinal = PRECIO * (3 / 100);

    propinaFinal = propinaFinal.toFixed(2);
    document.getElementById('propinaActual').textContent = propinaFinal;
    
    PROPINA = parseFloat(propinaFinal);
    console.log(PROPINA);
    
    let puntos = document.getElementById('puntos');
    let puntosActuales = document.getElementById('puntosAcutales').innerHTML;
    let puntosGanadosValor = document.getElementById('precioFinal').innerHTML;

    let soloNumeroPuntos = puntosGanadosValor.match(/[\d.]+/);
    let puntosGanados = document.getElementById('puntosGanados');

    let maxInput = (parseFloat(soloNumeroPuntos) * 1000);
    let puntosActualesNumber = parseInt(puntosActuales, 10)

    // console.log(puntosActualesNumber);

    puntosGanados.textContent = soloNumeroPuntos * 100 + " Puntos";
    puntosActuales.textContent += ' Puntos';

    if (puntosActuales.length == 0) {
        puntos.setAttribute("max", 0);
    } else {
        //Si el usuario tiene mas puntos que lo que cuesta el pedido el maximo de puntos que puede gastar se limita al precio del pedido
        if (maxInput > puntosActualesNumber) {
            puntos.setAttribute("max", puntosActualesNumber);
        } else {
            puntos.setAttribute("max", maxInput);

        }
    }

    puntos.setAttribute("min", 0);
    puntos.setAttribute("placeholder", puntosActuales);

});


// Agregar un listener para el evento 'input' del control deslizante
inputPuntos.addEventListener('input', function () {
    let descuentoNumber = (parseInt(inputPuntos.value, 10) / 1000);

    descuentoNumber = descuentoNumber.toFixed(2);


    // Actualizar el contenido del párrafo con el valor del control deslizante
    puntosUtilizados.textContent = 'Puntos utilizados: ' + inputPuntos.value;

    if (inputPuntos.value > 0) {
        textoPuntosUtilizados.className = 'font-weight: normal; font-style: italic';
        descuento.className = 'font-weight: normalfont-weight: normal';

        textoPuntosUtilizados.textContent = 'DECUENTO POR PUNTOS';
        descuento.textContent = "-" + descuentoNumber;

    } else {
        textoPuntosUtilizados.textContent = '';
        descuento.textContent = '';

    }

    divPU.appendChild(textoPuntosUtilizados);
    divPU.appendChild(descuento);

    //Añade valor al input del descuento
    document.getElementById('descuentoFinal').value = descuentoNumber;
    // console.log(document.getElementById('descuentoFinal').value);
    
});




function restaPrecio() {
    let puntos = document.getElementById('puntos').value;

    if (puntos == '' || puntos == 0) {
        // console.log("No ha usado puntos");
        return;
    } else {

        let puntosUsados = {
            id_cliente: CLIENTE,
            puntos: puntos,
        }

        let puntosUsadosJSON = JSON.stringify(puntosUsados);

        // console.log(puntosUsadosJSON);

        fetch("http://proyectoperez.com/gato-preto/?controller=API&action=usePoints", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: puntosUsadosJSON
        })
            .then(response => response.text())
            .then(data => {

                // console.log(data);

            })
            .catch(error => {
                console.error(error);
            });
    }
}

function togglePropinaSeccion() {
    PROPINA = 0;

    var checkbox = document.getElementById('mostrarPropinasCheckbox');
    var propinaSeccion = document.querySelector('.propina-seccion');

    if (checkbox.checked) {
      propinaSeccion.classList.add('mostrar');
    } else {
      propinaSeccion.classList.remove('mostrar');
    }

    console.log(PROPINA);
}


function seleccionarPropina(btn, porcentaje) {

    propinaFinal = PRECIO * (porcentaje / 100);

    propinaFinal = parseFloat(propinaFinal.toFixed(2));

    PROPINA = propinaFinal;

    console.log(PROPINA);

    // Verificar si el botón ya tiene la clase propinaSeleccionada
    var yaSeleccionado = btn.classList.contains('propinaSeleccionada');

    // Desmarcar todos los botones
    var botones = document.querySelectorAll('.buttonPropina');
    botones.forEach(function (boton) {
        boton.classList.remove('propinaSeleccionada');
    });

    // Marcar el botón actual si no estaba seleccionado previamente
    if (!yaSeleccionado) {
        btn.classList.add('propinaSeleccionada');
    } else {
        // Si ya estaba seleccionado, elimina la clase
        btn.classList.remove('propinaSeleccionada');
    }

    // Actualizar el texto del número de propinas
    
    document.getElementById('propinaActual').textContent = propinaFinal;
}
