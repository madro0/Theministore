<?php
	class usuarios_ad{
	//acceso a datos
	public function __construct(){}
	
	public function read($pdo/*de la clase conexion*/){
		$sql ="select cedula,name_lastname,phone,name_type_user from usuarios inner join tipo_usuarios on type_user=cod_type_user";
		$sentencia= $pdo -> prepare($sql); //prepara la sentencia 
		$sentencia -> execute(); //se ejecuta 

		$resultado /*aqui obtenemos todo los datos*/= $sentencia -> fetchall(); /* filtra solo los datos de la tabla*/

		//print_r($resultado);
		$usuarios=array();

		foreach($resultado as $dato){
			$objUsuarios = new usuarios();
			$objUsuarios -> set('cedula',$dato['cedula']);
			$objUsuarios -> set('name_lastname',$dato['name_lastname']);
			$objUsuarios -> set('phone',$dato['phone']);
			$objUsuarios -> set('name_type_user',$dato['name_type_user']);

			array_push($usuarios,$objUsuarios);

			$objUsuarios -> __destruct();
		}
		return $usuarios;
	}
	
	public function search($pdo/*de la clase conexion*/){
		$sql ="select cedula,name_lastname,phone,name_type_user from usuarios inner join tipo_usuarios on type_user=cod_type_user";
		$sentencia= $pdo -> prepare($sql); //prepara la sentencia 
		$sentencia -> execute(); //se ejecuta 

		$resultado /*aqui obtenemos todo los datos*/= $sentencia -> fetchall(); /* filtra solo los datos de la tabla*/

		//print_r($resultado);
		$usuarios=array();

		foreach($resultado as $dato){
			$objUsuarios = new usuarios();
			$objUsuarios -> set('cedula',$dato['cedula']);
			$objUsuarios -> set('name_lastname',$dato['name_lastname']);
			$objUsuarios -> set('phone',$dato['phone']);
			$objUsuarios -> set('name_type_user',$dato['name_type_user']);

			array_push($usuarios,$objUsuarios);

			$objUsuarios -> __destruct();
		}
		return $usuarios;
	}
        
    public function create($pdo, $objAux){
        $cedula = $objAux -> get('cedula');
        $nombres = $objAux -> get('name_lastname');
        $contrasena = $objAux -> get('pass');
        $telefono = $objAux -> get('phone');
        $tipousuario = $objAux -> get('name_type_user');
			
        $sql="insert into usuarios (cedula, name_lastname, pass, phone, type_user) values(?,?,?,?,?)";
        $sentencia = $pdo -> prepare($sql);
        $sentencia -> execute (array($cedula, $nombres, $contrasena, $telefono, $tipousuario));
    }
	
	public function __destruct(){}
	}

?>