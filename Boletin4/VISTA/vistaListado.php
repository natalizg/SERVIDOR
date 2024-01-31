
    <div class="container">
        <h2>Listado de Productos</h2>

        <form action="index.php" method="post">
            <label for="familia">Seleccione una familia:</label>
            <select name="familia" id="familia">
                <?php  foreach($familias as $familia): ?>
                    <option value="<?php echo $familia['COD']; ?>"> <?php echo $familia['NOMBRE']?>  </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="mostrar" value="Mostrar">
        </form>
        
        <?php 

            

        ?>
            <h3>Productos de la familia seleccionada:</h3>

        <?php
        ?>

    </div>
