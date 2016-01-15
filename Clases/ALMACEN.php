<?php
class ALMACEN {
	var $id_almacen;
	var $nombre;
	var $direccion;
	var $telefono;
	var $cantidadMin;
	var $restaurante_id;
	var $CON;
	function ALMACEN($con) {
		$this->CON=$con;
	}

	function contructor($id_almacen, $nombre, $direccion, $telefono, $cantidadMin, $restaurante_id){
		$this->id_almacen = $id_almacen;
		$this->nombre = $nombre;
		$this->direccion = $direccion;
		$this->telefono = $telefono;
		$this->cantidadMin = $cantidadMin;
		$this->restaurante_id = $restaurante_id;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$almacen=new ALMACEN();
				$almacen->id_almacen=$row['id_almacen']==null?"":$row['id_almacen'];
				$almacen->nombre=$row['nombre']==null?"":$row['nombre'];
				$almacen->direccion=$row['direccion']==null?"":$row['direccion'];
				$almacen->telefono=$row['telefono']==null?"":$row['telefono'];
				$almacen->cantidadMin=$row['cantidadMin']==null?"":$row['cantidadMin'];
				$almacen->restaurante_id=$row['restaurante_id']==null?"":$row['restaurante_id'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.ALMACEN";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.ALMACEN(id_almacen, nombre, direccion, telefono, cantidadMin, restaurante_id) values("+$this->id_almacen+",'"+$this->nombre+"','"+$this->direccion+"','"+$this->telefono+"',"+$this->cantidadMin+","+$this->restaurante_id+")";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
