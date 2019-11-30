<?php
	/**
	 * 
	 */
	class conexion
	{
		public $pdo;

		public function __construct(){}

		public function abrir_conexion(){
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "theministore";

			try {
				$this -> pdo = new PDO ("mysql:host=$host;dbname=$db;charset=utf8;",$user,$pass); 
				//echo "la conexion ha sido exitosa";
			} catch (Exception $e) {
				die("c fue a la verga 'nose establecio la conexion'".$e -> getMessage());
			}
		}

		public function __destruct(){
			
		}
	}
?>