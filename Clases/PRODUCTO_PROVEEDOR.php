<?php
class PRODUCTO_PROVEEDOR {
	var $Producto_Id;
	var $Provedor_id;
	var $Precio;
	var $Comentario;
	var $CON;
	function PRODUCTO_PROVEEDOR($con) {
		$this->CON=$con;
	}

	function contructor($Producto_Id, $Provedor_id, $Precio, $Comentario){
		$this->Producto_Id = $Producto_Id;
		$this->Provedor_id = $Provedor_id;
		$this->Precio = $Precio;
		$this->Comentario = $Comentario;
	}

	function rellenar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$producto_proveedor=new PRODUCTO_PROVEEDOR();
				$producto_proveedor->Producto_Id=$row['Producto_Id']==null?"":$row['Producto_Id'];
				$producto_proveedor->Provedor_id=$row['Provedor_id']==null?"":$row['Provedor_id'];
				$producto_proveedor->Precio=$row['Precio']==null?"":$row['Precio'];
				$producto_proveedor->Comentario=$row['Comentario']==null?"":$row['Comentario'];
				$lista[]=$producto_proveedor;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.PRODUCTO_PROVEEDOR";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.PRODUCTO_PROVEEDOR(Producto_Id, Provedor_id, Precio, Comentario) values(".$this->Producto_Id.",".$this->Provedor_id.",".$this->Precio.",'".$this->Comentario."')";
		return $this->CON->manipular($consulta);
	}

}
