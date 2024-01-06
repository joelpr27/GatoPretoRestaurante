<html>

<?php include_once "header.php"; ?>

<section>
    <div class="row pt-3 mb-3 ps-3 d-flex justify-content-between">
        <div class="col-7">
            <h5>Detalle del pedido nº<?= $id ?></h5>
        </div>
        <div class="col-5 d-flex justify-content-end">
            <a href="<?= URL . "?controller=producto&action=userPage" ?>"><button class="me-3 buttonEstilo">Volver</button></a>
        </div>


    </div>


    <div class="row m-0 w-100 d-flex justify-content-center">
        <div class="col-8 p-0 d-flex flex-column">
            <div class="w-100 d-flex justify-content-between py-2">
                <div class="row tablaCarrito w-100 d-flex justify-content-around">
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Imagen</p>
                    </div>
                    <div class="col-1 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Id_producto</p>
                    </div>
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Nombre</p>
                    </div>
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Cantidad </p>
                    </div>
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Precio Producto</p>
                    </div>
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Tiempo Total</p>
                    </div>
                </div>
            </div>

            <?php
            $i = 0;
            foreach ($pedidos as $pedido) {
            ?>

                <div class="row carrito w-100 d-flex justify-content-around py-2">
                    <div class="col-2 d-flex justify-content-center align-items-center p-0">
                        <div class="d-flex">
                            <img src="desing/img/Productos/<?= $productos[$i]->getImg() ?>" class="object-fit-scale" style="background-color: #F7F7F7; max-width:105px;">
                        </div>
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-center p-0">
                        <div class="d-flex">
                            <p style="width: fit-content;"><?= $pedido->getId_producto() ?></p>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center p-0">
                        <div class="d-flex">
                            <p style="width: fit-content;"><?= $productos[$i]->getNombre() ?></p>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                        <div class="d-flex">
                            <p style="width: fit-content;"><?= $pedido->getCantidad_producto() ?></p>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                        <div class="d-flex">
                            <p style="width: fit-content;"><?= $pedido->getPrecio_producto() ?>€</p>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                        <div class="d-flex">
                            <p style="width: fit-content;"><?= $pedido->getTiempo_total() ?>min</p>
                        </div>
                    </div>
                </div>

            <?php
                $i++;
            }
            ?>
        </div>
    </div>
</section>