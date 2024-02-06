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

?>