
<div class="contenedor">
    <div class="title">
        <h2>REGISTRO CLIENTE</h2>
    </div>
    <div class="interior">
        <?php
            if(isset($correo_cliente)){
                if(correo_ya_registrado($correo_cliente)){
            ?>
            <h3 style="color:red">Correo ya registrado.</h3>    
            <?php
                }  
                if($correo_cliente == "" || $contrasena_cliente == ""){
                    ?>
                    <h3 style="color:red">No deje campos vacíos.</h3>    
                    <?php
                }      

            }
        ?>
        <form class="formulario" action="index.php" method="post">
            <label for="correo">Correo Electrónico</label>
            <input type="text" name="correo">
            <label for="contrasena">Contraseña</label>
            <input type="text" name="contrasena">
            <div class="boton">
            <button type="submit" name="registrar" value="registrar">Regístrate</button>
            </div>
            <p class="registro">¿Ya tienes cuenta?</p>
            <button type="submit" name="iniciarSesion">Iniciar sesión</button>
        </form>
    </div>
</div>
