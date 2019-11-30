<?php
    include("../lib/conexion.php");
    $objConexion = new conexion();
    $objConexion -> abrir_conexion();

    $cod_producto = $_POST['cod_producto'];
    $campo = $_POST['campo'];
    $columna = $_POST['columna'];

    $sql="update productos set ".$columna."=? where cod_product=?";
    $sentencia = $objConexion -> pdo -> prepare($sql);
    $sentencia -> execute (array($campo, $cod_producto));
?>