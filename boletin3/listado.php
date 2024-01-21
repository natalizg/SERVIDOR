<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
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

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        select {
            padding: 5px;
        }

        input[type="submit"] {
            padding: 8px 15px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h2, h3 {
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            color: #337ab7;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Listado de Productos</h2>

    <form action="listado.php" method="post">
        <label for="familia">Seleccione una familia:</label>
        <select name="familia" id="familia">
            <?php
            // Conexión a la base de datos usando PDO
            try {
                $dwes = new PDO('mysql:host=localhost;dbname=dwes', 'user_dwes', 'userUSER2');
                $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Consulta para obtener las familias
                $consultaFamilias = $dwes->query("SELECT COD, NOMBRE FROM FAMILIA");

                // Mostrar las opciones en el select
                while ($familia = $consultaFamilias->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$familia["COD"]}'>{$familia["NOMBRE"]}</option>";
                }
                //Capturamos un error en caso de que no se pueda realizar conexión con BBDD
            } catch (PDOException $e) {
                echo 'Error de conexión: ' . $e->getMessage();
                die();
            } finally {
                // Cerrar la conexión a la base de datos en caso de éxito o error
                $dwes = null;
            }
            ?>
        </select>
        <input type="submit" name="mostrar" value="Mostrar">
    </form>

    <?php
    // Procesar el formulario cuando se envía
    if (isset($_POST['mostrar'])) {
        try {
            // Obtener el código de familia seleccionado
            $codigoFamilia = $_POST['familia'];

            $dwes = new PDO('mysql:host=localhost;dbname=dwes', 'user_dwes', 'userUSER2');
            //Establece el modo de manejo de errores para la instancia de PDO. Se configura para que lance excepciones en caso de error:
            $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Consulta para obtener los productos de la familia seleccionada
            $consultaProductos = $dwes->prepare("SELECT NOMBRE_CORTO, PVP FROM PRODUCTO WHERE FAMILIA = ?");
            //$codigoFamilia se sustituye en el marcador de posición ? de la consulta preparada
            $consultaProductos->execute([$codigoFamilia]);

            // Mostrar la lista de productos
            echo "<h3>Productos de la familia seleccionada:</h3>";
            echo "<ul>";
            while ($producto = $consultaProductos->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>{$producto["NOMBRE_CORTO"]} - <b>PVP:</b> {$producto["PVP"]} <a href='editar.php?producto={$producto["NOMBRE_CORTO"]}'>Editar</a></li>";
            }
            echo "</ul>";
        } catch (PDOException $e) {
            echo 'Error de consulta: ' . $e->getMessage();
        } finally {
            // Cerrar la conexión a la base de datos en caso de éxito o error
            $dwes = null;
        }
    }
    ?>
</div>

</body>
</html>