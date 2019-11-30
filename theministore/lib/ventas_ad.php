<?php
	class ventas_ad{
	
	public function __construct(){}
	
	public function read($pdo){
		$sql ="SELECT * FROM `productos`";
		$sentencia= $pdo -> prepare($sql); 
		$sentencia -> execute(); 

		$resultado = $sentencia -> fetchall(); 
		
		$ventas=array();

		foreach($resultado as $dato){
			$objProductos = new productos();
			$objProductos -> set('cod_product',$dato['cod_product']);
			$objProductos -> set('id_bill',$dato['id_bill']);
			$objProductos -> set('name_product',$dato['name_product']);
			$objProductos -> set('amount_to_buy',$dato['amount_to_buy']);
            $objProductos -> set('total_value',$dato['total_value']);

			array_push($ventas,$objventas);

			$objventas -> __destruct();
		}
		return $ventas;
	}
        
    public function create($pdo, $objAux){
        $cod_producto = $objAux -> get('cod_product');
        $id_bill = $objAux -> get('id_bill');
        $nombre = $objAux -> get('name_product');
        $catidad = $objAux -> get('amount_product');
        $cantidadTotal = $objAux -> get('total_value');
			
        $sql="insert into ventas (cod_product, id_bill, name_product, amount_product, total_value) values(?,?,?,?,?)";
        $sentencia = $pdo -> prepare($sql);
        $sentencia -> execute (array($cod_producto, $id_bill, $nombre, $catidad, $cantidadTotal));
    }
	
	public function __destruct(){}
	}

?>