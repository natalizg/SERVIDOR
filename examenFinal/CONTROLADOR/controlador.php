<?php
    require('MODELO/modelo.php');


    
    $data = array();
    $data['title'] = "Tienda Online";
    $data['body'] = 'VISTA/vista.php';
    
    //Menú inicio que redirige dependiendo de si eres cliente o empleado:
    if(isset($_POST['opcion'])){
        $opcion = $_POST['opcion'];
        if($opcion == 'cliente'){
            $data['body'] = 'VISTA/vistaRegistroCliente.php';
        }else{
            $data['body'] = 'VISTA/vistaInicioEmpleado.php';
        }
    }

    //Registro Cliente:
    if(isset($_POST['registrar'])){
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $conexion = crear_conexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $conexion->query();

    }

    //Inicio sesión cliente:
    
    if(isset($_POST['inicioSesion'])){
        $data['body'] = 'VISTA/vistaInicioCliente.php'
    }


    require('VISTA/LAYOUT/layout.php');
    

?>