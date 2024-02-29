
<div class="contenedor-login">
    <div class="title">
        <h2>NUEVA RESERVA</h2>
    </div>
    <div class="interior">
        <?php
            if(isset($fecha,$hora, $mesa)){
                if(existe_reserva($fecha, $hora, $mesa, $correo_cliente)){
                    ?>
                    <h3 style="color:red">Reserva no disponible</h3>    
                    <?php
                }
            }
        ?>
        <form class="formulario" action="index.php" method="post">
            <input type="hidden" name="correo" value="<?php echo $correo_cliente?>">
            <label for="fecha" name="fecha">Fecha:</label>
            <input type="date" name="fecha" value="<?php echo date('Y-m-d'); ?>">
            <label for="hora" name="hora">Hora:</label>
            <select name="hora" id="hora">
                <option value="20:30">20:30</option>
                <option value="21:00">21:00</option>
                <option value="21:30">21:30</option>
                <option value="22:00">22:00</option>
                <option value="22:30">22:30</option>
                <option value="23:00">23:00</option>
            </select>
            <label for="mesa" name="mesa">Mesa:</label>
            <select name="mesa" id="mesa">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <label for="descripcion" name="descripcion">Descripción (opcional):</label>
            <input type="text" name="descripcion">
            <div class="boton"><button type="submit" name="reservar">Reservar</button> </div>
        </form>
    </div>
</div>
