<?php
	class ventas {
		private $cod_product;
		private $id_bill;
		private $name_product;
		private $amount_to_buy;
		private $total_value;

		public function __construct(){
			$this -> cod_product = "";
			$this -> id_bill = "";
			$this -> name_product = "";
			$this -> amount_to_buy = 0;
			$this -> total_value = 0;
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