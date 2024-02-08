<html>

<?php include_once 'utils/calculadoraPrecios.php' ?>

<section class="px-4">
    <h2>Carrito de compras</h2>
    <?php
    if (count($_SESSION['carrito']) != 0) {
    ?>
        <div class="row m-0 d-flex">
            <div class="col-8 p-0 d-flex flex-column px-3">
                <div class="w-100 d-flex justify-content-between py-2">
                    <div class="row tablaCarrito w-100 d-flex">
                        <div class="col-5 d-flex flex-column me-2">
                            <h7>ARTICULO</h7>
                        </div>
                        <div class="col-2 d-flex align-items-center flex-column p-0">
                            <h7>PRECIO</h7>
                        </div>
                        <div class="col-2 d-flex align-items-center flex-column p-0">
                            <h7>CANTIDAD</h7>
                        </div>
                        <div class="col-2 d-flex align-items-center flex-column p-0">
                            <h7>SUBTOTAL</h7>
                        </div>
                    </div>
                </div>
                <?php
                $pos = 0;
                foreach ($_SESSION['carrito'] as $pedido) {
                ?>
                    <div class="row carrito w-100 d-flex py-2 align-items-center">
                        <div class="col-5 ">
                            <div class="d-flex align-items-center">
                                <img src="desing/img/Productos/<?= $pedido->getProducto()->getImg() ?>" class="object-fit-scale" style="background-color: #F7F7F7; max-width:105px;">

                                <p class="tipo ms-4"><?= $pedido->getProducto()->getNombre() ?></p>

                            </div>
                        </div>

                        <div class="col-2 text-center d-flex justify-content-center ">

                            <?php
                            if ($pedido->getProducto()->getDescuento() != null) {
                                echo "<p class=\"tipo align-self-start me-2 mb-0\" style=\" text-decoration: line-through;\">" . $pedido->getProducto()->getPrecio() . " € </p>";
                                echo "<p class=\"tipo align-self-start mb-0\" style=\" color: var(--bg-descuento);\">" . $pedido->getProducto()->getPrecioDescuento() . " € </p>";
                            } else {
                                echo "<p class=\"tipo align-self-start ms-1 mb-0\">" . $pedido->getProducto()->getPrecio() . " € </p>";
                            }
                            ?>
                        </div>

                        <div class="col-2 text-center d-flex justify-content-center p-0">
                            <form action="<?= URL . "?controller=producto&action=compra" ?>" method="post" class="cantidadCarrito d-flex justify-content-center align-items-center m-0" style="height: fit-content;">
                                <button type="submit" name="Del" value="<?= $pos ?>" class="px-2">-</button>

                                <p class="tipo m-1"><?= $pedido->getCantidad() ?></p>

                                <button type="submit" name="Add" value="<?= $pos ?>" class="px-2">+</button>
                            </form>
                        </div>

                        <div class="col-2 text-center d-flex justify-content-center">
                            <?php
                            if ($pedido->getProducto()->getDescuento() == null) {
                                echo "<p class=\"tipo\">" . $pedido->getPrecioTotal()  . "€ </p>";
                            } else {
                                echo "<p class=\"tipo\">" . $pedido->getPrecioTotalConDescuento()  . "€ </p>";
                            }
                            ?>
                        </div>

                        <div class="col-1 text-center d-flex justify-content-center align-items-center p-0">
                            <form action="<?= URL . "?controller=producto&action=deleteCart" ?>" method="post" class="m-0">
                                <input hidden name="id" value="<?= $pedido->getProducto()->getId() ?>">
                                <button type="submit" class="eliminarCarrito p-0 m-0" name="pos" value="<?= $pos ?>"><img src="desing/img/Iconos/cross.svg" style="max-width: 20px;"></button>
                            </form>
                        </div>

                    </div>
                <?php
                    $pos++;
                }
                ?>
                <a href="<?= URL . "?controller=producto" ?>" class="mt-3" style="text-decoration: none; width:fit-content;">
                    <button class="py-2 px-3 buttonEstiloAtras d-flex justify-content-between align-items-center">
                        <p class="ps-1" style="font-size: 13px; text-decoration: none;">
                            << 
                        </p>
                        <p>ATRÁS</p>
                    </button>
                </a>

            </div>
            <div class="resumenPedido col-4 ps-2" style="max-height: 481px;">
                <div style="background-color: #F6F6F6;">
                    <div class="resumenPedidoTitulo mx-3 py-3 d-flex justify-content-center">
                        <h8 class="m-0 p-0">RESUMEN PEDIDO</h8>
                    </div>
                    <div class="p-4">
                        <div class="pb-2 d-flex justify-content-between">
                            <p>SUBTOTAL</p>
                            <p style="font-weight: normal;"><?= CalculadoraPrecios::calculadoraPrecioPedido($_SESSION['carrito']) ?> €</p>
                        </div>
                        <div class="pb-2 d-flex justify-content-between" style="color: var(--bg-descuento);">
                            <p>DESCUENTO</p>
                            <p style="font-weight: normal;"><?= CalculadoraPrecios::calculadoraDescuentoFinal($_SESSION['carrito']) ?> €</p>
                        </div>
                        <div id="descuentoPuntos" class="pb-2 d-flex justify-content-between" style="color: var(--bg-descuento);">
                        </div>
                        <div class="pb-2 d-flex justify-content-between">
                            <p>ENVIO</p>
                            <p style="font-weight: normal; font-style: italic;">AÚN NO SE HA CALCULADO </p>
                        </div>
                        <div class="pb-2 d-flex justify-content-between">
                            <p>Con este pedido ganaras</p>
                            <p id="puntosGanados" style="font-weight: normal; font-style: italic;"></p>
                        </div>
                        <div class="pt-4 precioTotal d-flex justify-content-between">
                            <p>TOTAL DEL PEDIDO</p>
                            <p id="precioFinal"><?= CalculadoraPrecios::calculadoraPrecioFinal($_SESSION['carrito']) ?> €</p>
                        </div>
                        <div class="IVA d-flex justify-content-between">
                            <p>IVA (incluido en el precio total)</p>
                            <p style="font-weight: normal;"><?= CalculadoraPrecios::calculadoraPrecioIVA($_SESSION['carrito']) ?> €</p>
                        </div>
                    </div>

                    <div class="p-4 d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between">
                            <p>PUNTOS TOTALES</p>
                            <div class="d-flex">
                                <p id="puntosAcutales" style="font-weight: normal; font-style: italic;"><?php if($user->getPuntos() == 0){ echo""; }else{ echo $user->getPuntos(); } ?></p>
                                <p class="ps-1" style="font-weight: normal; font-style: italic;"><?php if($user->getPuntos() == 0){ echo"No tienes puntos"; }else{ echo "Puntos"; } ?></p>
                            </div>
                        </div>
                        <div class="IVA d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <p>Cuantos puntos quieres usar?</p>
                                <p>(1000 puntos = 1€)</p>                
                            </div>
                            <div>
                                <input id="puntos" type="range" value="0">
                                <p id="puntosUtilizados" style="font-weight: normal; font-style: italic; text-align: right;"><?php if($user->getPuntos() == 0){ echo"No tienes puntos"; }else{ echo "Puntos utilizados: 0"; } ?></p>
                            </div>
                            
                        </div>
                    </div>



                </div>
                <!-- <button class="w-100 py-2 px-4 buttonEstilo2" onclick="añadirPuntos(<?= $id_cliente ?> ,<?= CalculadoraPrecios::calculadoraPrecioFinal($_SESSION['carrito']) ?>)">Prueba</button> -->

                <form action="<?= URL . "?controller=producto&action=createPedido" ?>" method="post" class="mt-4">
                    <input id="descuentoFinal" type="hidden" name="descuentoFinal" value="0">
                    <button class="w-100 py-2 px-4 buttonEstilo2" type="submit" onclick="añadirPuntos(<?= $id_cliente ?> ,<?= CalculadoraPrecios::calculadoraPrecioFinal($_SESSION['carrito']) ?>)">CONTINUAR CON EL PEDIDO</button>
                </form>
            </div>
        </div>

    <?php
    } else {
    ?>

        <div class="col-6 text-center p-0 w-100 noCarrito">
            <p class="mb-2">No tienes productos en tu cesta.</p>
            <p class="mb-2">Haga clic aquí para continuar comprando.</p>
        </div>

    <?php
    }
    ?>


</section>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/puntos.js"></script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</html>