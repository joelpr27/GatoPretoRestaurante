<html>

<?php include_once "header.php"; ?>

<section>
    <div class="d-flex justify-content-between">

        <h5>Informacion del Producto:</h5>

    </div>

    <div class="row w-100 mx-0 px-3 d-flex justify-content-center">

    <form action="<?=URL.'?controller=producto&action=add'?>" method="post" class="mt-5 d-flex justify-content-center">
    <table border=1 style= 'text-align: center'>
        <tr>
            <th> Nombre </td>
            <th> Categoria </td>
            <th> Tiempo_preparacion </td>
            <th> Precio </td>
            <th> Descuento (Opcional) </td>
            <th> Imagen (nombreImg.png)</td>


        </tr>
        <?php 
            include_once "model/productosDao.php";
            
            $productoDAO = new ProductoDAO();
            $categorias = $productoDAO->getAllCategory();

        ?>
            <tr>


                <td>
                    <input name='nombre'>
                </td>
                <td>                        
                    <select name='id_categoria'>
                        <?php
                            $n = 0; 

                            foreach ($categorias as $categoria){                        
                        ?>
                        
                        <option value="<?=$categorias[$n]->getId()?>"><?=$categoria->getNombre()?></option>
                        
                        <?php   
                            $n++;
                        }
                    ?>
                    </select>
  
                </td>
                <td>
                    <input name='tiempo_preparacion'>
                </td>
                <td>
                    <input name='precio'>
                </td>
                <td>
                    <input name='descuento'>
                </td>
                <td>
                    <input name='img'>
                </td>
                <td>
                    <button type="submit">Guardar</button>
                </td>   
            </tr> 
     </table>
     
</form> 
    </div>
</section>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>