<h1>MENÚ CLIENTE</h1>

<h2>Bienvenido: <?php echo $correo_cliente; ?></h2>

<form action="index.php" method="post">
    <button type="submit" name="gestionarReserva">Ver y gestionar reservas activas</button>
    <button type="submit" name="nuevaReserva">Hacer nueva reserva</button>
    <button type="submit" name="historialReserva">Ver histórico de Reservas</button>
</form>