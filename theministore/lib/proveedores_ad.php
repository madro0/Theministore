<?php
	class proveedores_ad{
	//acceso a datos
	public function __construct(){}
	
	public function read($pdo/*de la clase conexion*/){
		$sql ="select * from proveedores";
		$sentencia= $pdo -> prepare($sql); //prepara la sentencia 
		$sentencia -> execute(); //se ejecuta 

		$resultado /*aqui obtenemos todo los datos*/= $sentencia -> fetchall(); /* filtra solo los datos de la tabla*/

		//print_r($resultado);
		$proveedores=array();

		foreach($resultado as $dato){
			$objProveedores = new proveedores();
			$objProveedores -> set('cod_provider',$dato['cod_provider']);
			$objProveedores -> set('name_provider',$dato['name_provider']);
			$objProveedores -> set('business',$dato['business']);
			$objProveedores -> set('phone',$dato['phone']);

			array_push($proveedores,$objProveedores);

			$objProveedores -> __destruct();
		}
		return $proveedores;
	}
        
    public function readOnlyNames($pdo/*de la clase conexion*/){
		$sql ="select cod_provider,name_provider from proveedores";
		$sentencia= $pdo -> prepare($sql); //prepara la sentencia 
		$sentencia -> execute(); //se ejecuta 

		$resultado /*aqui obtenemos todo los datos*/= $sentencia -> fetchall(); /* filtra solo los datos de la tabla*/

		//print_r($resultado);
		$proveedores=array();

		foreach($resultado as $dato){
			$objProveedores = new proveedores();
			$objProveedores -> set('cod_provider',$dato['cod_provider']);
			$objProveedores -> set('name_provider',$dato['name_provider']);

			array_push($proveedores,$objProveedores);

			$objProveedores -> __destruct();
		}
		return $proveedores;
	}
        
    public function create($pdo, $objAux){
        $cod_proveedor = $objAux -> get('cod_provider');
        $nombre = $objAux -> get('name_provider');
        $empresa = $objAux -> get('business');
        $telefono = $objAux -> get('phone');
			
        $sql="insert into proveedores (cod_provider, name_provider, business, phone) values(?,?,?,?)";
        $sentencia = $pdo -> prepare($sql);
        $sentencia -> execute (array($cod_proveedor, $nombre, $empresa, $telefono));
    }
	
	public function __destruct(){}
	}

?>