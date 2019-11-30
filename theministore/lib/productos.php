<?php
	class productos {
		private $cod_product;
		private $name_product;
		private $amount_product;
		private $unit_value;
		private $name_provider;

		public function __construct(){
			$this -> cod_product = "";
			$this -> name_product = "";
			$this -> amount_product = "";
			$this -> unit_value = "";
			$this -> name_provider = "";
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