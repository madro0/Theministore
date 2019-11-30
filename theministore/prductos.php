<?php
	session_start();
	if(!array_key_exists('cuenta', $_SESSION)){
		header('Location:login.php'); //EN CASO DE QUE NO EXISTA :v
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>.:Lista de productos::.</title>
	<link rel="stylesheet" type="text/css" href="cc/w3.css">
	<link rel="stylesheet" type="text/css" href="cc\style3_productos.css">
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
        
        $(document).on('keydown', '#lista_cod_producto', function(e) {
            if(e.which == 13) {
                e.stopPropagation();
                var cod_producto = $(this).data("cod_producto");
                var codigo_producto = $(this).text();
                document.activeElement.blur();

                actualizarProductos(cod_producto, codigo_producto, "cod_product");
            }
        });
        
        $(document).on('keydown', '#lista_nombre_producto', function(e) {
            if(e.which == 13) {
                e.stopPropagation();
                var cod_producto = $(this).data("nombre_producto");
                var nombre_producto = $(this).text();
                document.activeElement.blur();
                
                actualizarProductos(cod_producto, nombre_producto, "name_product");
            }            
        });
        
        $(document).on('keydown', '#lista_cantidad_producto', function(e) {
            if(e.which == 13) {
                e.stopPropagation();
                var cod_producto = $(this).data("cantidad_producto");
                var cantidad_producto = $(this).text();
                document.activeElement.blur();
                
                actualizarProductos(cod_producto, cantidad_producto, "amount_product");
            }         
        });
        
        $(document).on('keydown', '#lista_valor_unitario', function(e) {
            if(e.which == 13) {
                e.stopPropagation();
                var cod_producto = $(this).data("valor_unitario");
                var valor_unitario = $(this).text();
                document.activeElement.blur();
                
                actualizarProductos(cod_producto, valor_unitario, "unit_value");
            }            
        });
        
        $(document).on('change', '#lista_proveedores', function() {
            var cod_producto = $(this).data("cod_proveedor");
            var cod_proveedor = $(this).val();
            
            actualizarProductos(cod_producto, cod_proveedor, "cod_provider");
        });
        
        function actualizarProductos(cod_producto, campo, columna){
            $.ajax({
                url:'jquery/productos_actualizar.php',
                method:'POST',
                data:{cod_producto: cod_producto, campo: campo, columna: columna},
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
        include ('lib/productos.php');
		include('lib/productos_ad.php');
		include ('lib/proveedores.php');
		include('lib/proveedores_ad.php');

		$objConexion = new conexion();
		$objConexion -> abrir_conexion();

        $objProductosAd= new productos_ad();
		$productos = $objProductosAd -> read($objConexion -> pdo);
    
		$objProveedoresAd= new proveedores_ad();
		$proveedores = $objProveedoresAd -> readOnlyNames($objConexion -> pdo);
	?>
	<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
		<a href="javascript:void(0)" onclick="w3_close()"
		class="w3-bar-item w3-button">Cerrar Menu</a>
		<a href=".\ventas.php" onclick="w3_close()" class="w3-bar-item w3-button"><img src="imagenes\iconos\ventas.png"width="30" height="30"> VENTAS</a>
		<a href=".\proveedores.php" onclick="w3_close()" class="w3-bar-item w3-button"><img src="imagenes\iconos\agragar_proveedor.png"width="30" height="30"> PROVEEDORES</a>
		<a href=".\cerrarSesion.php" onclick="w3_close()" class="w3-bar-item w3-button"><img src="imagenes\iconos\cerrar-la-sesion.png"width="30" height="30"> CERRAR SESION</a>
	</nav>
	<br><br><br>
	<div class="w3-top">
	  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
	    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
	    <div class="w3-center w3-padding-16"><h2><b>Lista de <span>Productos</span></b></h2></div>
	  </div>
	</div>

<!-- Page Content -->
	<table align="center" class ="tablitacontenedora" style="max-width:1100px;margin-top:80px;margin-bottom:80px; background-color:rgb(255,255,255,0.7); padding: 20px; ">
		<tr   >
			<td style="width: 70%; border-right: solid .2rem #A4A4A4;">
				<h2 style="color: #F39B53;"><b>Datos de productos</b></h2>

				<div class="w3-row-padding">
                    <form action="lib/operations_products.php" method="post">
							<div class="w3-half">
								<input class="w3-input " name="cod_producto" type="text">

								<label>Codigo</label>

							</div>
							
							<div class="w3-half">
							    <input class="w3-input " name="nombre" type="text">
							    <label>Nombre</label>
							</div>
							<br><br><br><br><br>
							<div class="w3-half">
								<input class="w3-input " name="cantidad" type="text">
								<label>Cantidad</label>
							</div>
							
							<div class="w3-half">
							    <input class="w3-input " name="valor_unitario" type="text">
							    <label>Valor unitario</label>
							</div>
							<br><br><br><br><br>
							<div class="w3-half">
                                <select class="w3-select " name="lista_proveedores">
                                    <option value="" disabled selected>Proveedores</option>
                                    <?php
                                        foreach($proveedores as $fila){
                                            echo "<option value=".$fila -> get ('cod_provider').">".$fila -> get ('name_provider')."</option>";
                                        }
                                    ?>
                                </select>
							</div>
							 <div>	
							&nbsp; <a href=".\proveedores.php" name="agregar_proveedor" class="w3-btn w3-light-grey" style=" border-style: solid;  border-width: 1px; border-color: #A4A4A4" >+ Provedor</a>
							</div>
							<br><br><br><br>
							<input type="submit" name="agregar_produc" class="w3-btn w3-red" value="ACEPTAR">
                    </form>


						</div>
			</td>
			<td align="center" style="width: 30%; padding:20px;">
				<div class="container">
					<div class="w3-container w3-red">
	  					<h1 class="">Lista de productos existentes</h1>
					</div>
					<table class="w3-table-all w3-hoverable focus">
						<thead>		
						<tr class="w3-light-grey" style="border-bottom: solid .2rem #424242;">
							<th>Codigo del producto</th>
							<th>Nombre del producto</th>
							<th>Cantidad Total</th>
							<th>Valor unitario</th>
							<th>Proveedor</th>							
						</tr>
						</thead>
						<?php
							foreach($productos as $fila){
								echo "<tr>";
								echo "<td id='lista_cod_producto' data-cod_producto='".$fila -> get ('cod_product')."' contenteditable>".$fila -> get ('cod_product')."</td>";
								echo "<td id='lista_nombre_producto' data-nombre_producto='".$fila -> get ('cod_product')."' contenteditable>".$fila -> get ('name_product')."</td>";
								echo "<td id='lista_cantidad_producto' data-cantidad_producto='".$fila -> get ('cod_product')."' contenteditable>".$fila -> get ('amount_product')."</td>";
								echo "<td id='lista_valor_unitario' data-valor_unitario='".$fila -> get ('cod_product')."' contenteditable>".$fila -> get ('unit_value')."</td>";
                                echo "<td>";
                                ?>
                                    <select id='lista_proveedores' data-cod_proveedor='<?php echo $fila -> get ('cod_product'); ?>' class='w3-select' name='editar_lista_proveedores'>
                                        <option value="" disabled>Proveedores</option>
                                        <?php    
                                        foreach($proveedores as $row){
                                            if($fila -> get ('name_provider') == $row -> get('name_provider')){
                                                echo "<option value=".$row -> get ('cod_provider')." selected>".$row -> get ('name_provider')."</option>";
                                            }else{
                                                echo "<option value=".$row -> get ('cod_provider').">".$row -> get ('name_provider')."</option>";
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