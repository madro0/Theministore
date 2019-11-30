<?php
	class usuarios {
		private $cedula;
		private $name_lastname;
		private $phone;
		private $pass;
		private $name_type_user;

		public function __construct(){
			$this -> cedula = "";
			$this -> name_lastname = "";
			$this -> phone = "";
			$this -> pass = "";
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