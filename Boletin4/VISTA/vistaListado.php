
    <div class="container">
        <h2>Listado de Productos</h2>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="familia">Seleccione una familia:</label>
            <select name="familia" id="familia">
                <?php  foreach($familias as $familia): ?>
                    <option value="<?php echo $familia['COD']; ?>"> <?php echo $familia['NOMBRE']?>  </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="mostrar" value="Mostrar">Mostrar</button>
        </form>
        
        <?php 
            if(isset($productos)){
                ?>
                <h3>Productos de la familia seleccionada:</h3>
                <ul>
                    <?php  foreach($productos as $producto): ?>
                        <li> <?php echo $producto['NOMBRE_CORTO']?> - <b>PVP:</b> <?php echo $producto['PVP']?> <a href='index.php?producto=<?php echo $producto['NOMBRE_CORTO'] ?>'>Editar</a></li> 
                    <?php endforeach; ?>
                </ul>    
            <?php    
            }
        ?>

    </div>
