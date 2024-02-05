<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $data['title']; ?> </title>
    <link rel="stylesheet" href="VISTA/LAYOUT/layout.css">
</head>
<body>
    <header>
        <h1>SUSHI</h1>
        <nav class = "menu">
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
    </footer>
</body>
</html>