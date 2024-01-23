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

        button {
            margin-top: 10px;
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
        
        a{
            text-decoration: none;
            color:white;
        }
        button:disabled {
            background: grey;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <?php
        try {
            $jefe = 0;
            $nombreJefe = "";
            $departamentos = new PDO('mysql:host=localhost;dbname=departamentos', 'gestor_empleados', 'gestorGESTOR2');
            $departamentos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //Cogemos todos los empleados candidatos:
            $consultaEmpleados = $departamentos->query("SELECT NOMBRE, APELLIDOS, DNI FROM EMPLEADO WHERE ES_CANDIDATO = TRUE");
            
            //La siguiente consulta sirve para habilitar o no el botón de finalizar votación.
            $votacionFinal = $departamentos->query("SELECT COUNT(*) AS totalVotos FROM EMPLEADO WHERE VOTO != '' ");
            $votacionFinal = $votacionFinal->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="container">
                <h3>Resultados:</h3>
                    <table>
                        <?php while ($empleado = $consultaEmpleados->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $empleado["NOMBRE"]?> <?php echo $empleado["APELLIDOS"]?></td>
                                <td><?php
                                    //contamos los votos de cada empleado:
                                    $empleadoDNI = $empleado["DNI"];
                                    $consultaVotos = $departamentos->query("SELECT COUNT(*) AS totalVotos FROM EMPLEADO WHERE VOTO='$empleadoDNI'");
                                    $resultado = $consultaVotos->fetch(PDO::FETCH_ASSOC);
                                    echo $resultado["totalVotos"];

                                    //me guardo el empleado con más votos:
                                    if ($resultado["totalVotos"]> $jefe){
                                        $jefe = $resultado["totalVotos"];
                                        $nombreJefe = $empleado["NOMBRE"] . " " . $empleado["APELLIDOS"] ;
                                    }
                                    if ($resultado["totalVotos"] == $jefe){
                                        $posibleJefe = $empleado["NOMBRE"] . " " . $empleado["APELLIDOS"];
                                        if(strcmp($posibleJefe,$nombreJefe)<0){
                                            $nombreJefe = $posibleJefe;
                                        }
                                    }

                                    ?>
                                </td>
                            </tr>
                        <?php }?>
                    </table>
                <button><a href="principal.php">Volver al inicio</a></button>
                <form action="cerrar_votacion.php" method="post">
                    <!-- Paso el jefe por input hidden -->
                    <input type="hidden" name="jefe" value="<?php echo $nombreJefe ?>">
                    <button <?php if($votacionFinal["totalVotos"] == 0) { echo "disabled"; } ?>>Cerrar votacion</button>

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