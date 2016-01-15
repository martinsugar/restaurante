<?php
class UNIDAD {
	var $Id_Unidad;
	var $descripcion;
	var $CON;
	function UNIDAD($con) {
		$this->CON=$con;
	}

	function contructor($Id_Unidad, $descripcion){
		$this->Id_Unidad = $Id_Unidad;
		$this->descripcion = $descripcion;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$unidad=new UNIDAD();
				$unidad->Id_Unidad=$row['Id_Unidad']==null?"":$row['Id_Unidad'];
				$unidad->descripcion=$row['descripcion']==null?"":$row['descripcion'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.UNIDAD";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.UNIDAD(Id_Unidad, descripcion) values("+$this->Id_Unidad+",'"+$this->descripcion+"')";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
