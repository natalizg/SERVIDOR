<?php

    //Son funciones que sirven para aclarar el código, para hacer cualquier cosa relacionada con la base
    //de datos se llamará a este script php y se usarán sus métodos.

    function crear_conexion($servidor, $usuario, $contrasena, $base_datos){
        return new mysqli($servidor, $usuario, $contrasena, $base_datos);
    }

    function cerrar_conexion($conexion){
        $conexion->close();
    }

    function consulta_bbdd($consulta, $conexion){
        return $conexion->query($consulta);
    }

    function obtener_resultados($resultado){
        return $resultado->fetch_assoc();
    }
    
?>

