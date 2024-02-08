<h1>HISTORIAL RESERVAS CLIENTE</h1>

<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Mesa</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($reservas as $reserva): ?>
            <tr>
                <th> <?php echo $reserva['FECHA']?></th>
                <th> <?php echo $reserva['HORA']?></th>
                <th> <?php echo $reserva['MESA']?></th>
                <th> <?php echo $reserva['DESCRIPCION']?></th>
            </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>
