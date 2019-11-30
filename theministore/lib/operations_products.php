<?php
    include ('conexion.php');
    include ('productos.php');
    include ('productos_ad.php');

    $objConexion = new conexion();
    $objConexion -> abrir_conexion();

    $objProductos = new productos();
    $objProductosAD = new productos_ad();    

    $objProductos -> set('cod_product',$_POST['cod_producto']);
    $objProductos -> set('name_product',$_POST['nombre']);
    $objProductos -> set('amount_product',$_POST['cantidad']);
    $objProductos -> set('unit_value',$_POST['valor_unitario']);
    $objProductos -> set('name_provider',$_POST['lista_proveedores']);

    $objProductosAD -> create($objConexion -> pdo, $objProductos);

    header('Location:../prductos.php');
?>