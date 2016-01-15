<?php
class PERSONAL {
	var $id_personal;
	var $nombre;
	var $cuenta;
	var $contrasena;
	var $rol;
	var $sueldo;
	var $estado;
	var $fechaContratado;
	var $sucursal_id;
	var $almacen_id;
	var $telefono;
	var $direccion;
	var $CON;
	function PERSONAL($con) {
		$this->CON=$con;
	}

	function contructor($id_personal, $nombre, $cuenta, $contrasena, $rol, $sueldo, $estado, $fechaContratado, $sucursal_id, $almacen_id, $telefono, $direccion){
		$this->id_personal = $id_personal;
		$this->nombre = $nombre;
		$this->cuenta = $cuenta;
		$this->contrasena = $contrasena;
		$this->rol = $rol;
		$this->sueldo = $sueldo;
		$this->estado = $estado;
		$this->fechaContratado = $fechaContratado;
		$this->sucursal_id = $sucursal_id;
		$this->almacen_id = $almacen_id;
		$this->telefono = $telefono;
		$this->direccion = $direccion;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$personal=new PERSONAL();
				$personal->id_personal=$row['id_personal']==null?"":$row['id_personal'];
				$personal->nombre=$row['nombre']==null?"":$row['nombre'];
				$personal->cuenta=$row['cuenta']==null?"":$row['cuenta'];
				$personal->contrasena=$row['contrasena']==null?"":$row['contrasena'];
				$personal->rol=$row['rol']==null?"":$row['rol'];
				$personal->sueldo=$row['sueldo']==null?"":$row['sueldo'];
				$personal->estado=$row['estado']==null?"":$row['estado'];
				$personal->fechaContratado=$row['fechaContratado']==null?"":$row['fechaContratado'];
				$personal->sucursal_id=$row['sucursal_id']==null?"":$row['sucursal_id'];
				$personal->almacen_id=$row['almacen_id']==null?"":$row['almacen_id'];
				$personal->telefono=$row['telefono']==null?"":$row['telefono'];
				$personal->direccion=$row['direccion']==null?"":$row['direccion'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.PERSONAL";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.PERSONAL(id_personal, nombre, cuenta, contrasena, rol, sueldo, estado, fechaContratado, sucursal_id, almacen_id, telefono, direccion) values("+$this->id_personal+",'"+$this->nombre+"','"+$this->cuenta+"','"+$this->contrasena+"','"+$this->rol+"',"+$this->sueldo+",'"+$this->estado+"','"+$this->fechaContratado+"',"+$this->sucursal_id+","+$this->almacen_id+",'"+$this->telefono+"','"+$this->direccion+"')";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
