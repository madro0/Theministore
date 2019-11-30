<?php
	class productos_ad{
	//acceso a datos
	public function __construct(){}
	
	public function read($pdo/*de la clase conexion*/){
		$sql ="select cod_product,name_product,amount_product,unit_value,name_provider from productos natural join proveedores";
		$sentencia= $pdo -> prepare($sql); //prepara la sentencia 
		$sentencia -> execute(); //se ejecuta 

		$resultado /*aqui obtenemos todo los datos*/= $sentencia -> fetchall(); /* filtra solo los datos de la tabla*/

		//print_r($resultado);
		$productos=array();

		foreach($resultado as $dato){
			$objProductos = new productos();
			$objProductos -> set('cod_product',$dato['cod_product']);
			$objProductos -> set('name_product',$dato['name_product']);
			$objProductos -> set('amount_product',$dato['amount_product']);
			$objProductos -> set('unit_value',$dato['unit_value']);
            $objProductos -> set('name_provider',$dato['name_provider']);

			array_push($productos,$objProductos);

			$objProductos -> __destruct();
		}
		return $productos;
	}

	public function search($pdo, $busqueda){
		$productos = array();
		$like = "%{$busqueda}%";

		$sql ="select cod_product,name_product,amount_product,unit_value,name_provider from productos natural join proveedores where cod_product like ? or name_product like ?";
		$sentencia= $pdo -> prepare($sql); //prepara la sentencia 
		$sentencia -> execute(array($like,$like));
		$resultado = $sentencia -> fetchAll();

		foreach($resultado as $dato){
			$objProductos = new productos();
			$objProductos -> set('cod_product',$dato['cod_product']);
			$objProductos -> set('name_product',$dato['name_product']);
			$objProductos -> set('amount_product',$dato['amount_product']);
			$objProductos -> set('unit_value',$dato['unit_value']);
            $objProductos -> set('name_provider',$dato['name_provider']);

			array_push($productos,$objProductos);

			$objProductos -> __destruct();
		}
		return $productos;
	}
        
    public function create($pdo, $objAux){
        $cod_producto = $objAux -> get('cod_product');
        $nombre = $objAux -> get('name_product');
        $cantidad = $objAux -> get('amount_product');
        $valor_unitario = $objAux -> get('unit_value');
        $cod_proveedor = $objAux -> get('name_provider');
			
        $sql="insert into productos (cod_product, name_product, amount_product, unit_value, cod_provider) values(?,?,?,?,?)";
        $sentencia = $pdo -> prepare($sql);
        $sentencia -> execute (array($cod_producto, $nombre, $cantidad, $valor_unitario, $cod_proveedor));
    }
	
	public function __destruct(){}
	}

?>