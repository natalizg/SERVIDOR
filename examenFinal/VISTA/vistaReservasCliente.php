
<?php
    if(isset($reservaEliminada)){
    ?>
        <h3 style="color:blue">Reserva eliminada</h3>    
    <?php   
    }

?>

<div class="contenedor">
    <div class="title">
        <h2>RESERVAS CLIENTE</h2>
    </div>
    <div class="interior">
        <form action="index.php" method="post">
            <input type="hidden" name="correo" value="<?php echo $correo_cliente?>">
            <table>
                <thead>
                    <tr>
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
                            <th> <?php echo $reserva['FECHA']?></th>
                            <th> <?php echo $reserva['HORA']?></th>
                            <th> <?php echo $reserva['MESA']?></th>
                            <th> <?php echo $reserva['DESCRIPCION']?></th>
                            <th><button type="submit" name="eliminarReservaSeleccionada" value="<?php echo $reserva['FECHA'] . '_' . $reserva['HORA'] . '_' . $reserva['MESA']; ?>">Cancelar</button></th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                
            </table>

        </form>
    </div>
</div>
