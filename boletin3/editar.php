<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .edit-form {
            margin-top: 20px;
            text-align: left;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        textarea {
            min-height: 150px; /* Establece una altura mínima */
            max-height: 500px; /* Establece una altura máxima para evitar un crecimiento excesivo */
            height: auto; /* Hace que la altura se ajuste automáticamente */
            resize: none;
        }

        button {
            padding: 8px 15px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        
        .cancel-link {
            display: inline-block;
            margin-top: 10px;
            color: #337ab7;
            text-decoration: none;
        }

        .cancel-link:hover {
            text-decoration: underline;
        }
        
        .error-msg {
            color: #ff0000;
            margin-top: 10px;
        }
        .form a{
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Editar Producto</h2>

    <?php
    if (isset($_GET['producto'])) {
        try {
            // Obtener el nombre corto del producto
            $nombreCorto = $_GET['producto'];

            // Consulta para obtener los datos del producto
            $dwes = new PDO('mysql:host=localhost;dbname=dwes', 'user_dwes', 'userUSER2');
            $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $consultaProducto = $dwes->prepare("SELECT NOMBRE_CORTO, NOMBRE, DESCRIPCION, PVP FROM PRODUCTO WHERE NOMBRE_CORTO = ?");
            $consultaProducto->execute([$nombreCorto]);

            // Mostrar el formulario para editar el producto
            if ($producto = $consultaProducto->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <form action="actualizar.php" method="post">
                    <input type="hidden" name="nombre_corto" value="<?= $producto['NOMBRE_CORTO'] ?>">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?= $producto['NOMBRE_CORTO'] ?>">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion"><?= $producto['DESCRIPCION'] ?></textarea>
                    <label for="pvp">PVP:</label>
                    <input type="text" name="pvp" value="<?= $producto['PVP'] ?>">
                    <button type="submit" name="actualizar">Actualizar</button>
                    <a href="listado.php" class="cancel-link">Cancelar</a>
                </form>
                <?php
            } else {
                echo "Producto no encontrado.";
            }
        } catch (PDOException $e) {
            echo 'Error de consulta: ' . $e->getMessage();
        } finally {
            // Cerrar la conexión a la base de datos en caso de éxito o error
            $dwes = null;
        }
    } else {
        echo "Parámetro 'producto' no proporcionado.";
    }
    ?>
</div>

</body>
</html>