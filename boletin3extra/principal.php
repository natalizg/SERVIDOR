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

        label {
            font-weight: bold;
        }

        select {
            padding: 5px;
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
    <div class="container">
    <h2>Votaciones Departamento</h2>
        <form action="principal.php" method="post">
            <label for="opcion">Elija una opción:</label>
            <select for="opcion" id="opcion" name="opcion">
                <option value="votar">Votar</option>
                <option value="resultados">Resultados</option>
            </select>
            <button>Ver</button>
        </form>
    </div>

    <?php
        if (isset($_POST["opcion"])){
           $opcion =  $_POST['opcion'];
           header('Location: ' . ($opcion === "votar" ? 'votar.php' : 'resultados.php'));
        }
    ?>
</body>
</html>