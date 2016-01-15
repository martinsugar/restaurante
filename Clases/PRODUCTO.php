<?php
class PRODUCTO {
	var $Id_Producto;
	var $Precio_Compra;
	var $Precio_Venta;
	var $nombre;
	var $Unidad_Id;
	var $CON;
	function PRODUCTO($con) {
		$this->CON=$con;
	}

	function contructor($Id_Producto, $Precio_Compra, $Precio_Venta, $nombre, $Unidad_Id){
		$this->Id_Producto = $Id_Producto;
		$this->Precio_Compra = $Precio_Compra;
		$this->Precio_Venta = $Precio_Venta;
		$this->nombre = $nombre;
		$this->Unidad_Id = $Unidad_Id;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$producto=new PRODUCTO();
				$producto->Id_Producto=$row['Id_Producto']==null?"":$row['Id_Producto'];
				$producto->Precio_Compra=$row['Precio_Compra']==null?"":$row['Precio_Compra'];
				$producto->Precio_Venta=$row['Precio_Venta']==null?"":$row['Precio_Venta'];
				$producto->nombre=$row['nombre']==null?"":$row['nombre'];
				$producto->Unidad_Id=$row['Unidad_Id']==null?"":$row['Unidad_Id'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.PRODUCTO";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.PRODUCTO(Id_Producto, Precio_Compra, Precio_Venta, nombre, Unidad_Id) values("+$this->Id_Producto+","+$this->Precio_Compra+","+$this->Precio_Venta+",'"+$this->nombre+"',"+$this->Unidad_Id+")";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
