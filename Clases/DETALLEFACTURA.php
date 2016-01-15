<?php
class DETALLEFACTURA {
	var $factura_id;
	var $cantidad;
	var $plato_id;
	var $Producto_Id;
	var $CON;
	function DETALLEFACTURA($con) {
		$this->CON=$con;
	}

	function contructor($factura_id, $cantidad, $plato_id, $Producto_Id){
		$this->factura_id = $factura_id;
		$this->cantidad = $cantidad;
		$this->plato_id = $plato_id;
		$this->Producto_Id = $Producto_Id;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$detallefactura=new DETALLEFACTURA();
				$detallefactura->factura_id=$row['factura_id']==null?"":$row['factura_id'];
				$detallefactura->cantidad=$row['cantidad']==null?"":$row['cantidad'];
				$detallefactura->plato_id=$row['plato_id']==null?"":$row['plato_id'];
				$detallefactura->Producto_Id=$row['Producto_Id']==null?"":$row['Producto_Id'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.DETALLEFACTURA";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.DETALLEFACTURA(factura_id, cantidad, plato_id, Producto_Id) values("+$this->factura_id+","+$this->cantidad+","+$this->plato_id+","+$this->Producto_Id+")";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
