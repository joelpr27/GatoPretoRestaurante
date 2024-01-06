<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Gato Preto Restaurant</title>

    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="viewport" content="width=device-width, initial-cover=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<?php
include_once "header.php";
?>

<body class="d-flex flex-column justify-content-center">

    <section class="d-flex flex-column justify-content-center align-items-center pb-3">
        <h3><?= strtoupper($productos[0]->getNombre_categoria()) ?></h3>

        <div class="row mx-0 px-3 px-sm-5 px-md-0 px-lg-0 d-flex justify-content-center">


            <?php foreach ($productos as $producto) { ?>

                <div class=" col-11 mt-4 col-md-5 col-lg-3 col-xl-2 px-0 py-4 mx-md-3 p-md-0 mx-lg-3 p-lg-0 mx-xl-3 p-xl-0">
                    <div class="card border-0">
                        <img src="desing/img/Productos/<?= $producto->getImg() ?>" style="background-color: #F7F7F7;" class="object-fit-scale">
                        <div class="infoProducto p-2 d-flex flex-column">
                            <p><?= $producto->getNombre() ?></p>
                            <div class="d-flex justify-content-between">
                                <div class="m-0 fw-bold d-flex align-items-center">

                                    <form action="<?= URL . "?controller=producto&action=addFavorite" ?>" method="post" class="m-0">
                                        <input hidden name="id" value="<?= $producto->getId() ?>">
                                        <button type="submit" class="añadirCarrito p-0"><img src="desing/img/Iconos/corazon.png" style="height: 12px; width: 12px"></button>
                                    </form>

                                    <p class="align-self-start ms-1 mb-0"><?= $producto->getPrecioDescuento() . "€" ?></p>

                                    <?php
                                    if ($producto->getDescuento() != null) {
                                        echo "<p class=\"promo align-self-start ms-1 mb-0\">" . $producto->getPrecio() . "€ </p>";
                                    }
                                    ?>

                                    <div class="descuento d-flex justify-content-center bg-descuento rounded-1 px-1 ms-1">

                                        <p class="mb-0"><?= $producto->getDescuentoText() ?></p>

                                    </div>

                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                    <form action="<?= URL . "?controller=producto&action=addCart" ?>" method="post" class="m-0">
                                        <input hidden name="id" value="<?= $producto->getId() ?>">
                                        <button type="submit" class="añadirCarrito"><img src="desing/img/Iconos/shopping-cart.png" style="height: 19px; width: 19px"></button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </section>

</body>

<?php
include_once "footer.php";
?>

<script src="assets/js/bootstrap.bundle.min.js"></script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</html>