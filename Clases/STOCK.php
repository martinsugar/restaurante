<?php
class STOCK {
	var $id_stock;
	var $sucursal_id;
	var $almacen_id;
	var $Producto_Id;
	var $cantidad;
	var $cantidadmin;
	var $CON;
	function STOCK($con) {
		$this->CON=$con;
	}

	function contructor($id_stock, $sucursal_id, $almacen_id, $Producto_Id, $cantidad, $cantidadmin){
		$this->id_stock = $id_stock;
		$this->sucursal_id = $sucursal_id;
		$this->almacen_id = $almacen_id;
		$this->Producto_Id = $Producto_Id;
		$this->cantidad = $cantidad;
		$this->cantidadmin = $cantidadmin;
	}

	function rellenar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$stock=new STOCK();
				$stock->id_stock=$row['id_stock']==null?"":$row['id_stock'];
				$stock->sucursal_id=$row['sucursal_id']==null?"":$row['sucursal_id'];
				$stock->almacen_id=$row['almacen_id']==null?"":$row['almacen_id'];
				$stock->Producto_Id=$row['Producto_Id']==null?"":$row['Producto_Id'];
				$stock->cantidad=$row['cantidad']==null?"":$row['cantidad'];
				$stock->cantidadmin=$row['cantidadmin']==null?"":$row['cantidadmin'];
				$lista[]=$stock;
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


	function buscarXID($id){
		$consulta="select * from eldebatedegusto.STOCK where id_stock=$id";
		$result=$this->CON->consulta($consulta);
		$empresa=$this->rellenar($result);
		if($empresa==null){
			return null;
		}
return $empresa[0];
	}

	function modificar($id_stock){
		$consulta="update eldebatedegusto.STOCK set id_stock =".$this->id_stock.", sucursal_id =".$this->sucursal_id.", almacen_id =".$this->almacen_id.", Producto_Id =".$this->Producto_Id.", cantidad =".$this->cantidad.", cantidadmin =".$this->cantidadmin." where id_stock=".$id_stock;
		return $this->CON->manipular($consulta);
	}

	function eliminar($id_stock){
		$consulta="delete from eldebatedegusto.STOCK where id_stock=".$id_stock;
		return $this->CON->manipular($consulta);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.STOCK(id_stock, sucursal_id, almacen_id, Producto_Id, cantidad, cantidadmin) values(".$this->id_stock.",".$this->sucursal_id.",".$this->almacen_id.",".$this->Producto_Id.",".$this->cantidad.",".$this->cantidadmin.")";
		return $this->CON->manipular($consulta);
	}

}
