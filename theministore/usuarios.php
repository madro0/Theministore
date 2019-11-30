<?php
	session_start();
	if(!array_key_exists('cuenta', $_SESSION)){
		header('Location:login.php'); //EN CASO DE QUE NO EXISTA :v
	}
?>
<html>
<head>
	<title>.::Usuarios::.</title>
	<link rel="stylesheet" type="text/css" href="cc\w3.css">
	<link rel="stylesheet" type="text/css" href="cc\style5_proveedores.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--PARA QUE SE MIRE BIEN EN CELU-->
	<meta charset="utf-8">

	<style>
	body,h1,h2,h3,h4,h5,h6 {font-family: "Century Gothic", sans-serif}
	.w3-bar-block .w3-bar-item {padding:20px}
	</style>
    <script src="js/jquery-3.3.1.js"></script>
	<script>
		function w3_open() {
		    document.getElementById("mySidebar").style.display = "block";
		}
		function w3_close() {
		    document.getElementById("mySidebar").style.display = "none";
		}
		function cambiar(){
				
            var respuesta= confirm("Para crear un nuevo usuario es necesario cerrar la sesion actual ¿estas seguro de hacerlo? ")
				
            if(respuesta == true){
				var elementito=document.getElementById('crearusu').href="./crear_cuenta.php";
				elementito.innerHTML="ñerito ñerito ñeritoooo"
            }
        }
        
        $(document).on('keydown', '#lista_cedula', function(e) {
            if(e.which == 13) {
                e.stopPropagation();
                var cedula = $(this).data("cedula");
                var num_cedula = $(this).text();
                document.activeElement.blur();

                actualizarUsuarios(cedula, num_cedula, "cedula");
            }
        });
        
        $(document).on('keydown', '#lista_nombres', function(e) {
            if(e.which == 13) {
                e.stopPropagation();
                var cedula = $(this).data("nombres");
                var nombres = $(this).text();
                document.activeElement.blur();
                
                actualizarUsuarios(cedula, nombres, "name_lastname");
            }            
        });
        
        $(document).on('keydown', '#lista_telefono', function(e) {
            if(e.which == 13) {
                e.stopPropagation();
                var cedula = $(this).data("telefono");
                var telefono = $(this).text();
                document.activeElement.blur();
                
                actualizarUsuarios(cedula, telefono, "phone");
            }         
        });
        
        $(document).on('change', '#lista_tipos_usuarios', function() {
            var cedula = $(this).data("cod_tipo_usuario");
            var tipo_usuario = $(this).val();
            
            actualizarUsuarios(cedula, tipo_usuario, "type_user");
        });
        
        function actualizarUsuarios(cedula, campo, columna){
            $.ajax({
                url:'jquery/usuarios_actualizar.php',
                method:'POST',
                data:{cedula: cedula, campo: campo, columna: columna},
                success: function(data){
                    alert("Actualizado exitosamente");
                }
            })
        }
	</script>

</head>
<body>
	<?php
		include ('lib/conexion.php');
		include ('lib/usuarios.php');
		include('lib/usuarios_ad.php');
        include ('lib/tipo_usuarios.php');
		include('lib/tipo_usuarios_ad.php');

		$objConexion = new conexion();
		$objConexion -> abrir_conexion();

		$objUsuariosAd= new usuarios_ad();
		//$objUsuariosAd -> read($objConexion -> pdo);

		//if(array_key_exists('', array))
		$usuarios = $objUsuariosAd -> read($objConexion -> pdo);
    
        $objTiposUsuariosAd = new tipo_usuarios_ad();
		$tiposusuarios = $objTiposUsuariosAd -> read($objConexion -> pdo);
	?>
	<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
		<a href="javascript:void(0)" onclick="w3_close()"
		class="w3-bar-item w3-button">Cerrar Menu</a>
		<a href=".\ventas.php" onclick="w3_close()" class="w3-bar-item w3-button"><img src="imagenes\iconos\ventas.png"width="30" height="30"> VENTAS</a>
		<a href=".\prductos.php" onclick="w3_close()" class="w3-bar-item w3-button"><img src="imagenes\iconos\productos.png"width="30" height="30"> PRODUCTOS</a>
		<a href=".\cerrarSesion.php" onclick="w3_close()" class="w3-bar-item w3-button"><img src="imagenes\iconos\cerrar-la-sesion.png"width="30" height="30"> CERRAR SESION</a>
	</nav>
	<br><br><br>
	<div class="w3-top">
	  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
	    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
	    <div class="w3-center w3-padding-16"><h2><b>Lista <span>de Usuarios</span></b></h2></div>
	  </div>
	</div>

<!-- Page Content -->
	<table align="center" class ="tablitacontenedora" style="max-width:1100px;margin-top:80px;margin-bottom:80px; background-color:rgb(255,255,255,0.7); padding: 20px; ">
		<tr   >
			<td style="width: 70%; border-right: solid .2rem #A4A4A4;">
				<h2 style="color: #F39B53;"><b>Datos de Usuarios</b></h2>

				<div class="w3-row-padding">
							<div class="w3-half">
								<input class="w3-input " type="text">
								<label>Cedula</label>

							</div>
					
							<div class="w3-half">
							    <input class="w3-input " type="text">
							    <label>Nombre</label>
							</div>
							<br><br><br><br><br>
							<div class="w3-half">
								<input class="w3-input " type="text">
								<label>Telefono</label>
							</div>


							
							
							
							<br><br><br><br>
							<input type="reset" name="limpiar" class="w3-btn w3-red" value="ACEPTAR">

							<a  id="crearusu"  onclick="cambiar()"  class="w3-btn w3-red"><img src="imagenes\iconos\provedor.png"width="20" height="20"> <b>AGREGAR USUARIO</b></a>





				</div>
			</td>
			<td align="center" style="width: 30%; padding:20px;">
				<div class="container">
					<div class="w3-container w3-red">
	  					<h1 class="">Lista de Usuarios</h1>
					</div>
					<table class="w3-table-all w3-hoverable">
						<thead>
							<tr class="w3-light-grey" style="border-bottom: solid .2rem #424242;">
								<th>Cedula</th>
								<th>Nombre de usuario</th>
								<th>Telefono</th>
								<th>Tipo de Usuario</th>
							</tr>
						</thead>
						<?php
							foreach($usuarios as $fila){
								echo "<tr>";
								echo "<td id='lista_cedula' data-cedula='".$fila -> get ('cedula')."' contenteditable>".$fila -> get ('cedula')."</td>";
								echo "<td id='lista_nombres' data-nombres='".$fila -> get ('cedula')."' contenteditable>".$fila -> get ('name_lastname')."</td>";
								echo "<td id='lista_telefono' data-telefono='".$fila -> get ('cedula')."' contenteditable>".$fila -> get ('phone')."</td>";
                                echo "<td>";
                                ?>
                                    <select id='lista_tipos_usuarios' data-cod_tipo_usuario='<?php echo $fila -> get ('cedula'); ?>' class='w3-select' name='editar_tipo_usuario'>
                                        <option value="" disabled>Tipos de usuario</option>
                                        <?php    
                                        foreach($tiposusuarios as $row){
                                            if($fila -> get ('name_type_user') == $row -> get('name_type_user')){
                                                echo "<option value=".$row -> get ('cod_type_user')." selected>".$row -> get ('name_type_user')."</option>";
                                            }else{
                                                echo "<option value=".$row -> get ('cod_type_user').">".$row -> get ('name_type_user')."</option>";
                                            }                                            
                                        }
                                        ?>    
                                    </select>
                                <?php
                                echo "</td>";
                                echo "</tr>";
							}
						?>
					</table>
				</div>
			</td>
		</tr>
	</table>
</body>
</html>