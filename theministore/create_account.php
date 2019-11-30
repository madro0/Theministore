<?php
    include ('lib/conexion.php');
    include ('lib/usuarios.php');
    include('lib/usuarios_ad.php');

    $objConexion = new conexion();
    $objConexion -> abrir_conexion();

    $objUsuarios = new usuarios();
    $objUsuariosAD = new usuarios_ad();    

    $objUsuarios -> set('cedula',$_POST['cedula']);
    $objUsuarios -> set('name_lastname',$_POST['nombre']);
    $objUsuarios -> set('pass',$_POST['contrasena']);
    $objUsuarios -> set('phone',$_POST['telefono']);
    $objUsuarios -> set('name_type_user', 2);

    $objUsuariosAD -> create($objConexion -> pdo, $objUsuarios);

    header('Location:login.php');
?>