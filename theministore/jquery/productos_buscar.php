<?php 
	reference("../lib/productos_ad.php");
	$boton= $_POST['buscar'];
	if($boton == 'buscar')
	{
		$valor=$_POST['valor'];
		$inst = new productos_ad();
		$r=$inst ->search($valor);
		//print_r($r);
		echo json_encode($r);
	}
	
?>