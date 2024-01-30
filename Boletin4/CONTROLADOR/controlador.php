<?php

    //Este se encarga de conectar el modelo con la vista, creo
    require_once('MODELO/modelo.php');

    //obtenemos los nombres de las familias:
    $nombresFamilia = getFamiliasProductos(); 

    // Incluir la lógica de la vista
    $data = array();
    $data['title'] = "Tienda Online";
    $data['body'] = 'VISTA/vistaListado.php';
    require('VISTA/LAYOUT/layout.php');
    

?>