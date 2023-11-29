<form action="<?=URL.'?controller=producto&action=add'?>" method="post">
    <table border=1 style= 'text-align: center'>
        <tr>
            <th> Nombre </td>
            <th> Categoria </td>
            <th> Tiempo_preparacion </td>
            <th> Precio </td>
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
                    <input name='img'>
                </td>
                <td>
                    <button type="submit">Guardar</button>
                </td>   
            </tr> 
     </table>
     
</form> 