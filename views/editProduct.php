<form action="<?=URL.'?controller=producto&action=update'?>" method="post">
    <table border=1 style= 'text-align: center'>
        <tr>
            <th> Producto_id </td>
            <th> Nombre </td>
            <th> Categoria </td>
            <th> Tiempo_preparacion </td>
            <th> Precio </td>
            <th> Imagen </td>
            <th> Descuento </td>


        </tr>
        <?php 
            include_once "model/productosDao.php";
            
            $productoDAO = new ProductoDAO();
            $categorias = $productoDAO->getAllCategory();

            $defecto = $producto->getId_categoria();

            $categoriaDefault = $productoDAO->getCategoryById($defecto);

        ?>
            <tr>

                <td>    
                    <input disabled value="<?=$producto->getId()?>">
                    <input hidden name="id" value="<?=$producto->getId()?>">
                </td>
                <td>
                    <input name='nombre' value="<?=$producto->getNombre()?>">
                </td>
                <td>                        
                    <select name='id_categoria'>
                        <?php
                            $n = 0; 

                            foreach ($categorias as $categoria){ 
                                $selected = "";
                                if($categorias[$n]->getId() == $categorias[$defecto - 1]->getId()) {
                                    $selected = "selected";
                                }                          
                        ?>
                        
                        <option value="<?=$categorias[$n]->getId()?>" <?=$selected?>><?=$categoria->getNombre()?></option>
                        
                        <?php
                            $n++;
                        }
                    ?>
                    </select>
  
                </td>
                <td>
                    <input name='tiempo_preparacion' value="<?=$producto->getTiempo_preparacion()?>">
                </td>
                <td>
                    <input name='precio' value="<?=$producto->getPrecio()?>">
                </td>
                <td>
                    <input name='img' value="<?=$producto->getImg()?>">
                </td>
                <td>
                    <input name='descuento' value="<?=$producto->getDescuento()?>">
                </td>
                <td>
                    <button type="submit">Guardar</button>
                </td>   
            </tr> 
     </table>
     
</form> 