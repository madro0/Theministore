<?php
	class tipo_usuarios {
		private $cod_type_user;
		private $name_type_user;
        
		public function __construct(){
			$this -> cod_type_user = "";
			$this -> name_type_user = "";
		}

		public function set($atributo,$valor) {
			$this ->$atributo =$valor;
		}

		public function get($atributo) {
			return $this ->$atributo;
		}

		public function __destruct(){}
	}
?>