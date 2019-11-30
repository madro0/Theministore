<?php
	class proveedores {
		private $cod_provider;
		private $name_provider;
		private $business;
		private $phone;

		public function __construct(){
			$this -> cod_provider = "";
			$this -> name_provider = "";
			$this -> business = "";
			$this -> phone = "";
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