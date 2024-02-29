

<div class="contenedor-login">
    <div class="title">
        <h2>INICIO EMPLEADO</h2>
    </div>
    <div class="interior">
        <?php
            if(isset($usuario) && isset($contrasena)){
                if(!inicio_correcto_empleado($usuario, $contrasena)){
            ?>
            <h3 style="color:red">Datos mal introducidos.</h3>    
            <?php
                }    
            }
        ?>
        <form class="formulario" action="index.php" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario">
            <label for="contrasena">Contraseña:</label>
            <input type="text" name="contrasena">
            <div class="boton"><button type="submit" name="iniciarEmpleado">Inicia Sesión</button></div>
        </form>
    </div>
</div>
