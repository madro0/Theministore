<?php
	class lista_venta {
		private $cod_lista_venta;
		private $name_product;
		private $cant_pro;
		private $valor_pro;

		public function __construct(){
			$this -> cod_lista_venta = "";
			$this -> name_product = "";
			$this -> cant_pro = "";
			$this -> valor_pro = "";
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