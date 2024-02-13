<h1>NUEVO USUARIO:</h1>

<?php if(isset($yaExisteUsuario)){
    ?>  
    <h3 style="color:red">Ya existe ese usuario</h3>
    <?php
}  
?>

<form action="index.php" method="post">
    <input type="hidden" name="usuario" value="<?php echo $usuario?>">
    <label for="usuarioNuevo">Usuario</label>
    <input type="text" id="usuarioNuevo" name="usuarioNuevo">
    <label for="contrasena">Contraseña</label>
    <input type="text" id="contrasena" name="contrasena">
    <button type="submit" name="crearUsuario">Crear Usuario</button>
</form>