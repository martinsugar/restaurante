<?php
class STOCK {
	var $id_stock;
	var $sucursal_id;
	var $almacen_id;
	var $Producto_Id;
	var $cantidad;
	var $CON;
	function STOCK($con) {
		$this->CON=$con;
	}

	function contructor($id_stock, $sucursal_id, $almacen_id, $Producto_Id, $cantidad){
		$this->id_stock = $id_stock;
		$this->sucursal_id = $sucursal_id;
		$this->almacen_id = $almacen_id;
		$this->Producto_Id = $Producto_Id;
		$this->cantidad = $cantidad;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$stock=new STOCK();
				$stock->id_stock=$row['id_stock']==null?"":$row['id_stock'];
				$stock->sucursal_id=$row['sucursal_id']==null?"":$row['sucursal_id'];
				$stock->almacen_id=$row['almacen_id']==null?"":$row['almacen_id'];
				$stock->Producto_Id=$row['Producto_Id']==null?"":$row['Producto_Id'];
				$stock->cantidad=$row['cantidad']==null?"":$row['cantidad'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.STOCK";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.STOCK(id_stock, sucursal_id, almacen_id, Producto_Id, cantidad) values("+$this->id_stock+","+$this->sucursal_id+","+$this->almacen_id+","+$this->Producto_Id+","+$this->cantidad+")";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
