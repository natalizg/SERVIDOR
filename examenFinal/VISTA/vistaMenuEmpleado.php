
<div class="contenedor">
    <div class="title">
        <h2>MENÚ EMPLEADO</h2>
        <h3>Usuario: <?php echo $usuario ?></h3>
    </div>
    <div class="interior">
        <?php
            if(isset($reservaEliminada)){
                ?>
                <h3 style="color:blue">Reserva eliminada</h3>    
                <?php
            }
        ?>
        <form action="index.php" method="post">
            <input type="hidden" name="usuario" value="<?php echo $usuario?>">
            <button type="submit" name="nuevoUsuario">Añadir nuevo usuario</button>
            <button type="submit" name="visualizarReservas">Visualizar reservas</button>
        </form>
    </div>
</div>
