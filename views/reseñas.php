<html>

<?php include_once "header.php"; ?>

<section>
    <section>
        <div class="row pt-3 ps-3 mb-3 d-flex justify-content-between">
            <div class="col-6">
                <h5>Reseñas:</h5>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a href="<?= URL . "?controller=producto&action=userPage" ?>"><button class="me-3 buttonEstilo">Volver</button></a>
            </div>  
        </div>



        <div class="row m-0 w-100 d-flex justify-content-center">
            
            <div class="col-8 p-0 d-flex flex-column">
                <div class="w-100 d-flex justify-content-between py-2">
                    <div class="row tablaCarrito w-100 d-flex justify-content-around">
                        <div class="col-2 d-flex justify-content-center  align-items-center p-0" onclick="ordenarResenas('nombreUsu')" style="cursor: pointer;">
                            <p class="p-0 me-2">Nombre</p>
                            <img src="desing/img/iconos/sortUP.svg" style="height: 20px;">
                        </div>
                        <div class="col-2 d-flex justify-content-center  align-items-center p-0" onclick="ordenarResenas('valoracion')" style="cursor: pointer;">
                            <p class="p-0 me-2">Valoracion</p>
                            <img src="desing/img/iconos/sortUP.svg" style="height: 20px;">

                        </div>
                        <div class="col-8 d-flex justify-content-center  align-items-center p-0">
                            <p class="p-0 m-0">Reseña</p>
                        </div>
                    </div>
                </div>


                <div id="reseñas-container" class="row w-100 d-flex justify-content-around py-2">
                </div>

            </div>
        </div>

    </section>
</section>


<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/API_reseñas.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>