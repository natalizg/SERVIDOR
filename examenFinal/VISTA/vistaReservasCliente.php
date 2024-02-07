<h1>RESERVAS CLIENTE</h1>

<?php
print_r($reservas);
?>

<form action="index.php" method="post">

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
                    <th><button type="submit" name="eliminarReservaSeleccionada" value="<?php ?>">Cancelar</button></th>
                </tr>
            <?php endforeach; ?>
        </tbody>
        
    </table>

</form>