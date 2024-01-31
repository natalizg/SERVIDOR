<?php

//En el modelo vamos a tener las funciones que nos dan los datos necesarios para
//poder luego entregarselos a la vista

//Cogemos los datos de la BBDD;
require('config.php');
require('bbdd.php');


function getFamiliasProductos(){
    //conectamos con la bbdd:
    $conexion = crear_conexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    //ejecutamos la consulta SQL:
    $resultado = consulta_bbdd('SELECT COD, NOMBRE FROM FAMILIA', $conexion);

    //creamos una array para la capa de la vista:
    $familias = array();
    while($fila = obtener_resultados($resultado) ){
        $familias[] = $fila;
    }

    //cerramos conexión:
    cerrar_conexion($conexion);

    //Devuelve una array bidimensional:
    return $familias;
}

function getProductos(){
    $conexion = crear_conexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $resultado = consulta_bbdd("SELECT NOMBRE_CORTO, PVP FROM PRODUCTO ", $conexion);
    $productos = array();
    while($fila = obtener_resultados($resultado)){
        $productos[] = $fila;
    }
    cerrar_conexion($conexion);
}


?>