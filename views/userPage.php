<html>

<?php include_once "header.php"; ?>

<section>
    <div class="row pt-3 ps-3 d-flex justify-content-between">
        <div class="col-7">
            <h5>Informacion de Usuario:</h5>
        </div>
        <div class="col-5 d-flex justify-content-end">
            <a href="<?= URL . "?controller=producto&action=cerrarSession" ?>"><button class="me-3 buttonEstilo">Cerrar Session</button></a>

        </div>


    </div>


    <div class="row m-0 mt-2 w-100 d-flex justify-content-center">
        <div class="col-8 p-0 d-flex flex-column">
            <div class="w-100 d-flex justify-content-between py-2">
                <div class="row tablaCarrito w-100 d-flex justify-content-around">
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Nombre</p>
                    </div>
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Apellido </p>
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
            <div class="row carrito w-100 d-flex justify-content-around py-2">
                <div class="col-2 d-flex justify-content-center align-items-center p-0">
                    <div class="d-flex">
                        <p style="width: fit-content;"><?= $user->getNombre() ?></p>
                    </div>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                    <div class="d-flex">
                        <p style="width: fit-content;"><?= $user->getApellido() ?></p>
                    </div>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                    <div class="d-flex">
                        <p style="width: fit-content;"><?= $user->getCorreo() ?></p>
                    </div>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                    <div class="d-flex">
                        <p style="width: fit-content;">*****</p>
                    </div>
                </div>
                <div class="col-1 p-0 d-flex justify-content-center align-items-center ">
                    <form action="<?= URL . "?controller=producto&action=goUpdateUser" ?>" method="post" class="m-0">
                        <input hidden name="id" value="<?= $user->getId() ?>">
                        <button type="submit" class="buttonEstilo p-1" style="width: fit-content; height: fit-content;">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section>


    <div class="row pt-3 ps-3 mb-3 d-flex justify-content-between">
        <div class="col-12">
            <h5>Pedidos:</h5>
        </div>
    </div>


    <div class="w-100 my-3 p-0 d-flex justify-content-center align-items-center ">
        <h6>Ultimo Pedido:</h6>
    </div>

    <div class="row m-0 w-100 d-flex justify-content-center">
        <?php
        if (isset($_COOKIE['ultimoPedido'])) {
        ?>
            <div class="col-8 p-0 d-flex flex-column">
                <div class="w-100 d-flex justify-content-between py-2">
                    <div class="row tablaCarrito w-100 d-flex justify-content-around">
                        <div class="col-2 d-flex flex-column align-items-center p-0">
                            <p class="p-0 m-0">Pedido_id</p>
                        </div>
                        <div class="col-2 d-flex flex-column align-items-center p-0">
                            <p class="p-0 m-0">fecha</p>
                        </div>
                        <div class="col-2 d-flex flex-column align-items-center p-0">
                            <p cla ss="p-0 m-0">precio_total</p>
                        </div>
                    </div>
                </div>
                <div class="row carrito w-100 d-flex justify-content-around py-2">
                    <div class="col-2 d-flex justify-content-center align-items-center p-0">
                        <div class="d-flex">
                            <p style="width: fit-content;"><?= $ultimoPedido->getId() ?></p>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                        <div class="d-flex">
                            <p style="width: fit-content;"><?= $ultimoPedido->getFecha() ?></p>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                        <div class="d-flex">
                            <p style="width: fit-content;"><?= $ultimoPedido->getPrecio_total() ?> €</p>
                        </div>
                    </div>
                </div>

                <div class="w-100 my-3 p-0 d-flex justify-content-center align-items-center ">
                    <form action="<?= URL . "?controller=producto&action=detallePedido" ?>" method="post" class="m-0">
                        <input hidden name="id" value="<?= $ultimoPedido->getId() ?>">
                        <button type="submit" class="buttonEstilo p-1" style="width: fit-content; height: fit-content;">Detalle Ultimo Pedido</button>
                    </form>
                </div>

            <?php
        } else {
            echo "<div class=\"d-flex justify-content-center\">";
            echo "<p>Hace demasiado que no compras!!!</p>";
            echo "</div>";
        }
            ?>
            </div>
    </div>


    <div class="w-100 my-3 p-0 d-flex justify-content-center align-items-center ">
        <h6>Todos los Pedido:</h6>
    </div>
    <div class="row m-0 w-100 d-flex justify-content-center">
        <?php
        if ($pedidos != null) {
        ?>
            <div class="col-8 p-0 d-flex flex-column">
                <div class="w-100 d-flex justify-content-between py-2">
                    <div class="row tablaCarrito w-100 d-flex justify-content-around">
                        <div class="col-2 d-flex flex-column align-items-center p-0">
                            <p class="p-0 m-0">Pedido_id</p>
                        </div>
                        <div class="col-2 d-flex flex-column align-items-center p-0">
                            <p class="p-0 m-0">fecha</p>
                        </div>
                        <div class="col-2 d-flex flex-column align-items-center p-0">
                            <p class="p-0 m-0">precio_total</p>
                        </div>
                        <div class="col-1">
                        </div>
                    </div>
                </div>
                <?php
                foreach ($pedidos as $pedido) {
                ?>
                    <div class="row carrito w-100 d-flex justify-content-around py-2">
                        <div class="col-2 d-flex justify-content-center align-items-center p-0">
                            <div class="d-flex">
                                <p style="width: fit-content;"><?= $pedido->getId() ?></p>
                            </div>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                            <div class="d-flex">
                                <p style="width: fit-content;"><?= $pedido->getFecha() ?></p>
                            </div>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                            <div class="d-flex">
                                <p style="width: fit-content;"><?= $pedido->getPrecio_total() ?> €</p>
                            </div>
                        </div>
                        <div class="col-1 p-0 d-flex justify-content-center align-items-center ">
                            <form action="<?= URL . "?controller=producto&action=detallePedido" ?>" method="post" class="m-0">
                                <input hidden name="id" value="<?= $pedido->getId() ?>">
                                <button type="submit" class="buttonEstilo p-1" style="width: fit-content; height: fit-content;">Detalle</button>
                            </form>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div class=\"d-flex justify-content-center\">";
                echo "<p>Todavia no has pedido nada</p>";
                echo "</div>";
            }
            ?>

            </div>
    </div>

    <div class="d-flex justify-content-center pt-4">
        <a href="<?= URL . "?controller=producto&action=reseñas" ?>"><button class="me-3 justify-content-center buttonEstilo">Reseñas</button></a>
    </div>

</section>

<?php
if ($user->getRol() == 1) {
?>
    <section>
        <div class="row pt-3 ps-3 mt-4 d-flex justify-content-between">
            <div class="col-6">
                <h5 class="m-0 align-self-start">Productos:</h5>
            </div>
        </div>

        <div class="w-100 mx-0 mt-4 px-3 d-flex justify-content-xl-center justify-content-around">
            <div class="d-flex justify-content-start">
                <a href="<?= URL . "?controller=producto&action=addProduct" ?>"><button class="me-3 buttonEstilo">Añadir</button></a>

                <a href="<?= URL . "?controller=producto&action=seeProducts" ?>"><button class="me-3 buttonEstilo p-2" style="width: fit-content;">Modificar/Eliminar</button></a>
            </div>
        </div>
    </section>
<?php
}
?>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>