<?php
class RESTAURANTE {
	var $id_restaurante;
	var $nombre;
	var $razon_social;
	var $logo;
	var $fechaCreacion;
	var $CON;
	function RESTAURANTE($con) {
		$this->CON=$con;
	}

	function contructor($id_restaurante, $nombre, $razon_social, $logo, $fechaCreacion){
		$this->id_restaurante = $id_restaurante;
		$this->nombre = $nombre;
		$this->razon_social = $razon_social;
		$this->logo = $logo;
		$this->fechaCreacion = $fechaCreacion;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$restaurante=new RESTAURANTE();
				$restaurante->id_restaurante=$row['id_restaurante']==null?"":$row['id_restaurante'];
				$restaurante->nombre=$row['nombre']==null?"":$row['nombre'];
				$restaurante->razon_social=$row['razon_social']==null?"":$row['razon_social'];
				$restaurante->logo=$row['logo']==null?"":$row['logo'];
				$restaurante->fechaCreacion=$row['fechaCreacion']==null?"":$row['fechaCreacion'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.RESTAURANTE";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.RESTAURANTE(id_restaurante, nombre, razon_social, logo, fechaCreacion) values(".$this->id_restaurante.",'".$this->nombre."','".$this->razon_social."','".$this->logo."','".$this->fechaCreacion."')";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
