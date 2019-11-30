<?php
	session_start();
	if(!array_key_exists('cuenta', $_SESSION)){
		header('Location:login.php'); //EN CASO DE QUE NO EXISTA :v
	}else{
        include('lib/usuarios.php');
        $cuenta = unserialize($_SESSION['cuenta']);
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>.::Ventas::.</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="cc\style4_ventas.css">
	<!--<link rel="stylesheet" type="text/css" href="bootstrap\css\bootstrap.css">-->

	<style>
	body,h1,h2,h3,h4,h5,h6 {font-family: "Century Gothic", sans-serif}
	.w3-bar-block .w3-bar-item {padding:20px}
	</style>


	<script>
		// Script to open and close sidebar
		function w3_open() {
		    document.getElementById("mySidebar").style.display = "block";
		}
		 
		function w3_close() {
		    document.getElementById("mySidebar").style.display = "none";
		}
	</script>

<script src="js/jquery-1.11.2.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/productos.js"></script>
</head>
<body>
	<?php
		include('lib/conexion.php');
		include('lib/productos.php');
		include('lib/productos_ad.php');
		include('lib/lista_venta.php');
		include('lib/lista_venta_ad.php');

		$objConexion = new conexion();
		$objConexion -> abrir_conexion();

		$objProductosAd= new Productos_ad();

		$productos = $objProductosAd-> read($objConexion-> pdo);

		$objListaVenta = new lista_venta();
		$objListaVentaAd = new lista_venta_ad();
		$lista_venta = $objListaVentaAd -> read($objConexion-> pdo); 
	?>

	<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
	  <a href="javascript:void(0)" onclick="w3_close()"
	  class="w3-bar-item w3-button">Cerrar Menu</a>
	  <?php
        if($cuenta -> get('name_type_user') != '2'){
      ?>
	  <a href=".\prductos.php" onclick="w3_close()" class="w3-bar-item w3-button"><img src="imagenes\iconos\productos.png"width="30" height="30"> PRODUCTOS</a>
	  <a href=".\usuarios.php" onclick="w3_close()" class="w3-bar-item w3-button"><img src="imagenes\iconos\usuario.png"width="30" height="30"> Usuarios</a>
      <?php
        }
      ?>
	  <a href=".\cerrarSesion.php" onclick="w3_close()" class="w3-bar-item w3-button"><img src="imagenes\iconos\cerrar-la-sesion.png"width="30" height="30"> CERRAR SESION</a>
	</nav>

	<!-- Top menu -->
	<div class="w3-top">
	  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
	    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
	    <div class="w3-center w3-padding-16"><h1>The <span>Mini Store</span></h1></div>
	  </div>
	</div>
	<br><br><dr>
	<!--CONTENEDOR SIGUIENTE AL STATUS BAR-->
	<div class="w3-container" >
    <div class="w3-display-container mySlides" >
    	<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px;">
	    	<div class="w3-white w3-padding-large w3-animate-bottom" > <!--movimiento apenas carga-->
			    <div class="borde" style="height:400px" >
				    <div class="w3-cell-row">	<!--aquí esta contenido lo primerito-->	
						<div class="w3-container w3-white w3-cell" style="border-right: solid .1rem #A4A4A4;" > <!--primer parte del layaut-->
							 
							 <h3 align="center"><b>Lista de productos</b></h3>
							 <form method="post" action="pruebitaCasualita.php">
						 	 <table class="w3-table-all w3-hoverable">
    							<thead>
      								<tr class="w3-light-grey">
										<th >Codigo del producto</th>
										<th>Nombre del producto</th>
										<th>Cantidad Tota</th>
										<th>Valor</th>
										<th>Seleccion</th>

									</tr>
								</thead>
								<?php
									foreach($productos as $fila){
									echo "<tr onclick ='seleccionar(this,".$fila -> get ('cod_product').")'>";
									echo "<td>".$fila -> get ('cod_product')."</td>";
									echo "<td>".$fila -> get ('name_product')."</td>";
									echo "<td>".$fila -> get ('amount_product')."</td>";
									echo "<td>".$fila -> get ('unit_value')."</td>";
									echo "<td><input id='chk'".$fila -> get ('cod_product')." type='radio' name='radio' value='".$fila -> get ('cod_product')."'></td>";
	                                echo "</tr>";
								}
						?>
									
							</table>

							<br><br>
							
						</div>

						<div class="w3-container w3-white w3-cell w3-cell"> <!--segunda parte del layaut busqueda-->
							<h3 align="center"><b>BUSCAR</b></h3>
							<div style="width: auto; height: 300px; border: 0px;"  class="w3-row-padding">
								
								<div class="w3-third">
    								<img src=".\imagenes\iconos\lupa.png"> 
  								</div>

								<div class="w3-third">
    								<input class="w3-input" placeholder="Buscar" type="text" name="buscar" id="search" style="width:200px;">
  								</div>
  									<br>
  									<br>
  									
								<div>
									<br>
									<br>
  									
  								</div>
							</div>
							
						</div>
		    		</div><!--esta-->

	    		</div> <!--fin del primer layout-->

	    		 <div class="borde" ><!--inicio del primer layaut-->
				    <div class="w3-cell-row" >	<!--aquí esta contenido lo primerito-->	
						<div class="w3-container w3-white w3-cell" style="border-right: solid .1rem #A4A4A4;"><!--barrita separad-->
							
							<div  class="w3-container w3-white w3-cell" style="width: 80%; height: 100px;"> <!--primera parte layout(interno)-->
								<h3 align="center"><b>Lista de compras</b></h3>
							 	<table class="w3-table-all w3-hoverable" style="width: 100%;height: 100%">
									<thead>
										<tr class="w3-light-grey" style="border-bottom: solid .2rem #424242;">
											<th>Codigo del producto</th>
											<th>Nombre del producto</th>
											<th>Cantidad</th>
											<th>Valor</th>
										</tr>
									</thead>
									<?php
							foreach($lista_venta as $fila){
								echo "<tr>";
								echo "<td>".$fila -> get ('cod_lista_venta')."</td>";
								echo "<td>".$fila -> get ('name_product')."</td>";
								echo "<td>".$fila -> get ('cant_pro')."</td>";
								echo "<td>".$fila -> get ('valor_pro')."</td>";
                                echo "</tr>";
							}
						?>

									
								</table>
							</div>
							<div class="w3-container w3-white w3-cell" style="width: 20%; "> <!--segunda parte layout(interno)-->
								<br><br><br><br>
								<input class="w3-input" name="cantidad" type="text" style="width:80px;">
								<label><p align="left">Cantidad</p></label>
								<!--<img src="imagenes\iconos\carrito.png"> 
								<img src="imagenes\iconos\quitar.png">--> 

								<input class="w3-btn w3-red" type="submit" name="btnenviar"  value ="AÑADIR">
								<br>
								<br>

								
								</form> <!--aqui toyyy-->

								<form method="post" action="eliminart.php">
									<input class="w3-btn w3-red" type="submit" name="btnlimpiar" value="LIMPIAR" >	
								</form>

								 <?php
									if(isset($_POST['btnenviar'])){
										
										//print_r($arregloCHK);
										//$objListaVenta -> set('cod_pro',$_POST['radio']);
										if ($_POST['cantidad']==null) {
											$_POST['cantidad']=1;
										}
									}
									
								?>
							</div>
							
						</div>
						<div class="w3-container w3-white w3-cell w3-cell"> <!--segunda parte del layaut busqueda-->
							<h3 align="center"><b>Pago</b></h3>
							

							<div class="w3-container w3-white w3-cell"  style="width:75%"> <!--segundo layout (interno)  para imagen y campos de pago-->
								<br>
								<input class="w3-input" type="text" style="width:150px;">
								<label><p align="left">Total</p></label>

								<input class="w3-input" type="text" style="width:150px;">
								<label><p align="left">Total+iva</p></label>
								<br>
								<input class="w3-input" type="text" style="width:150px;">
								<label><p align="left">Cantidad a pagar</p></label>
							</div>
							<div class="w3-container w3-white w3-cell" style="width: 35%">
								
									<img style="float: center;" src="imagenes\iconos\ventas.png"> 
								
									<br><br><br><br><br>
								  	<input type="reset" name="limpiar" class="w3-btn w3-red" value="LIMPIAR">  
								  	<input class="w3-input" type="text" style="width:150px;">
									<label><p align="left">Regreso</p></label>								
							</div><!--fin del segundo layout (interno)-->
						</div>
					</div>
				</div>
			
	    </div>
    </div>
  
?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.2.1/jquery.quicksearch.js"></script>
<script>
$(function () {

  $('#search').quicksearch('table tbody tr');								
});		
</script>
<script>
	function seleccionar (tr,value){
		$(function(){
			
			if($("#chk"+value).attr("checked") == "true"){
				console.log(value);
				$("#chk"+value).removeAttr("checked");
				$(tr).css("background-color","#FFFFFF");
			}else{
				console.log(value);
				$("#chk"+value).attr("checked","true");
				$("#chk"+value).prop("checked","true");
				$(tr).css("background-color","#BEDAE8");
			}

			if($()){

			}

		})
	}
</script>


</html>