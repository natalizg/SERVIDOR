<?php

    //Este se encarga de conectar el modelo con la vista, creo
    require('MODELO/modelo.php');

    //obtenemos los nombres de las familias:
    $familias = getFamiliasProductos(); 
    
    
    if (isset($_POST['mostrar'])){
        $codFamilia = $_POST['familia'];
        $productos = getProductos($codFamilia);
    }

    if(isset($_GET['producto'])){
        $producto = $_GET['producto'];
        $caracteristicasProducto = getCaracteristicasProductos($producto);
    }

    if(isset($_POST['actualizar'])){
        $nombreAntiguo = $_POST['nombre_antiguo'];
        $nombreCorto = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $pvp = $_POST['pvp'];
        actualizarProducto($nombreCorto, $descripcion, $pvp, $nombreAntiguo);
    }
    


    // Incluir la lógica de la vista
    $data = array();
    $data['title'] = "Tienda Online";
    $data['body'] = 'VISTA/vistaListado.php';
    if(isset(($_GET['producto']))){
        $data['body'] = 'VISTA/vistaEditar.php';
    }
    require('VISTA/LAYOUT/layout.php');
    

?>