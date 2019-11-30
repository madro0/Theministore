<?php
	session_start();

    include ('lib/conexion.php');
    include ('lib/usuarios.php');

    $objConexion = new conexion();
    $objConexion -> abrir_conexion();

    //if(array_key_exists('', array))
    $sql = "SELECT * FROM usuarios WHERE cedula='".$_POST['nombredeusu']."'";
    $sentencia = $objConexion -> pdo -> prepare($sql); //prepara la sentencia 
    $sentencia -> execute(); //se ejecuta

    $resultado /*aqui obtenemos todo los datos*/= $sentencia -> fetchall(); /* filtra solo los datos de la tabla*/
    
    $usuario = new usuarios();
    $usuario -> set('cedula',$resultado[0]['cedula']);
    $usuario -> set('name_lastname',$resultado[0]['name_lastname']);
    $usuario -> set('phone',$resultado[0]['phone']);
    $usuario -> set('pass',$resultado[0]['pass']);
    $usuario -> set('name_type_user',$resultado[0]['type_user']);

    //obtenemos los datos resultado de la consulta
    if($usuario -> get ('pass') == $_POST['contra']){
        $_SESSION['cuenta'] = serialize($usuario); 
        header('Location:ventas.php'); //redireccionamiento si es correcto
    }else{
        header('Location:login.php'); // si nell entonces otra vez al login 
    }

    $usuario -> __destruct();

	/*if($_POST['nombredeusu']=="admin" && $_POST['contra'] == "admin"){
		$_SESSION['nombre']="daniel madroñero";
		header('Location:ventas.php'); //redireccionamiento si es correcto
	}else{
		header('Location:login.php'); // si nell entonces otra vez al login 
	}*/
?>
