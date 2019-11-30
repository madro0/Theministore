<?php
	session_start();
	if(!array_key_exists('cuenta', $_SESSION)){
		header('Location:login.php'); //EN CASO DE QUE NO EXISTA :v
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>.:PROVEEDORES::.</title>
	<link rel="stylesheet" type="text/css" href="cc/w3.css">
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
        
        $(document).on('keydown', '#lista_cod_proveedor', function(e) {
            if(e.which == 13) {
                e.stopPropagation();
                var cod_proveedor = $(this).data("cod_proveedor");
                var codigo_proveedor = $(this).text();
                document.activeElement.blur();

                actualizarProveedores(cod_proveedor, codigo_proveedor, "cod_provider");
            }
        });
        
        $(document).on('keydown', '#lista_nombre_proveedor', function(e) {
            if(e.which == 13) {
                e.stopPropagation();
                var cod_proveedor = $(this).data("nombre_proveedor");
                var nombre_proveedor = $(this).text();
                document.activeElement.blur();
                
                actualizarProveedores(cod_proveedor, nombre_proveedor, "name_provider");
            }            
        });
        
        $(document).on('keydown', '#lista_empresa', function(e) {
            if(e.which == 13) {
                e.stopPropagation();
                var cod_proveedor = $(this).data("empresa");
                var empresa = $(this).text();
                document.activeElement.blur();
                
                actualizarProveedores(cod_proveedor, empresa, "business");
            }         
        });
        
        $(document).on('keydown', '#lista_telefono', function(e) {
            if(e.which == 13) {
                e.stopPropagation();
                var cod_proveedor = $(this).data("telefono");
                var telefono = $(this).text();
                document.activeElement.blur();
                
                actualizarProveedores(cod_proveedor, telefono, "phone");
            }         
        });
        
        function actualizarProveedores(cod_proveedor, campo, columna){
            $.ajax({
                url:'jquery/proveedores_actualizar.php',
                method:'POST',
                data:{cod_proveedor: cod_proveedor, campo: campo, columna: columna},
                success: function(data){
                    alert("Actualizado exitosamente");
                }
            })
        }
	</script>

</head>
<body >
    <?php
		include ('lib/conexion.php');
		include ('lib/proveedores.php');
		include('lib/proveedores_ad.php');

		$objConexion = new conexion();
		$objConexion -> abrir_conexion();

		$objProveedoresAd= new proveedores_ad();
		$proveedores = $objProveedoresAd -> read($objConexion -> pdo);
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
	    <div class="w3-center w3-padding-16"><h2><b><span>Proveedores</span></b></h2></div>
	  </div>
	</div>

<!-- Page Content -->
	<table align="center" class ="tablitacontenedora" style="max-width:1100px;margin-top:80px;margin-bottom:80px; background-color:rgb(255,255,255,0.7); padding: 20px; ">
		<tr   >
			<td style="width: 70%; border-right: solid .2rem #A4A4A4;">
				<h2 style="color: #F39B53;"><b>Datos de proveedores</b></h2>

				<div class="w3-row-padding">
                    <form action="lib/operations_provider.php" method="post">
							<div class="w3-half" style="margin-right:1px">
								<input class="w3-input" name="cod_proveedor" type="text">

								<label>Codigo del proveedor</label>                                
							</div>


							<div class="w3-half" >
							    <input class="w3-input" name="nombre" type="text">
							    <label>Nombre</label>
							</div>

							<br><br><br><br><br>
							<div class="w3-half" style="margin-right:1px">
								<input class="w3-input " name="empresa" type="text">
								<label>Empresa</label>
							</div>
							
							<div class="w3-half">
							    <input class="w3-input " name="telefono" type="text">
							    <label>Telefono</label>
							</div>
							
							<br><br><br><br><br><br><br>
							<input type="submit" name="agregar" class="w3-btn w3-red" value="Agregar">
                    </form>


						</div>
			</td>
			<td align="center" style="width: 30%; padding:20px;">
				<div class="container">
					<div class="w3-container w3-red">
	  					<h1 class="">Lista de proveedores existentes</h1>
					</div>
					<table class="w3-table-all w3-hoverable">
						<thead>			
						<tr class="w3-light-grey" style="border-bottom: solid .2rem #424242;">
							<th>Codigo del proveedor</th>
							<th>Nombre del proveedor</th>
							<th>Empresa</th>
							<th>Telefono</th>
						</tr>
						</thead>
						<?php
							foreach($proveedores as $fila){
								echo "<tr>";
								echo "<td id='lista_cod_proveedor' data-cod_proveedor='".$fila -> get ('cod_provider')."' contenteditable>".$fila -> get ('cod_provider')."</td>";
								echo "<td id='lista_nombre_proveedor' data-nombre_proveedor='".$fila -> get ('cod_provider')."' contenteditable>".$fila -> get ('name_provider')."</td>";
								echo "<td id='lista_empresa' data-empresa='".$fila -> get ('cod_provider')."' contenteditable>".$fila -> get ('business')."</td>";
								echo "<td id='lista_telefono' data-telefono='".$fila -> get ('cod_provider')."' contenteditable>".$fila -> get ('phone')."</td>";
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