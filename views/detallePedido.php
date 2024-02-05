<html>
<?php include_once "header.php"; ?>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">

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

        <div class="w-100 p-0 pt-3 mb-3 px-3 d-flex flex-column">
            <h5>Reseña y valoracion</h5>
            <div id="divRes" class="row mt-4 w-100 d-flex justify-content-center">
                <?php
                if ($reseña->getValoracion() == null) {
                    echo "<div class=\"col-5 p-0 d-flex justify-content-center\">";
                    echo "<div class=\"w-100 m-0 d-flex flex-column align-items-center\">";
                    echo "<input type=\"hidden\" id=\"id_ped\" name=\"id\" value=" . $pedido->getId_pedido() . ">";

                    echo "<div class=\"d-flex align-self-start\">";

                    echo "<div onclick=\"valoracion(1)\" >";
                    echo "<img src=\"desing/img/Iconos/star-empty.svg\" id=\"estrellaVal1\" style=\"height:15px\" >";
                    echo "</div>";

                    echo "<div onclick=\"valoracion(2)\" >";
                    echo "<img src=\"desing/img/Iconos/star-empty.svg\" id=\"estrellaVal2\" style=\"height:15px\" >";
                    echo "</div>";
                    
                    echo "<div onclick=\"valoracion(3)\" >";
                    echo "<img src=\"desing/img/Iconos/star-empty.svg\" id=\"estrellaVal3\" style=\"height:15px\" >";
                    echo "</div>";
                    
                    echo "<div onclick=\"valoracion(4)\" >";
                    echo "<img src=\"desing/img/Iconos/star-empty.svg\" id=\"estrellaVal4\" style=\"height:15px\" >";
                    echo "</div>";
                    
                    echo "<div onclick=\"valoracion(5)\" >";
                    echo "<img src=\"desing/img/Iconos/star-empty.svg\" id=\"estrellaVal5\" style=\"height:15px\" >";
                    echo "</div>";

                    echo "<input type=\"hidden\" name=\"valoracion\" id=\"val\">";

                    echo "</div>";

                    echo "<input name=\"reseña\" id=\"res\" class=\"mt-2 w-100\" required>";

                    echo "<button onclick=\"addReseña()\" class=\"buttonEstilo p-1 mt-2\" style=\"width: fit-content; height: fit-content;\">Añadir Reseña</button>";
                    
                    echo "</div>";
                    echo "</div>";


                } else {
                    echo "<div class=\"col-8 p-0 d-flex justify-content-center flex-column\">";
                    echo "<div class=\"mb-2\">";
                    switch ($reseña->getValoracion()) {
                        case 0:
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";
                            break;
                        case 1:
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";
                            break;

                        case 2:
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";
                            break;

                        case 3:
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";


                            break;
                        case 4:
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-empty.svg\" style=\"height:12px\" >";
                            break;
                        case 5:
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            echo "<img src=\"desing/img/Iconos/star-full.svg\" style=\"height:12px\" >";
                            break;

                        default:
                            break;
                    }
                    echo "</div>";
                    echo "<p>" . $reseña->getReseña() . "</p>";
                    echo "</div>";
                }
                ?>
            </div>

        </div>

    </div>

</section>


<script src="assets/js/reseñas.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/notie"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
