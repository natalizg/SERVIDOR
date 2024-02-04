<div class ="container">
    <h2>Editar Producto</h2>
    <form class="editar" action="index.php" method="post">
        <input type="hidden" name="nombre_antiguo" value="<?= $caracteristicasProducto['NOMBRE_CORTO'] ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= $caracteristicasProducto['NOMBRE_CORTO'] ?>">
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"><?= $caracteristicasProducto['DESCRIPCION'] ?></textarea>
        <label for="pvp">PVP:</label>
        <input type="text" name="pvp" value="<?= $caracteristicasProducto['PVP'] ?>">
        <button type="submit" name="actualizar">Actualizar</button>
        <a href="index.php" class="cancel-link">Cancelar</a>

    </form>
</div>
