<html>

<?php include_once "header.php"; ?>

<section>
    <div class="row pt-3 ps-3 mb-3 d-flex justify-content-between">
        <div class="col-6">
            <h5>Informacion del Producto:</h5>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a href="<?= URL . "?controller=producto&action=seeProducts" ?>"><button class="me-3 buttonEstilo">Volver</button></a>
        </div>
    </div>

    <div class="row m-0 w-100 d-flex justify-content-center">
        <div class="col-8 p-0 d-flex flex-column">
            <div class="w-100 d-flex justify-content-between py-2">
                <div class="row tablaCarrito w-100 d-flex justify-content-around">
                    <div class="col-1 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Producto_id</p>
                    </div>
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Img</p>
                    </div>
                    <div class="col-2 d-flex flex-column align-items-center p-0">
                        <p class="p-0 m-0">Nombre</p>
                    </div>
                    <div class="col-2 d-flex flex-column align-items-center p-0">
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
                </div>
            </div>
            <form action="<?= URL . '?controller=producto&action=update' ?>" method="post">
                <div class="row carrito w-100 d-flex justify-content-around py-2">
                    <div class="col-1 d-flex justify-content-center align-items-center p-0">
                        <div class="d-flex">
                            <input class="inputUpdateDisabled" disabled value="<?= $producto->getId() ?>">
                            <input hidden name="id" value="<?= $producto->getId() ?>">
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                        <div class="d-flex">
                            <input class="inputUpdate" name='img' value="<?= $producto->getImg() ?>">
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center p-0 ">
                        <div class="d-flex">
                            <input class="inputUpdate" name='nombre' value="<?= $producto->getNombre() ?>">
                        </div>
                    </div>

                    <div class="col-2 d-flex justify-content-center align-items-center p-0">

                        <?php
                        include_once "model/productosDao.php";

                        $productoDAO = new ProductoDAO();
                        $categorias = $productoDAO->getAllCategory();

                        $defecto = $producto->getId_categoria();

                        $categoriaDefault = $productoDAO->getCategoryById($defecto);
                        ?>

                        <select name='id_categoria' class="inputUpdate">
                            <?php
                            $n = 0;

                            foreach ($categorias as $categoria) {
                                $selected = "";
                                if ($categorias[$n]->getId() == $categorias[$defecto - 1]->getId()) {
                                    $selected = "selected";
                                }
                            ?>

                                <option value="<?= $categorias[$n]->getId() ?>" <?= $selected ?>><?= $categoria->getNombre() ?></option>

                            <?php
                                $n++;
                            }
                            ?>
                        </select>



                    </div>

                    <div class="col-1 d-flex justify-content-center align-items-center p-0">
                        <input class="inputUpdate" name='tiempo_preparacion' value="<?= $producto->getTiempo_preparacion() ?>">
                    </div>

                    <div class="col-1 d-flex justify-content-center align-items-center p-0">
                        <input class="inputUpdate" name='precio' value="<?= $producto->getPrecio() ?>">
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-center p-0">
                        <input class="inputUpdate" name='descuento' value="<?= $producto->getDescuento() ?>">
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-center p-0">

                        <button type="submit" class="buttonEstilo p-1" style="width: fit-content; height: fit-content;">Guardar</button>

                    </div>

                </div>
            </form>
        </div>
    </div>

</section>