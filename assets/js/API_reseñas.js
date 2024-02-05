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