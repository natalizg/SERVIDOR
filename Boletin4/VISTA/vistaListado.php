
    <div class="container">
        <h2>Listado de Productos</h2>

        <form action="vistaListado.php" method="post">
            <label for="familia">Seleccione una familia:</label>
            <select name="familia" id="familia">
                <?php  foreach($nombresFamilia as $familia): ?>
                    <option value="<?php echo $familia['NOMBRE']; ?>"> <?php echo $familia['NOMBRE']?>  </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="mostrar" value="Mostrar">
        </form>
    </div>
