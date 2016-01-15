<?php
class REGIONAL {
	var $id_regional;
	var $descripcion;
	var $CON;
	function REGIONAL($con) {
		$this->CON=$con;
	}

	function contructor($id_regional, $descripcion){
		$this->id_regional = $id_regional;
		$this->descripcion = $descripcion;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$regional=new REGIONAL();
				$regional->id_regional=$row['id_regional']==null?"":$row['id_regional'];
				$regional->descripcion=$row['descripcion']==null?"":$row['descripcion'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.REGIONAL";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.REGIONAL(id_regional, descripcion) values("+$this->id_regional+",'"+$this->descripcion+"')";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
