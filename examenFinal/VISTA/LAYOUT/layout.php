<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $data['title']; ?> </title>
    <link rel="icon" type="image/jpg" href="ASSETS/logo.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
    </style>
    <link rel="stylesheet" href="VISTA/LAYOUT/layout.css">
</head>
<body>
    <div class="contenedor-principal">
    <header>
        <nav class="menu">
            <div class="izq">
                <a href=""><img src="ASSETS/logo.png" width="70px" alt=""></a>
                <a href=""><h1>SUSHI</h1></a>
            </div>
            <ul>
                <li><a href="">Inicio</a></li>
                <li><a href="">Reservas</a></li>
                <li><a href="">Menú</a></li>
                <li><a href="">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
            <?php include $data['body']; ?>
    </main>
    <footer>
        <h3>FOOTER</h3>
    </footer>
    </div>
</body>
</html>