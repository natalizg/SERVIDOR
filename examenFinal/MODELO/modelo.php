<?php
    require('config.php');
    require('bbdd.php');

function correo_ya_registrado($correo){
    $estaRegistrado = false;
    $conexion = crear_conexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $resultado = consulta_bbdd("SELECT CORREO_CLIENTE FROM CLIENTE WHERE CORREO_CLIENTE = '$correo'", $conexion);
    $correoQuery = obtener_resultados($resultado);

    //si el correo ya está en la bbdd devolvemos true:
    if ($correoQuery !== null && isset($correoQuery['CORREO_CLIENTE'])) {
        if($correo == $correoQuery['CORREO_CLIENTE']){
            $estaRegistrado = true;
        }
    }
    cerrar_conexion($conexion);
    return $estaRegistrado;
}

function registrar_cliente($correo, $contrasena){
    $conexion = crear_conexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $conexion->query("INSERT INTO CLIENTE (CORREO_CLIENTE, CONTRASENA) VALUES ('$correo','$contrasena')");
    cerrar_conexion($conexion);
}

function inicio_correcto($correo, $contrasena){
    $inicioCorrecto = false;
    $conexion = crear_conexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    //obtenemos el correo de bbdd:
    $resultado = consulta_bbdd("SELECT CORREO_CLIENTE FROM CLIENTE WHERE CORREO_CLIENTE = '$correo'", $conexion);
    $correoQuery = obtener_resultados($resultado);

    //obtenemos la contraseña de bbdd:
    $resultado = consulta_bbdd("SELECT CONTRASENA FROM CLIENTE WHERE CORREO_CLIENTE = '$correo'", $conexion);
    $contrasenaQuery = obtener_resultados($resultado);

    //Si el correo y contraseña están en la bbdd y corresponde devolvemos true:
    if ($correoQuery !== null && isset($correoQuery['CORREO_CLIENTE']) && $contrasenaQuery !==null && isset($contrasenaQuery['CONTRASENA'])) {
        if($correo == $correoQuery['CORREO_CLIENTE'] && $contrasena == $contrasenaQuery['CONTRASENA']){
            $inicioCorrecto=true;
        }

    }

    cerrar_conexion($conexion);
    return $inicioCorrecto;

}

function existe_reserva($fecha, $hora, $mesa){
    $laReservaExiste = true; 
    $conexion = crear_conexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $resultado = consulta_bbdd("SELECT FECHA, HORA, MESA FROM RESERVA WHERE FECHA = '$fecha' AND HORA = '$hora' AND MESA = '$mesa' ", $conexion);
    $reservaQuery = obtener_resultados($resultado);
    if($reservaQuery == null){
        $laReservaExiste = false;
    }
    cerrar_conexion($conexion);
    return $laReservaExiste;
}


function nueva_reserva($fecha, $hora, $mesa, $descripcion, $correoCliente){
    $conexion = crear_conexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $conexion->query("INSERT INTO RESERVA (FECHA, HORA, MESA, DESCRIPCION, CORREO_CLIENTE) VALUES ('$fecha','$hora', '$mesa', '$descripcion', '$correoCliente')");
    cerrar_conexion($conexion);
}

function reservas_activas($correoCliente){
    $conexion = crear_conexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $resultado = consulta_bbdd("SELECT FECHA, HORA, MESA, DESCRIPCION FROM RESERVA WHERE CORREO_CLIENTE = '$correoCliente' AND FECHA >= CURDATE() ", $conexion);
    $reservas = array();
    while($fila = obtener_resultados($resultado)){
        $reservas[] = $fila;
    }
    cerrar_conexion($conexion);
    return $reservas;

}

function eliminar_reserva($fecha, $hora, $mesa){
    $conexion = crear_conexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $conexion->query("DELETE FROM RESERVA WHERE FECHA = '$fecha' AND HORA = '$hora' AND MESA = $mesa");
}

function reservas_antiguas($correoCliente){
    $conexion = crear_conexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $resultado = consulta_bbdd("SELECT FECHA, HORA, MESA, DESCRIPCION FROM RESERVA WHERE CORREO_CLIENTE = '$correoCliente' AND FECHA < CURDATE() ", $conexion);
    $reservas = array();
    while($fila = obtener_resultados($resultado)){
        $reservas[] = $fila;
    }
    cerrar_conexion($conexion);
    return $reservas;
}


function inicio_correcto_empleado($usuario, $contrasena){
    $inicioCorrecto = false;
    $conexion = crear_conexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $resultado = consulta_bbdd("SELECT USUARIO_EMPLEADO FROM EMPLEADO WHERE USUARIO_EMPLEADO = '$usuario'", $conexion);
    $usuarioQuery = obtener_resultados($resultado);

    $resultado = consulta_bbdd("SELECT CONTRASENA FROM EMPLEADO WHERE USUARIO_EMPLEADO = '$usuario'", $conexion);
    $contrasenaQuery = obtener_resultados($resultado);

    //Si el correo y contraseña están en la bbdd y corresponde devolvemos true:
    if ($usuarioQuery !== null && isset($usuarioQuery['USUARIO_EMPLEADO']) && $contrasenaQuery !==null && isset($contrasenaQuery['CONTRASENA'])) {
        if($usuario == $usuarioQuery['USUARIO_EMPLEADO'] && $contrasena == $contrasenaQuery['CONTRASENA']){
            $inicioCorrecto=true;
        }

    }

    cerrar_conexion($conexion);
    return $inicioCorrecto;
}
?>