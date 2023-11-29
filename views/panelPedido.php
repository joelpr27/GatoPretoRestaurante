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
        <h3>ARTÍCULOS DE INTERÉS</h3>

        <div class="caruselXL">
            <div class="row w-100 mx-0 px-3 d-flex justify-content-center">
                <div class="container mt-5">
                    <div id="myCarouselXL" class="carousel slide">
                        <div class="carousel-inner">
                            <?php $totalProductos = count($productos); ?>
                            <?php $numProductos = ceil($totalProductos / 5); ?>

                            <?php for ($i = 0; $i < $numProductos; $i++) { ?>
                                <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
                                    <div class="card-deck px-2">
                                        <?php for ($j = 0; $j < 5; $j++) { ?>
                                            <?php $index = $i * 5 + $j; ?>
                                            <?php if ($index < $totalProductos) { ?>
                                                <div class="card border-0 col-xl-2 px-0 py-4 mx-xl-3 p-xl-0">

                                                    <img src="desing/img/Productos/<?= $productos[$index]->getImg() ?>" class="imgProducto object-fit-scale">

                                                    <div class="infoProducto p-1 d-flex flex-column">

                                                        <p><?= $productos[$index]->getNombre() ?></p>

                                                        <div class="d-flex justify-content-between">

                                                            <div class="m-0 fw-bold d-flex align-items-center">

                                                                <form action="<?= URL . "?controller=producto&action=addFavorite" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
                                                                    <button type="submit" class="añadirCarrito p-0"><img src="desing/img/Iconos/corazon.png" style="height: 12px; width: 12px"></button>
                                                                </form>

                                                                <p class="align-self-start ms-1 mb-0"><?= $productos[$index]->getPrecio() . "€" ?></p>

                                                                <p class="promo align-self-start ms-1 mb-0">4,50 €</p>

                                                                <div class="descuento d-flex justify-content-center bg-descuento rounded-1 px-1 ms-1">

                                                                    <p class="mb-0">-35%</p>

                                                                </div>

                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <form action="<?= URL . "?controller=producto&action=addCart" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
                                                                    <button type="submit" class="añadirCarrito"><img src="desing/img/Iconos/shopping-cart.png" style="height: 19px; width: 19px"></button>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <a class="carousel-control-prev d-flex justify-content-start ms-4" href="#myCarouselXL" role="button" data-slide="prev">
                            <span class="carouselPrevIcon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next d-flex justify-content-end me-4" href="#myCarouselXL" role="button" data-slide="next">
                            <span class="carouselNextIcon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="caruselLG">
            <div class="row w-100 mx-0 px-3 px-sm-5 px-md-0 px-lg-0 d-flex justify-content-center">
                <div class="container mt-5">
                    <div id="myCarouselLG" class="carousel slide">
                        <div class="carousel-inner">
                            <?php $totalProductos = count($productos); ?>
                            <?php $numProductos = ceil($totalProductos / 3); ?>

                            <?php for ($i = 0; $i < $numProductos; $i++) { ?>
                                <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
                                    <div class="card-deck px-2">
                                        <?php for ($j = 0; $j < 3; $j++) { ?>
                                            <?php $index = $i * 3 + $j; ?>
                                            <?php if ($index < $totalProductos) { ?>
                                                <div class="card border-0  col-11 mt-4 col-md-5 col-lg-3 col-xl-2 px-0 py-4 mx-md-3 p-md-0 mx-lg-3 p-lg-0 mx-xl-3 p-xl-0">

                                                    <img src="desing/img/Productos/<?= $productos[$index]->getImg() ?>" class="imgProducto object-fit-scale">

                                                    <div class="infoProducto p-2 d-flex flex-column">

                                                        <p><?= $productos[$index]->getNombre() ?></p>

                                                        <div class="d-flex justify-content-between">

                                                            <div class="m-0 fw-bold d-flex align-items-center">

                                                                <form action="<?= URL . "?controller=producto&action=addFavorite" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
                                                                    <button type="submit" class="añadirCarrito p-0"><img src="desing/img/Iconos/corazon.png" style="height: 12px; width: 12px"></button>
                                                                </form>

                                                                <p class="align-self-start ms-1 mb-0"><?= $productos[$index]->getPrecio() . "€" ?></p>

                                                                <p class="promo align-self-start ms-2 mb-0">4,50 €</p>

                                                                <div class="descuento d-flex justify-content-center bg-descuento rounded-1 px-1 ms-1">

                                                                    <p class="mb-0">-35%</p>

                                                                </div>

                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <form action="<?= URL . "?controller=producto&action=addCart" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
                                                                    <button type="submit" class="añadirCarrito"><img src="desing/img/Iconos/shopping-cart.png" style="height: 19px; width: 19px"></button>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <a class="carousel-control-prev d-flex justify-content-start ms-4" href="#myCarouselLG" role="button" data-slide="prev">
                            <span class="carouselPrevIcon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next d-flex justify-content-end me-4" href="#myCarouselLG" role="button" data-slide="next">
                            <span class="carouselNextIcon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="caruselMD">
            <div class="row w-100 mx-0 px-3 px-sm-5 px-md-0 px-lg-0 d-flex justify-content-center">
                <div class="container mt-5">
                    <div id="myCarouselMD" class="carousel slide">
                        <div class="carousel-inner">
                            <?php $totalProductos = count($productos); ?>
                            <?php $numProductos = ceil($totalProductos / 2); ?>

                            <?php for ($i = 0; $i < $numProductos; $i++) { ?>
                                <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
                                    <div class="card-deck px-2">
                                        <?php for ($j = 0; $j < 2; $j++) { ?>
                                            <?php $index = $i * 2 + $j; ?>
                                            <?php if ($index < $totalProductos) { ?>
                                                <div class="card border-0  col-11 mt-4 col-md-5 col-lg-3 col-xl-2 px-0 py-4 mx-md-3 p-md-0 mx-lg-3 p-lg-0 mx-xl-3 p-xl-0">

                                                    <img src="desing/img/Productos/<?= $productos[$index]->getImg() ?>" class="imgProducto object-fit-scale">

                                                    <div class="infoProducto p-2 d-flex flex-column">

                                                        <p><?= $productos[$index]->getNombre() ?></p>

                                                        <div class="d-flex justify-content-between">

                                                            <div class="m-0 fw-bold d-flex align-items-center">

                                                                <form action="<?= URL . "?controller=producto&action=addFavorite" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
                                                                    <button type="submit" class="añadirCarrito p-0"><img src="desing/img/Iconos/corazon.png" style="height: 12px; width: 12px"></button>
                                                                </form>

                                                                <p class="align-self-start ms-1 mb-0"><?= $productos[$index]->getPrecio() . "€" ?></p>

                                                                <p class="promo align-self-start ms-2 mb-0">4,50 €</p>

                                                                <div class="descuento d-flex justify-content-center bg-descuento rounded-1 px-1 ms-1">

                                                                    <p class="mb-0">-35%</p>

                                                                </div>

                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <form action="<?= URL . "?controller=producto&action=addCart" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
                                                                    <button type="submit" class="añadirCarrito"><img src="desing/img/Iconos/shopping-cart.png" style="height: 19px; width: 19px"></button>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <a class="carousel-control-prev d-flex justify-content-start ms-4" href="#myCarouselMD" role="button" data-slide="prev">
                            <span class="carouselPrevIcon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next d-flex justify-content-end me-4" href="#myCarouselMD" role="button" data-slide="next">
                            <span class="carouselNextIcon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="caruselSM">
            <div class="row w-100 mx-0 px-3 px-sm-5 px-md-0 px-lg-0 d-flex justify-content-center">
                <div class="container">
                    <div id="myCarouselSM" class="carousel slide">
                        <div class="carousel-inner">
                            <?php $totalProductos = count($productos); ?>
                            <?php $numProductos = ceil($totalProductos / 1); ?>

                            <?php for ($i = 0; $i < $numProductos; $i++) { ?>
                                <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
                                    <div class="card-deck px-2 d-flex justify-content-center">
                                        <?php for ($j = 0; $j < 1; $j++) { ?>
                                            <?php $index = $i * 1 + $j; ?>
                                            <?php if ($index < $totalProductos) { ?>
                                                <div class="card border-0  col-11 mt-4 col-md-5 col-lg-3 col-xl-2 px-0 py-4 mx-md-3 p-md-0 mx-lg-3 p-lg-0 mx-xl-3 p-xl-0">

                                                    <img src="desing/img/Productos/<?= $productos[$index]->getImg() ?>" class="imgProducto object-fit-scale">

                                                    <div class="infoProducto p-2 d-flex flex-column">

                                                        <p><?= $productos[$index]->getNombre() ?></p>

                                                        <div class="d-flex justify-content-between">

                                                            <div class="m-0 fw-bold d-flex align-items-center">

                                                                <form action="<?= URL . "?controller=producto&action=addFavorite" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
                                                                    <button type="submit" class="añadirCarrito p-0"><img src="desing/img/Iconos/corazon.png" style="height: 12px; width: 12px"></button>
                                                                </form>

                                                                <p class="align-self-start ms-1 mb-0"><?= $productos[$index]->getPrecio() . "€" ?></p>

                                                                <p class="promo align-self-start ms-2 mb-0">4,50 €</p>

                                                                <div class="descuento d-flex justify-content-center bg-descuento rounded-1 px-1 ms-1">

                                                                    <p class="mb-0">-35%</p>

                                                                </div>

                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <form action="<?= URL . "?controller=producto&action=addCart" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
                                                                    <button type="submit" class="añadirCarrito"><img src="desing/img/Iconos/shopping-cart.png" style="height: 19px; width: 19px"></button>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <a class="carousel-control-prev d-flex justify-content-start ms-4" href="#myCarouselSM" role="button" data-slide="prev">
                            <span class="carouselPrevIcon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next d-flex justify-content-end me-4" href="#myCarouselSM" role="button" data-slide="next">
                            <span class="carouselNextIcon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row mx-0 px-3 px-sm-5 px-md-0 px-lg-0 d-flex justify-content-center">


            <?php foreach ($productos as $producto) { ?>

                <div class=" col-11 mt-4 col-md-5 col-lg-3 col-xl-2 px-0 py-4 mx-md-3 p-md-0 mx-lg-3 p-lg-0 mx-xl-3 p-xl-0">
                    <div class="card border-0">
                        <img src="desing/img/Productos/<?= $producto->getImg() ?>" class="imgProducto object-fit-scale">
                        <div class="infoProducto p-2 d-flex flex-column">
                            <p><?= $producto->getNombre() ?></p>
                            <div class="d-flex justify-content-between">
                                <div class="m-0 fw-bold d-flex align-items-center">
                                    <form action="<?= URL . "?controller=producto&action=addFavorite" ?>" method="post" class="m-0">
                                        <input hidden name="id" value="<?= $producto->getId() ?>">
                                        <button type="submit" class="añadirCarrito p-0"><img src="desing/img/Iconos/corazon.png" style="height: 12px; width: 12px"></button>
                                    </form>
                                    <p class="align-self-start ms-1 mb-0"><?= $producto->getPrecio() . "€" ?></p>
                                    <p class="promo align-self-start ms-2 mb-0">4,50 €</p>
                                    <div class="descuento d-flex justify-content-center bg-descuento rounded-1 px-1 ms-1">
                                        <p class="mb-0">-35%</p>
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
        </div> -->
    </section>

    <section class="row pt-5 d-flex justify-content-center d-flex flex-column justify-content-center align-items-center">
        <div class="info p-0 col-10 d-flex justify-content-center">
            <div class="imagen">
            </div>
            <div class="infoBocadillo pt-5">
                <h4>DESCUBRE NUESTROS BOCADILLOS</h4>
                <p>Encuentra tu bocadillo ideal o uno que te sorprenda</p>
                <button class="buttonDescubre">Descubre</button>
            </div>
        </div>

    </section>

    <section class="d-flex flex-column justify-content-center align-items-center">
        <h3>CATEGORIAS</h3>
        
        <div class="categorias row mx-0 px-5 px-md-0 px-lg-5 px-xl-5 d-flex justify-content-center">
            <?php foreach ($categorias as $categoria) { ?>
                <div class="categoria col-11 col-md-5 col-lg-3 col-xl-2 px-5 py-4 p-md-0 p-lg-0 p-xl-2 d-flex justify-content-center">
                    <div class="fondoCategoria d-flex justify-content-end align-items-center flex-column " style="background-image: linear-gradient(rgba(255,255,255,0.1), rgba(255,255,255,0.3)),  url(desing/img/categorias/<?= $categoria->getImg() ?>);">
                        <p><?= strtoupper($categoria->getNombre()) ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>



    <!-- <section>
        <form action="<?= URL . "?controller=producto&action=addTable" ?>" method="post">
            <button type="submit">Añadir</button>
        </form>

        <form action="<?= URL . "?controller=producto&action=compra" ?>" method="post">
            <button type="submit">Carrito <?= count($_SESSION['carrito']) ?> </button>
        </form>

        <table border=1 style='text-align: center'>
            <tr>
                <th> Producto_id </th>
                <th> Nombre </th>
                <th> Categoria </th>
                <th> Tiempo_preparacion </th>
                <th> Precio </th>
            </tr>
            <?php
            foreach ($productos as $producto) {
            ?>

                <tr>
                    <td> <?= $producto->getId() ?> </td>
                    <td> <?= $producto->getNombre() ?> </td>
                    <td> <?= $producto->getNombre_categoria() ?> </td>
                    <td> <?= $producto->getTiempo_preparacion() . " min" ?> </td>
                    <td> <?= $producto->getPrecio() . "€" ?></td>
                    <td>
                        <form action="<?= URL . "?controller=producto&action=updateTable" ?>" method="post">
                            <input hidden name="id" value="<?= $producto->getId() ?>">
                            <input hidden name="nombre" value="<?= $producto->getNombre() ?>">
                            <input hidden name="id_categoria" value="<?= $producto->getId_categoria() ?>">
                            <input hidden name="tiempo_preparacion" value="<?= $producto->getTiempo_preparacion() ?>">
                            <input hidden name="precio" value="<?= $producto->getPrecio() ?>">
                            <button type="submit">Modificar</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?= URL . "?controller=producto&action=delete" ?>" method="post">
                            <input hidden name="id" value="<?= $producto->getId() ?>">
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?= URL . "?controller=producto&action=index" ?>" method="post">
                            <input hidden name="id" value="<?= $producto->getId() ?>">
                            <button type="submit">Añadir al carrito</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </section> -->

</body>

<?php
include_once "footer.php";
?>

<script src="assets/js/bootstrap.bundle.min.js"></script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</html>