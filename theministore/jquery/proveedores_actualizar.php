<?php
    include("../lib/conexion.php");
    $objConexion = new conexion();
    $objConexion -> abrir_conexion();

    $cod_proveedor = $_POST['cod_proveedor'];
    $campo = $_POST['campo'];
    $columna = $_POST['columna'];

    /*if($columna == 'cod_provider'){
        $sql="update productos set ".$columna."=? where cod_provider=?";
        $sentencia = $objConexion -> pdo -> prepare($sql);
        $sentencia -> execute (array($campo, $cod_proveedor));
    }*/
    $sql="update proveedores set ".$columna."=? where cod_provider=?";
    $sentencia = $objConexion -> pdo -> prepare($sql);
    $sentencia -> execute (array($campo, $cod_proveedor));
?>