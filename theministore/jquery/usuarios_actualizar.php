<?php
    include("../lib/conexion.php");
    $objConexion = new conexion();
    $objConexion -> abrir_conexion();

    $cedula = $_POST['cedula'];
    $campo = $_POST['campo'];
    $columna = $_POST['columna'];

    $sql="update usuarios set ".$columna."=? where cedula=?";
    $sentencia = $objConexion -> pdo -> prepare($sql);
    $sentencia -> execute (array($campo, $cedula));
?>