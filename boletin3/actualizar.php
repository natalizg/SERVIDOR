<?php
if (isset($_POST['actualizar'])) {
    try {
        // Obtener los datos del formulario
        $nombreCorto = $_POST['nombre_corto'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $pvp = $_POST['pvp'];

        // Consulta para actualizar los datos del producto
        $dwes = new PDO('mysql:host=localhost;dbname=dwes', 'user_dwes', 'userUSER2');
        $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consultaActualizar = $dwes->prepare("UPDATE PRODUCTO SET NOMBRE_CORTO = ?, DESCRIPCION = ?, PVP = ? WHERE NOMBRE_CORTO = ?");
        $consultaActualizar->execute([$nombre, $descripcion, $pvp, $nombreCorto]);

        header('Location: listado.php');
    } catch (PDOException $e) {
        echo 'Error al actualizar el producto: ' . $e->getMessage();
    } finally {
        // Cerrar la conexión a la base de datos en caso de éxito o error
        $dwes = null;
    }
} else {
    echo "Acceso no permitido.";
}
?>