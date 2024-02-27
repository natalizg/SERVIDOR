
<div class="contenedor">
    <div class="title">
        <h2>MENÚ CLIENTE</h2>
        <h2>Bienvenido: <?php echo $correo_cliente; ?></h2>
    </div>
    <div class="interior">
        <?php
            if(isset($nuevaReservaCompletada)){
                ?>
                <h3 style="color:blue">Reserva hecha</h3>    
                <?php
            }

            if(isset($reservaEliminada)){
                ?>
                <h3 style="color:blue">Reserva eliminada</h3>    
                <?php
            }

        ?>
        <form action="index.php" method="post">
            <input type="hidden" name="correo" value="<?php echo $correo_cliente?>">
            <button type="submit" name="gestionarReserva">Ver y gestionar reservas activas</button>
            <button type="submit" name="nuevaReserva">Hacer nueva reserva</button>
            <button type="submit" name="historialReserva">Ver histórico de Reservas</button>
        </form>
    </div>
</div>
