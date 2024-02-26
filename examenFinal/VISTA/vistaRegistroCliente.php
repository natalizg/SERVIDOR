<h1>REGISTRO CLIENTE</h1>

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
<form action="index.php" method="post">
    <label for="correo">Correo Electrónico</label>
    <input type="text" name="correo">
    <label for="contrasena">Contraseña</label>
    <input type="text" name="contrasena">
    <button type="submit" name="registrar" value="registrar">Regístrate</button>
    <p>¿Ya tienes cuenta?</p>
    <input type="submit" name="iniciarSesion" value="Iniciar sesión">
</form>