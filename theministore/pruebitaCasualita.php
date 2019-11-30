<?php
    include ('lib/conexion.php');
    include('lib/lista_venta.php');
	include('lib/lista_venta_ad.php');
    $objConexion = new conexion();
    $objConexion -> abrir_conexion();

    $objListaVenta = new lista_venta();
    $objListaVentaAD = new lista_venta_ad();    

    $objListaVenta -> set('name_product',$_POST['radio']);
    $objListaVenta -> set('cant_pro',$_POST['cantidad']);
   

    $objListaVentaAD -> create($objConexion -> pdo, $objListaVenta);

    header('Location: ventas.php');
?>