<?php
	class facturas_ad{
	
	public function __construct(){}
	
	public function read($pdo){
		$sql ="SELECT * FROM `facturas`";
		$sentencia= $pdo -> prepare($sql); 
		$sentencia -> execute(); 

		$resultado = $sentencia -> fetchall(); 
		
		$facturas=array();

		foreach($resultado as $dato){
			$objProductos = new productos();
			$objProductos -> set('id_bill',$dato['id_bill']);
			$objProductos -> set('cedula',$dato['cedula']);
			$objProductos -> set('date_bill',$dato['date_bill']);
			$objProductos -> set('subtotal',$dato['subtotal']);
            $objProductos -> set('iva',$dato['iva']);
            $objProductos -> set('total',$dato['total']);
            $objProductos -> set('amount_to_pay',$dato['amount_to_pay']);
            $objProductos -> set('residue',$dato['residue']);
            

			array_push($facturas,$objfacturas);

			$objfacturas -> __destruct();
		}
		return $facturas;
	}
        
    public function create($pdo, $objAux){
        $id_bill = $objAux -> get('id_bill');
        $cedula = $objAux -> get('cedula');
        $date_bill = $objAux -> get('date_bill');
        $subtotal = $objAux -> get('subtotal');
        $iva = $objAux -> get('iva');
		$total = $objAux -> get('total');
		$amount_to_pay = $objAux -> get('amount_to_pay');
		$residue = $objAux -> get('residue');

        $sql="insert into `facturas`(`id_bill`, `cedula`, `date_bill`, `subtotal`, `iva`, `total`, `amount_to_pay`, `residue`)  values(?,?,?,?,?,?,?,?)";
        $sentencia = $pdo -> prepare($sql);
        $sentencia -> execute (array($id_bill,$cedula, $date_bill, $subtotal, $iva,$total,$amount_to_pay,$residue));
    }
	
	public function __destruct(){}
	}

?>