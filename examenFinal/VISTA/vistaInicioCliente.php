
<div class="contenedor-login">
    <div class="title">
        <h2>INICIO CLIENTE</h2>
    </div>
    <div class="interior">
        <?php
            if(isset($correo_cliente)){
            ?>
            <h3 style="color:red">Datos no válidos.</h3>    
            <?php
                

            }
        ?>
        <form class="formulario" action="index.php" method="post">
            <label for="correo">Correo Electrónico</label>
            <input type="text" name="correo">
            <label for="contrasena">Contraseña</label>
            <input type="text" name="contrasena">
            <div class="boton"><button type="submit" name="iniciar">Inicia Sesión</button></div>
        </form>
    </div>
</div>
