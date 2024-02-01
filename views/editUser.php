<html>

<?php include_once "header.php"; ?>

<section>
    <div class="row pt-3 ps-3 mb-3 d-flex justify-content-between">
        <div class="col-6">
            <h5>Informacion del Producto:</h5>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a href="<?= URL . "?controller=producto&action=userPage" ?>"><button class="me-3 buttonEstilo">Volver</button></a>
        </div>
    </div>

    <div class="row m-0 w-100 d-flex justify-content-center">
        <div class="col-8 p-0 d-flex flex-column">
            <div class="w-100 d-flex justify-content-between py-2">
                <div class="row tablaCarrito w-100 d-flex justify-content-around">
                    <div class="col-1 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Nombre</p>
                    </div>
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Apellido</p>
                    </div>
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Correo</p>
                    </div>
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Contraseña</p>
                    </div>
                    <div class="col-1">
                    </div>
                </div>
            </div>
            <form action="<?= URL . '?controller=producto&action=update' ?>" method="post">
                <div class="row carrito w-100 d-flex justify-content-around py-2">
                    <div class="col-1 d-flex justify-content-center align-items-center p-0">
                        <div class="d-flex">
                            <input  class="inputUpdate" name='nombre' value="<?= $user->getNombre() ?>">
                            <input hidden name="id" value="<?= $user->getId() ?>">
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                        <div class="d-flex">
                            <input class="inputUpdate" name='apellido' value="<?= $user->getApellido() ?>">
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                        <div class="d-flex">
                            <input class="inputUpdateDisabled" style="max-width: fit-content;" disabled value="<?= $user->getCorreo() ?>">
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                        <div class="d-flex">
                            <input class="inputUpdate" value="<?= $user->getContraseña() ?>">
                        </div>
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-center p-0">

                        <button type="submit" class="buttonEstilo p-1" style="width: fit-content; height: fit-content;">Guardar</button>

                    </div>

                </div>
            </form>
        </div>
    </div>

</section>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>