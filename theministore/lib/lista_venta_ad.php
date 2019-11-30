<?php
	class lista_venta_ad{
	
	public function __construct(){}
	
	public function read($pdo){
		//SELECT cod_lista_venta, name_product, cant_pro, valor_pro FROM `lista_venta`NATURAL JOIN `productos` WHERE 1
		$sql = "SELECT cod_lista_venta, name_product, cant_pro, unit_value FROM `lista_venta`NATURAL JOIN `productos` WHERE 1";
		$sentencia= $pdo -> prepare($sql); 
		$sentencia -> execute(); 

		$resultado = $sentencia -> fetchall(); 
		
		$lista_venta=array();

		foreach($resultado as $dato){
			$objLista_venta = new lista_venta();
			$objLista_venta -> set('cod_lista_venta',$dato['cod_lista_venta']);
			$objLista_venta -> set('name_product',$dato['name_product']);
			$objLista_venta -> set('cant_pro',$dato['cant_pro']);
			$objLista_venta -> set('valor_pro',$dato['unit_value']);

			array_push($lista_venta,$objLista_venta);

			$objLista_venta -> __destruct();
		}
		return $lista_venta;
	}
        
    public function create($pdo, $objAux){
       // $cod_producto = $objAux -> get('cod_lista_venta');
        $cod_product = $objAux -> get('name_product');
        $cant_pro = $objAux -> get('cant_pro');
        
			
        $sql="insert into lista_venta (cod_product, cant_pro) values(?,?)";
        $sentencia = $pdo -> prepare($sql);
        $sentencia -> execute (array( $cod_product, $cant_pro));
    }

    public function limpiar($pdo){
		//SELECT cod_lista_venta, name_product, cant_pro, valor_pro FROM `lista_venta`NATURAL JOIN `productos` WHERE 1
		$sql = "TRUNCATE TABLE lista_venta";
		$sentencia= $pdo -> prepare($sql); 
		$sentencia -> execute(); 

		
	}
	
	public function __destruct(){}
	}

?>