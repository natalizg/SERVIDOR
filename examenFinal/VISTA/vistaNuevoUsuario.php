
<div class="contenedor-login">
    <div class="title">
        <h2>NUEVO USUARIO</h2>
    </div>
    <div class="interior">
        <?php 
            if(isset($usuarioNuevo)){
                if( $usuarioNuevo == "" || $contrasena ==""){
                ?>  
                <h3 style="color:red">No dejes campos vacíos</h3>
                <?php
                }
                if (existe_usuario($usuarioNuevo)){
                    ?>  
                    <h3 style="color:red">Ya existe ese usuario</h3>
                    <?php
                }
            }
        ?>
        <form class="formulario" action="index.php" method="post">
            <input type="hidden" name="usuario" value="<?php echo $usuario?>">
            <label for="usuarioNuevo">Usuario</label>
            <input type="text" id="usuarioNuevo" name="usuarioNuevo">
            <label for="contrasena">Contraseña</label>
            <input type="text" id="contrasena" name="contrasena">
            <div class="boton"><button type="submit" name="crearUsuario">Crear Usuario</button></div>
        </form>
    </div>
</div>
