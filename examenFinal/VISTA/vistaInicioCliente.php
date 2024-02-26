<h1>INICIO CLIENTE</h1>

<?php
    if(isset($correo_cliente)){
    ?>
    <h3 style="color:red">Datos no válidos.</h3>    
    <?php
        

    }
?>
<form action="index.php" method="post">
    <label for="correo">Correo Electrónico</label>
    <input type="text" name="correo">
    <label for="contrasena">Contraseña</label>
    <input type="text" name="contrasena">
    <button type="submit" name="iniciar">Inicia Sesión</button>
</form>