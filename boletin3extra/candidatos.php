<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamento Ventas</title>
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
    </style>
</head>
<body>
    <?php
        try {
            $departamentos = new PDO('mysql:host=localhost;dbname=departamentos', 'gestor_empleados', 'gestorGESTOR2');
            $departamentos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["empleado_votado"]) && isset($_POST["empleado_votador"])) {
                $empleadoVotador = $_POST["empleado_votador"];
                $empleadoVotado = $_POST["empleado_votado"];
                echo $empleadoVotador;
                echo $empleadoVotado;
                $updateVoto = $departamentos->query("UPDATE EMPLEADO SET VOTO = '$empleadoVotado' WHERE DNI = '$empleadoVotador'");
                header('Location: resultados.php');
            }

            $consultaEmpleados = $departamentos->query("SELECT NOMBRE, APELLIDOS, DNI FROM EMPLEADO WHERE ES_CANDIDATO = TRUE");
            ?>
            <div class="container">
                <h3>Elija al candidato:</h3>
                <form action="" method="post">
                    <input type="hidden" name="empleado_votador" value="<?php echo $_POST["empleado_votador"]; ?>">
                    <table>
                        <?php while ($empleado = $consultaEmpleados->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $empleado["NOMBRE"]?> <?php echo $empleado["APELLIDOS"]?></td>
                                <td><button type="submit" name="empleado_votado" value="<?php echo $empleado['DNI'];?>">Votar</button></td>
                            </tr>
                        <?php } ?>
                    </table>
                </form>
            </div>
    <?php
        } catch(PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            die();
        } finally {
            $departamentos = null;
        }
    ?>
</body>
</html>