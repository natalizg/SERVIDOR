<?php

    //Este se encarga de conectar el modelo con la vista, creo
    require('MODELO/modelo.php');

    //obtenemos los nombres de las familias:
    $familias = getFamiliasProductos(); 
    
    
    if (isset($_POST['mostrar'])){
        $codFamilia = $_POST['familia'];
        $productos = getProductos($codFamilia);
    }
    


    // Incluir la lógica de la vista
    $data = array();
    $data['title'] = "Tienda Online";
    $data['body'] = 'VISTA/vistaListado.php';
    require('VISTA/LAYOUT/layout.php');
    

?>