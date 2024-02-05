<?php
    require('MODELO/modelo.php');


    
    $data = array();
    $data['title'] = "Tienda Online";
    $data['body'] = 'VISTA/vista.php';
    
    //Menú inicio que redirige dependiendo de si eres cliente o empleado:
    if(isset($_POST['opcion'])){
        $opcion = $_POST['opcion'];
        if($opcion = 'cliente'){
            $data['body'] = 'VISTA/vistaRegistroCliente.php';
        }else{
            $data['body'] = 'VISTA/vistaInicioEmpleado.php';
        }
    }
    require('VISTA/LAYOUT/layout.php');
    

?>