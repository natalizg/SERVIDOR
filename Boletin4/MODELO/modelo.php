<?php

//En el modelo vamos a tener las funciones que nos dan los datos necesarios para
//poder luego entregarselos a la vista

//Cogemos los datos de la BBDD;
require_once('config.php');
require_once('bbdd.php');


function getFamiliasProductos(){
    //conectamos con la bbdd:
    $conexion = crear_conexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    //ejecutamos la consulta SQL:
    $resultado = consulta_bbdd('SELECT NOMBRE FROM FAMILIA', $conexion);

    //creamos una array para la capa de la vista:
    $nombresFamilia = array();
    while($fila = obtener_resultados($resultado) ){
        $nombresFamilia[] = $fila;
    }

    //cerramos conexión:
    cerrar_conexion($conexion);

    return $nombresFamilia;
}

?>