<?php
	class tipo_usuarios_ad{
	//acceso a datos
	public function __construct(){}
	
	public function read($pdo/*de la clase conexion*/){
		$sql ="select * from tipo_usuarios";
		$sentencia= $pdo -> prepare($sql); //prepara la sentencia 
		$sentencia -> execute(); //se ejecuta 

		$resultado /*aqui obtenemos todo los datos*/= $sentencia -> fetchall(); /* filtra solo los datos de la tabla*/

		//print_r($resultado);
		$tiposusuarios=array();

		foreach($resultado as $dato){
            if($dato['cod_type_user'] != '3'){
                $objTiposUsuarios = new tipo_usuarios();
                $objTiposUsuarios -> set('cod_type_user',$dato['cod_type_user']);
                $objTiposUsuarios -> set('name_type_user',$dato['name_type_user']);         

                array_push($tiposusuarios,$objTiposUsuarios);

                $objTiposUsuarios -> __destruct();
            }
		}
		return $tiposusuarios;
	}
	
	public function __destruct(){}
	}

?>