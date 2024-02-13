document.addEventListener('DOMContentLoaded', function () {

    fetch("http://proyectoperez.com/gato-preto/?controller=API&action=api", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            accion: 'consultaResenas',
        }),
    })
        .then(response => {
            return response.json();
        })
        .then(data => {
            mostrarResenas(data);
        })
        .catch(error => {
            console.error(error);
        });


        
});


function mostrarResenas(resenas) {
    const contenedor = document.getElementById('reseñas-container');

    resenas.forEach(resena => {
        if (resena.valoracion != null) {

            const resEntera = document.createElement('div');
            resEntera.className = 'row tablaReseña w-100 d-flex justify-content-around p-0';

            const divNombre = document.createElement('div');
            const divValoracion = document.createElement('div');
            const divRes = document.createElement('div');

            const nombrecliente = document.createElement('p');
            const valoracion1 = document.createElement('img');
            const valoracion2 = document.createElement('img');
            const valoracion3 = document.createElement('img');
            const valoracion4 = document.createElement('img');
            const valoracion5 = document.createElement('img');

            const res = document.createElement('p');

            divNombre.className = 'col-2 d-flex justify-content-center align-items-center p-0 py-3';
            nombrecliente.innerHTML = 'style: width: fit-content';
            nombrecliente.textContent = resena.nombre_cliente;

            divValoracion.className = 'col-2 d-flex justify-content-center align-items-center p-0 py-3';
            valoracion1.setAttribute("style", "height:12px");
            valoracion2.setAttribute("style", "height:12px");
            valoracion3.setAttribute("style", "height:12px");
            valoracion4.setAttribute("style", "height:12px");
            valoracion5.setAttribute("style", "height:12px");




            switch (resena.valoracion) {
                case 0:
                    valoracion1.setAttribute("src", "desing/img/Iconos/star-empty.svg");
                    valoracion2.setAttribute("src", "desing/img/Iconos/star-empty.svg");
                    valoracion3.setAttribute("src", "desing/img/Iconos/star-empty.svg");
                    valoracion4.setAttribute("src", "desing/img/Iconos/star-empty.svg");
                    valoracion5.setAttribute("src", "desing/img/Iconos/star-empty.svg");

                    break;
                case 1:
                    valoracion1.setAttribute("src", "desing/img/Iconos/star-full.svg");
                    valoracion2.setAttribute("src", "desing/img/Iconos/star-empty.svg");
                    valoracion3.setAttribute("src", "desing/img/Iconos/star-empty.svg");
                    valoracion4.setAttribute("src", "desing/img/Iconos/star-empty.svg");
                    valoracion5.setAttribute("src", "desing/img/Iconos/star-empty.svg");


                    break;

                case 2:
                    valoracion1.setAttribute("src", "desing/img/Iconos/star-full.svg");
                    valoracion2.setAttribute("src", "desing/img/Iconos/star-full.svg");
                    valoracion3.setAttribute("src", "desing/img/Iconos/star-empty.svg");
                    valoracion4.setAttribute("src", "desing/img/Iconos/star-empty.svg");
                    valoracion5.setAttribute("src", "desing/img/Iconos/star-empty.svg");


                    break;

                case 3:
                    valoracion1.setAttribute("src", "desing/img/Iconos/star-full.svg");
                    valoracion2.setAttribute("src", "desing/img/Iconos/star-full.svg");
                    valoracion3.setAttribute("src", "desing/img/Iconos/star-full.svg");
                    valoracion4.setAttribute("src", "desing/img/Iconos/star-empty.svg");
                    valoracion5.setAttribute("src", "desing/img/Iconos/star-empty.svg");


                    break;
                case 4:
                    valoracion1.setAttribute("src", "desing/img/Iconos/star-full.svg");
                    valoracion2.setAttribute("src", "desing/img/Iconos/star-full.svg");
                    valoracion3.setAttribute("src", "desing/img/Iconos/star-full.svg");
                    valoracion4.setAttribute("src", "desing/img/Iconos/star-full.svg");
                    valoracion5.setAttribute("src", "desing/img/Iconos/star-empty.svg");


                    break;
                case 5:
                    valoracion1.setAttribute("src", "desing/img/Iconos/star-full.svg");
                    valoracion2.setAttribute("src", "desing/img/Iconos/star-full.svg");
                    valoracion3.setAttribute("src", "desing/img/Iconos/star-full.svg");
                    valoracion4.setAttribute("src", "desing/img/Iconos/star-full.svg");
                    valoracion5.setAttribute("src", "desing/img/Iconos/star-full.svg");

                    break;

                default:
                    break;
            }

            divRes.className = 'col-8 d-flex justify-content-center align-items-center p-0 py-3';
            res.innerHTML = 'style: width: fit-content';
            res.textContent = resena.resena;

            contenedor.appendChild(resEntera);

            resEntera.appendChild(divNombre);
            resEntera.appendChild(divValoracion);
            resEntera.appendChild(divRes);

            divNombre.appendChild(nombrecliente);
            divValoracion.appendChild(valoracion1);
            divValoracion.appendChild(valoracion2);
            divValoracion.appendChild(valoracion3);
            divValoracion.appendChild(valoracion4);
            divValoracion.appendChild(valoracion5);


            divRes.appendChild(res);


        } else {
            return;
        }

    });
}

let ordenAscendenteNom = true;
let ordenAscendenteNum = true;


    // Función para ordenar las reseñas
    function ordenarResenas(criterio) {
        const contenedor = document.getElementById('reseñas-container');
        const reseñas = contenedor.children;

        // Convierte las reseñas a un array para facilitar la manipulación
        const arrayReseñas = Array.from(reseñas);

        // Invierte el orden si el mismo criterio es clicado nuevamente
        if(criterio == 'nombreUsu'){
            if (ordenAscendenteNom) {
                arrayReseñas.sort((a, b) => compararResenas(a, b, criterio));
            } else {
                arrayReseñas.sort((a, b) => compararResenas(b, a, criterio));
            }
        }else{
            if (ordenAscendenteNum) {
                arrayReseñas.sort((a, b) => compararResenas(b, a, criterio));
            } else {
                arrayReseñas.sort((a, b) => compararResenas(a, b, criterio));
            }   
        }


        // Limpia el contenedor actual
        contenedor.innerHTML = '';

        // Agrega las reseñas ordenadas al contenedor
        arrayReseñas.forEach(resena => {
            contenedor.appendChild(resena);
        });

        // Invierte el estado del orden para la próxima vez
        if(criterio == 'nombreUsu'){
            ordenAscendenteNom = !ordenAscendenteNom;
            actualizarImagenFlecha('nombreUsu');
        }else{
            ordenAscendenteNum = !ordenAscendenteNum;
            actualizarImagenFlecha('valoracion');

        }
    }

    // Función para comparar dos reseñas según el criterio
    function compararResenas(resenaA, resenaB, criterio) {
        const valorA = obtenerValor(resenaA, criterio);
        const valorB = obtenerValor(resenaB, criterio);

        // Compara los valores y ordena
        if (valorA < valorB) {
            return -1;
        } else if (valorA > valorB) {
            return 1;
        } else {
            return 0;
        }
    }

    function obtenerValor(resena, criterio) {
        switch (criterio) {
            case 'nombreUsu':
                return resena.querySelector('.col-2 p').textContent.toLowerCase();

            case 'valoracion':
                const valoracion = resena.querySelector('.col-2 img[src*="star-full"]');
                return valoracion ? obtenerNumeroEstrellas(valoracion) : 0;

            default:
                return 0;
        }
    }

    // Función para obtener el número de estrellas llenas
    function obtenerNumeroEstrellas(valoracionImage) {
        const estrellasLlenas = Array.from(valoracionImage.parentNode.querySelectorAll('img[src*="star-full"]'));
        return estrellasLlenas.length;
    }

    function actualizarImagenFlecha(criterio) {
        const flechaElement = document.querySelector(`.col-2[onclick="ordenarResenas('${criterio}')"] img`);
        if (criterio == 'nombreUsu') {
            flechaElement.src = ordenAscendenteNom ? 'desing/img/iconos/sortUP.svg' : 'desing/img/iconos/sortDOWN.svg';
        } else {
            flechaElement.src = ordenAscendenteNum ? 'desing/img/iconos/sortUP.svg' : 'desing/img/iconos/sortDOWN.svg';
        }
    }
