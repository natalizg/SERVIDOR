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

    
    ///////////// OPCIONES CLIENTE //////////////////

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


    //Inicio sesión cliente:
    if(isset($_POST['inicioSesion'])){
        $data['body'] = 'VISTA/vistaInicioCliente.php';
    }

    // Opciones del menú del cliente:

    // GESTIONAR Y VER RESERVAS
    if(isset($_POST['gestionarReserva'])){
        $correo_cliente = $_POST['correo'];
        $reservas = reservas_activas($correo_cliente);


        $data['body'] = 'VISTA/vistaReservasCliente.php';
    }


    // CREAR UNA NUEVA RESERVA:
    if(isset($_POST['nuevaReserva'])){
        $correo_cliente = $_POST['correo'];
        $data['body'] = 'VISTA/vistaNuevaReserva.php';
    }

    if(isset($_POST['reservar'])){
        $correo_cliente = $_POST['correo'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $descripcion = $_POST['descripcion'];
        $mesa = $_POST['mesa'];
        echo $correo_cliente;
        if(existe_reserva($fecha, $hora, $mesa)){
            $data['body'] = 'VISTA/vistaNuevaReserva.php';
        }else{
            nueva_reserva($fecha, $hora, $mesa, $descripcion, $correo_cliente);
            $nuevaReservaCompletada = true;
            $data['body'] = 'VISTA/vistaMenuCliente.php';

        }
    }



    // VER HISTORIAL DE RESERVAS
    if(isset($_POST['historialReserva'])){
        $data['body'] = 'VISTA/vistaHistorialReservasCliente.php';
    }






    ////////////// OPCIONES USUARIO ///////////////



    require('VISTA/LAYOUT/layout.php');
    

?>