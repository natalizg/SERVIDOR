<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            text-decoration:none;
            color:white;
        }
    </style>
</head>
<body>

    <?php
        try {
            $departamentos = new PDO('mysql:host=localhost;dbname=departamentos', 'gestor_empleados', 'gestorGESTOR2');
            $departamentos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consultaVotos = $departamentos->query("SELECT COUNT(*) AS totalVotos FROM EMPLEADO WHERE VOTO != '' ");
            $votacionFinal = $consultaVotos->fetch(PDO::FETCH_ASSOC);
            if(isset($_POST['jefe'])) {
                $jefe = $_POST['jefe'];
            }

            ?>
            <div class="container">
                <?php if($votacionFinal["totalVotos"] == 0){ ?> <h3>No hay Votos</h3> <?php }else{?><h3>El nuevo jefe es: <?php echo $jefe ?></h3> <?php } ?> 
                <button><a href="principal.php"> Volver al inicio </a></button>
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
