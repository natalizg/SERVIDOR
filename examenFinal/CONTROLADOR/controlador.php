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
        $correo_cliente = $_POST['correo'];
        $contrasena_cliente = $_POST['contrasena'];
        if(correo_ya_registrado($correo_cliente)){
            $data['body'] = 'VISTA/vistaRegistroCliente.php';
        }else{
            registrar_cliente($correo_cliente, $contrasena_cliente);
            $data['body'] = 'VISTA/vistaMenuCliente.php';
        }
    }

    //Inicio sesión cliente:
    if(isset($_POST['iniciarSesion'])){
        $data['body'] = 'VISTA/vistaInicioCliente.php';
    }
    if(isset($_POST['iniciar'])){
        $correo_cliente = $_POST['correo'];
        $contrasena_cliente = $_POST['contrasena'];
        if(inicio_correcto($correo_cliente, $contrasena_cliente)){
            $data['body'] = 'VISTA/vistaMenuCliente.php';
        }
    }


    require('VISTA/LAYOUT/layout.php');
    

?>