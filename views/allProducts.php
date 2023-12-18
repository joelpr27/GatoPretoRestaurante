<html>

<?php include_once "header.php"; ?>

<section>
    <div class="row pt-3 ps-3 mb-3 d-flex justify-content-between">
        <div class="col-6">
            <h5>Todos los Productos:</h5>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a href="<?= URL . "?controller=producto&action=userPage" ?>"><button class="me-3 buttonEstilo">Volver</button></a>
        </div>
    </div>

    <div class="row m-0 w-100 d-flex justify-content-center">
        <div class="col-8 p-0 d-flex flex-column">
            <div class="w-100 d-flex justify-content-between py-2">
                <div class="row tablaCarrito w-100 d-flex justify-content-around">
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Producto_id</p>
                    </div>
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Img</p>
                    </div>
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Nombre</p>
                    </div>
                    <div class="col-1 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Categoria</p>
                    </div>
                    <div class="col-1 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Preparacion</p>
                    </div>
                    <div class="col-1 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Precio</p>
                    </div>
                    <div class="col-1 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Descuento</p>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-1">
                    </div>
                </div>
            </div>
            <?php
            foreach ($productos as $producto) {
            ?>
                <div class="row carrito w-100 d-flex justify-content-around py-2">
                    <div class="col-2 d-flex justify-content-center align-items-center p-0">
                        <div class="d-flex">
                            <p style="width: fit-content;"><?= $producto->getId() ?></p>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                        <div>
                            <img src="desing/img/Productos/<?= $producto->getImg() ?>" class="object-fit-scale" style="background-color: #F7F7F7; max-width:105px;">
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                        <div class="d-flex">
                            <p style="width: fit-content;"><?= $producto->getNombre() ?></p>
                        </div>
                    </div>

                    <div class="col-1 d-flex justify-content-center align-items-center p-0">
                        <p style="width: fit-content;"><?= $producto->getNombre_categoria() ?></p>
                    </div>

                    <div class="col-1 d-flex justify-content-center align-items-center p-0">
                        <p style="width: fit-content;"><?= $producto->getTiempo_preparacion() ?> min</p>
                    </div>

                    <div class="col-1 d-flex justify-content-center align-items-center p-0">
                        <p style="width: fit-content;"><?= $producto->getPrecio() ?>€</p>
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-center p-0">
                        <p style="width: fit-content;"><?= $producto->getDescuento() ?></p>
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-center p-0">
                        <form action="<?= URL . "?controller=producto&action=updateProduct" ?>" method="post">
                            <input hidden name="id" value="<?= $producto->getId() ?>">
                            <input hidden name="nombre" value="<?= $producto->getNombre() ?>">
                            <input hidden name="id_categoria" value="<?= $producto->getId_categoria() ?>">
                            <input hidden name="tiempo_preparacion" value="<?= $producto->getTiempo_preparacion() ?>">
                            <input hidden name="precio" value="<?= $producto->getPrecio() ?>">
                            <button type="submit" class="buttonEstilo p-1" style="width: fit-content; height: fit-content;">Modificar</button>
                        </form>
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-center p-0">
                        <form action="<?= URL . "?controller=producto&action=delete" ?>" method="post">
                            <input hidden name="id" value="<?= $producto->getId() ?>">
                            <button type="submit" class="buttonEstilo p-1" style="width: fit-content; height: fit-content;">Eliminar</button>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>

</section>