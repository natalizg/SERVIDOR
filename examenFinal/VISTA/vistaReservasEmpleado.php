

<div class="contenedor">
    <div class="title">
        <h2>RESERVAS CLIENTES</h2>
    </div>
    <div class="interior">
        <?php
            if(isset($reservaEliminada)){
                ?>
                    <h3 style="color:blue">Reserva Eliminada</h3>
                <?php
            }
        ?>

        <form class="filtro" action="index.php" method="post">
            <label for="fecha">Seleccionar Fecha:</label>
            <input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">
            <button type="submit" name="filtrarReservas">Filtrar</button>
        </form>

        <form action="index.php" method="post">

            <table>
                <thead>
                    <tr>
                        <th>Correo</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Mesa</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($reservas as $reserva): ?>
                        <tr>
                            <th><?php echo $reserva['CORREO_CLIENTE']?></th>
                            <th> <?php echo $reserva['FECHA']?></th>
                            <th> <?php echo $reserva['HORA']?></th>
                            <th> <?php echo $reserva['MESA']?></th>
                            <th> <?php echo $reserva['DESCRIPCION']?></th>
                            <th><button type="submit" name="eliminarReservaEmpleado" value="<?php echo $reserva['FECHA'] . '_' . $reserva['HORA'] . '_' . $reserva['MESA']; ?>">Cancelar</button></th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                
            </table>

        </form>
    </div>
</div>
