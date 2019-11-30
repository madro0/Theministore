
<!DOCTYPE html>
<html>
<head>
	<title>.:Crear Usuario::.</title>
	<link rel="stylesheet" type="text/css" href="cc\style2_crearUsu.css">
	<link rel="stylesheet" type="text/css" href="cc\w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--iconitos-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--PARA QUE SE MIRE BIEN EN CELU-->
	

	<script>
		function w3_open() {
		    document.getElementById("mySidebar").style.display = "block";
		}
		function w3_close() {
		    document.getElementById("mySidebar").style.display = "none";
		}
		function okay(){
			alert("Registrado correctamente.");
		}
		function pregunta(){
			
				var miUsuario = document.getElementById("usu").value;
				var miContraseña= document.getElementById("contr").value;
				if(miUsuario.length == 0 || miContraseña.length == 0 ){
						var respuesta= alert("Complete todos los campos")
						var elementito=document.getElementById('entrar').href="./login.php";
				}else var elementito=document.getElementById('entrar').href="./ventas.php";
			}
	</script>

</head>
<body>
	<!--Slaider-->

	<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
		<a href="javascript:void(0)" onclick="w3_close()"
		class="w3-bar-item w3-button">Cerrar Menu</a>
		<a href=".\login.php" onclick="w3_close()" class="w3-bar-item w3-button"><img src="imagenes\iconos\usuario.png" width="30" height="30"> LOGIN</a>
		
	</nav>

	<div class="w3-top">
	  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
	    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
	    <div class="w3-center w3-padding-16"><h2><b>Crear <span>Usuario</span></b></h2></div>
	  </div>
	</div>

		<br><br>
		<div class="container">
			<div >

				<!--<h2 >Formulario <span>Registro</span></h2>-->
				<img src="imagenes\iconos\crearUsuario.png" width="120" height="120">
			</div>	
<!--formuli-->
			<form class="form_campos  w3-text-red" action="create_account.php" method="post">
				<input type="hidden" name="crear_cuenta" value="myForm"> <!-- Identificador de formulario -->
                
				<div class="w3-row w3-section">
  					<div 
  						class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i> <!--esta linia es para los iconitos-->
  					</div>
   					<div class="w3-rest">
    						<input class="w3-input"  type="text" name="nombre" type="text" placeholder="Nombre completo" Nombre"required autofocus>
   					</div>
				</div>

				<div class="w3-row w3-section">
  					<div 
  						class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-address-card"></i> <!--esta linia es para los iconitos-->
  					</div>
   					<div class="w3-rest">
    						<input class="w3-input" type="text" name="cedula" type="text" placeholder="Cedula" required>
   					</div>
				</div>


				<div class="w3-row w3-section">
  					<div 
  						class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone-square"></i> <!--esta linia es para los iconitos-->
  					</div>
   					<div class="w3-rest">
    						<input class="w3-input" type="text" name="telefono" type="text" placeholder="Telefono" required>
   					</div>
				</div>

				<div class="w3-row w3-section">
  					<div 
  						class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-key"></i> <!--esta linia es para los iconitos-->
  					</div>
   					<div class="w3-rest">
    						<input class="w3-input" type="password" name="contrasena" type="text" placeholder="Contraseña" required>
   					</div>
				</div>
					<center>
						<div clss="contenedor2">
							<input type="submit" name="restrar" class="w3-btn w3-red" value="REGISTRAR" onclick="okay()">   
							<input type="reset" name="limpiar" class="w3-btn w3-red" value="LIMPIAR">   
						</div>
					</center>
						

				
			</form>
			
		</div>
		
</body>
</html>