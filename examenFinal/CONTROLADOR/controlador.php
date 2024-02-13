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
        }else{
            $data['body'] = 'VISTA/vistaInicioCliente.php';
            //controlar aquí los errores de inicio de sesión.
        }
    }

    // Opciones del menú del cliente:

    // GESTIONAR Y VER RESERVAS
    if(isset($_POST['gestionarReserva'])){
        $correo_cliente = $_POST['correo'];
        $reservas = reservas_activas($correo_cliente);


        $data['body'] = 'VISTA/vistaReservasCliente.php';
    }

    if(isset($_POST['eliminarReservaSeleccionada'])) {
        $correo_cliente = $_POST['correo'];
        // Obtener el valor del botón "Cancelar"
        $valorBoton = $_POST['eliminarReservaSeleccionada'];
        // Separar los valores de fecha, hora y mesa
        list($fecha, $hora, $mesa) = explode('_', $valorBoton);
        eliminar_reserva($fecha,$hora,$mesa);
        $reservaEliminada = true;
        $data['body'] = 'VISTA/vistaMenuCliente.php';
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



    // VER HISTORIAL DE RESERVAS:
    if(isset($_POST['historialReserva'])){
        $correo_cliente = $_POST['correo'];
        $reservas = reservas_antiguas($correo_cliente);

        $data['body'] = 'VISTA/vistaHistorialReservasCliente.php';
    }





    ////////////// OPCIONES USUARIO ///////////////

    //Inicio Sesión empleado:
    if(isset($_POST['iniciarEmpleado'])){
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        if(inicio_correcto_empleado($usuario, $contrasena)){
            $data['body'] = 'VISTA/VistaMenuEmpleado.php';
        }else{
            $data['body'] = 'VISTA/vistaInicioEmpleado.php';
        }
    }

    //Añadir nuevo usuario:
    if(isset($_POST['nuevoUsuario'])){
        $usuario = $_POST['usuario'];
        $data['body'] = 'VISTA/VistaNuevoUsuario.php';
    }

    if(isset($_POST['crearUsuario'])){
        $usuario = $_POST['usuario'];
        $usuarioNuevo = $_POST['usuarioNuevo'];
        $contrasena = $_POST['contrasena'];
        if(!existe_usuario($usuarioNuevo)){
            crear_usuario($usuarioNuevo, $contrasena);
            $data['body'] = 'VISTA/vistaMenuEmpleado.php';
        }else{
            $yaExisteUsuario = true;
            $data['body'] = 'VISTA/VistaNuevoUsuario.php';
        }
        

    }

    //Visualizar y eliminar reservas:

    if(isset($_POST['visualizarReservas'])){
        $reservas = todas_reservas_activas();
        $data['body'] = 'VISTA/VistaReservasEmpleado.php';
    }
    if(isset($_POST['filtrarReservas'])){
        $fecha = $_POST['fecha'];
        $reservas = resrvas_filtradas($fecha);
        $data['body'] = 'VISTA/VistaReservasEmpleado.php';
    }

    if(isset($_POST['eliminarReservaEmpleado'])){
        $reservas_serializadas = $_POST['reservas'];
        $reservas = unserialize($reservas_serializadas);
        $valorBoton = $_POST['eliminarReservaEmpleado'];
        list($fecha, $hora, $mesa) = explode('_', $valorBoton);
        eliminar_reserva($fecha,$hora,$mesa);

        //Cargamos la lista actualizada de reservas:
        $reservas_actualizadas = todas_reservas_activas();
        //se la pasamos a la vista:
        $data['reservas'] = $reservas_actualizadas;
        $reservaEliminada = true;
        $data['body'] = 'VISTA/VistaReservasEmpleado.php';
    }


    require('VISTA/LAYOUT/layout.php');
    

?>