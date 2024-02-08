<H1>INICIO EMPLEADO</H1>

<?php
    if(isset($usuario) && isset($contrasena)){
        if(!inicio_correcto_empleado($usuario, $contrasena)){
    ?>
    <h3 style="color:red">Datos mal introducidos.</h3>    
    <?php
        }    
    }
?>
<form action="index.php" method="post">
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario">
    <label for="contrasena">Contraseña:</label>
    <input type="text" name="contrasena">
    <button type="submit" name="iniciarEmpleado">Inicia Sesión</button>
</form>