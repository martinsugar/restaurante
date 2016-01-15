<?php
class SUCURSAL {
	var $id_sucursal;
	var $Nombre;
	var $nit;
	var $direccion;
	var $nro_Factura;
	var $fecha_factura;
	var $llave_docificacion;
	var $sucursalcol;
	var $regional_id;
	var $cantidadMinima;
	var $restaurante_id;
	var $CON;
	function SUCURSAL($con) {
		$this->CON=$con;
	}

	function contructor($id_sucursal, $Nombre, $nit, $direccion, $nro_Factura, $fecha_factura, $llave_docificacion, $sucursalcol, $regional_id, $cantidadMinima, $restaurante_id){
		$this->id_sucursal = $id_sucursal;
		$this->Nombre = $Nombre;
		$this->nit = $nit;
		$this->direccion = $direccion;
		$this->nro_Factura = $nro_Factura;
		$this->fecha_factura = $fecha_factura;
		$this->llave_docificacion = $llave_docificacion;
		$this->sucursalcol = $sucursalcol;
		$this->regional_id = $regional_id;
		$this->cantidadMinima = $cantidadMinima;
		$this->restaurante_id = $restaurante_id;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$sucursal=new SUCURSAL();
				$sucursal->id_sucursal=$row['id_sucursal']==null?"":$row['id_sucursal'];
				$sucursal->Nombre=$row['Nombre']==null?"":$row['Nombre'];
				$sucursal->nit=$row['nit']==null?"":$row['nit'];
				$sucursal->direccion=$row['direccion']==null?"":$row['direccion'];
				$sucursal->nro_Factura=$row['nro_Factura']==null?"":$row['nro_Factura'];
				$sucursal->fecha_factura=$row['fecha_factura']==null?"":$row['fecha_factura'];
				$sucursal->llave_docificacion=$row['llave_docificacion']==null?"":$row['llave_docificacion'];
				$sucursal->sucursalcol=$row['sucursalcol']==null?"":$row['sucursalcol'];
				$sucursal->regional_id=$row['regional_id']==null?"":$row['regional_id'];
				$sucursal->cantidadMinima=$row['cantidadMinima']==null?"":$row['cantidadMinima'];
				$sucursal->restaurante_id=$row['restaurante_id']==null?"":$row['restaurante_id'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.SUCURSAL";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.SUCURSAL(id_sucursal, Nombre, nit, direccion, nro_Factura, fecha_factura, llave_docificacion, sucursalcol, regional_id, cantidadMinima, restaurante_id) values("+$this->id_sucursal+",'"+$this->Nombre+"','"+$this->nit+"','"+$this->direccion+"',"+$this->nro_Factura+",'"+$this->fecha_factura+"','"+$this->llave_docificacion+"','"+$this->sucursalcol+"',"+$this->regional_id+","+$this->cantidadMinima+","+$this->restaurante_id+")";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
