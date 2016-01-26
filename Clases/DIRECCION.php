<?php
class DIRECCION {
	var $id_direccion;
	var $descripcion;
	var $cliente_id;
	var $CON;
	function DIRECCION($con) {
		$this->CON=$con;
	}

	function contructor($id_direccion, $descripcion, $cliente_id){
		$this->id_direccion = $id_direccion;
		$this->descripcion = $descripcion;
		$this->cliente_id = $cliente_id;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$direccion=new DIRECCION();
				$direccion->id_direccion=$row['id_direccion']==null?"":$row['id_direccion'];
				$direccion->descripcion=$row['descripcion']==null?"":$row['descripcion'];
				$direccion->cliente_id=$row['cliente_id']==null?"":$row['cliente_id'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.DIRECCION";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.DIRECCION(id_direccion, descripcion, cliente_id) values(".$this->id_direccion.",'".$this->descripcion."',".$this->cliente_id.")";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
