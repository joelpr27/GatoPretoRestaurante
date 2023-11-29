<html>
<form action="<?= URL . "?controller=producto&action=deleteFavorite" ?>" method="post">
    <button type="submit">Borrar Favorito</button>
</form>

<table border=1 style='text-align: center'>
    <tr>
        <th>Producto_id </th>
        <th>Nombre </th>
        <th>Precio </th>
    </tr>
    <?php
    foreach ($_SESSION['favorito'] as $pedido) {
    ?>

        <tr>
            <td> <?= $pedido->getProducto()->getId() ?> </td>
            <td> <?= $pedido->getProducto()->getNombre() ?> </td>
            <td> <?= $pedido->getProducto()->getPrecio() ?> </td>
        </tr>
    <?php } ?>
</table>


</html>