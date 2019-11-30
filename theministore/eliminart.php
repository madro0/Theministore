<?php
    include ('lib/conexion.php');
    include('lib/lista_venta.php');
	include('lib/lista_venta_ad.php');
    $objConexion = new conexion();
    $objConexion -> abrir_conexion();

    $objListaVenta = new lista_venta();
    $objListaVentaAD = new lista_venta_ad();    
   

    $objListaVentaAD -> limpiar($objConexion -> pdo);

    header('Location: ventas.php');
?>