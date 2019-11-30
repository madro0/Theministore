<?php
    include ('conexion.php');
    include ('proveedores.php');
    include('proveedores_ad.php');

    $objConexion = new conexion();
    $objConexion -> abrir_conexion();

    $objProveedores = new proveedores();
    $objProveedoresAD = new proveedores_ad();    

    $objProveedores -> set('cod_provider',$_POST['cod_proveedor']);
    $objProveedores -> set('name_provider',$_POST['nombre']);
    $objProveedores -> set('business',$_POST['empresa']);
    $objProveedores -> set('phone',$_POST['telefono']);

    $objProveedoresAD -> create($objConexion -> pdo, $objProveedores);

    header('Location:../proveedores.php');
?>