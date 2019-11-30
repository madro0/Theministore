<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>The MiniStore</title>
	<link rel="stylesheet" type="text/css" href="cc/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="cc/w3.css">
	<meta charset="utf-8"> <!--para solucionar problemas de latinismos-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--PARA QUE SE MIRE BIEN EN CELU-->

	<script type="text/javascript">
		function validarnombre() {
	        //obteniendo el valor que se puso en el campo text del formulario
	        
	        var miCampoTexto = document.getElementById("usu").value;
	        //la condición
	        if (miCampoTexto.length == 0 ) {
	        	alert("Escriba el nombre de usuario.");
	         	return false;
	        }   
    	}
    	function pregunta(){
				
			
				var miUsuario = document.getElementById("usu").value;
				var miContraseña= document.getElementById("contr").value;
				if(miUsuario.length == 0 || miContraseña.length == 0 ){
						var respuesta= alert("Complete el usuario y la contraseña")
						var elementito=document.getElementById('entrar').href="./login.php";
				}else var elementito=document.getElementById('entrar').href="./ventas.php";
			}

    </script>

</head>
<body>
	<div class="container">
		<img src="imagenes\iconos\usuario.png" width="120" height="120">
		
		<form action="iniciar_sesion.php" method="post" onsubmit="return validar()" name="fIniciarSesion">
			<!--"mipagina.php"-->
			<font face="Century Gothic">
				<div class="form-input">
					<center><input class="w3-input" id="usu" type="text" name="nombredeusu" placeholder="Ingrese la cedula del usuario"></center>
				</div>
				<div>
					<center><input class="w3-input" id="contr" type="password" name="contra" placeholder="Ingrese la contraseña"></center>
				</div>
				<br><br>
				

				<input class="w3-btn w3-red" type="submit" name="Iniciar sesion" id="entrar"  onclick="pregunta()"   onclick="validarnombre()" >
				<br><br>

				<a class= "abisponblanco" href=".\crear_cuenta.php" onclick="validarcontra">Crear cuenta</a>
			</font>
		</form>
		
	</div>

</body>
</html>