<?php
	class facturas {
		private $id_bill;
		private $cedula;
		private $date_bill;
		private $subtotal;
		private $iva;
		private $total;
		private $amount_to_pay;
		private $residue;

		public function __construct(){
			$this -> id_bill = "";
			$this -> cedula = "";
			$this -> date_bill = "";
			$this -> subtotal= 0;
			$this -> iva = 0;
			$this -> total = 0;
			$this -> amount_to_pay=0;
			$this -> residue=0;
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