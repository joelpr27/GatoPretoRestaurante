function valoracion(n) {

    const valoracion = document.getElementById('val');

    const estrella1 = document.getElementById('estrellaVal1');
    const estrella2 = document.getElementById('estrellaVal2');
    const estrella3 = document.getElementById('estrellaVal3');
    const estrella4 = document.getElementById('estrellaVal4');
    const estrella5 = document.getElementById('estrellaVal5');


    switch (n) {
        case 1:
            valoracion.value = 1;
            estrella1.src = 'desing/img/Iconos/star-full.svg';
            estrella2.src = 'desing/img/Iconos/star-empty.svg';
            estrella3.src = 'desing/img/Iconos/star-empty.svg';
            estrella4.src = 'desing/img/Iconos/star-empty.svg';
            estrella5.src = 'desing/img/Iconos/star-empty.svg';


            break;
        case 2:
            valoracion.value = 2;
            estrella1.src = 'desing/img/Iconos/star-full.svg';
            estrella2.src = 'desing/img/Iconos/star-full.svg';
            estrella3.src = 'desing/img/Iconos/star-empty.svg';
            estrella4.src = 'desing/img/Iconos/star-empty.svg';
            estrella5.src = 'desing/img/Iconos/star-empty.svg';

            break;
        case 3:
            valoracion.value = 3;
            estrella1.src = 'desing/img/Iconos/star-full.svg';
            estrella2.src = 'desing/img/Iconos/star-full.svg';
            estrella3.src = 'desing/img/Iconos/star-full.svg';
            estrella4.src = 'desing/img/Iconos/star-empty.svg';
            estrella5.src = 'desing/img/Iconos/star-empty.svg';


            break;
        case 4:
            valoracion.value = 4;
            estrella1.src = 'desing/img/Iconos/star-full.svg';
            estrella2.src = 'desing/img/Iconos/star-full.svg';
            estrella3.src = 'desing/img/Iconos/star-full.svg';
            estrella4.src = 'desing/img/Iconos/star-full.svg';
            estrella5.src = 'desing/img/Iconos/star-empty.svg';
            break;
        case 5:
            valoracion.value = 5;
            estrella1.src = 'desing/img/Iconos/star-full.svg';
            estrella2.src = 'desing/img/Iconos/star-full.svg';
            estrella3.src = 'desing/img/Iconos/star-full.svg';
            estrella4.src = 'desing/img/Iconos/star-full.svg';
            estrella5.src = 'desing/img/Iconos/star-full.svg';

            break;

        default:
            break;
    }
}

function addReseña(){
    let id_pedido = document.getElementById('id_ped').value;
    let valoracion = document.getElementById('val').value;
    let reseña = document.getElementById('res').value;

    if((valoracion != "") && (reseña != "")){
        let reseñaCompleta = {
            id_pedido: id_pedido,
            valoracion: valoracion,
            reseña: reseña
        }
    
        let reseñaJSON = JSON.stringify(reseñaCompleta);
    
        console.log(reseñaJSON);
    
        fetch("http://proyectoperez.com/gato-preto/?controller=API&action=addReseñas", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: reseñaJSON
        })
        .then(response => response.text())
        .then(data => {
            
            console.log(data);
    
            notie.alert({
                type: '1',
                text: 'Reseña añadida correctamente',
                time: 5
            });
    
            reseñaAñadida();
        })
        .catch(error => {
            console.error(error);
        });

    }else{
        notie.alert({
            type: '3',
            text: 'Te faltan campos por rellenar',
            time: 5
        });
    }
}

function reseñaAñadida() {

    const div = document.getElementById('divRes');

    console.log(div);

    div.innerHTML = "<div class=\"col-8 p-0 d-flex justify-content-center align-items-center\" onclick=\"reload()\"> <h6>Haz click para ver la reseña</  h6> </div>"

    console.log(div);

}

function reload(){
    location.reload();
}