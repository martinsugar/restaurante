<?php
class TELEFONO {
	var $id_telefono;
	var $numero;
	var $sucursal_id;
	var $CON;
	function TELEFONO($con) {
		$this->CON=$con;
	}

	function contructor($id_telefono, $numero, $sucursal_id){
		$this->id_telefono = $id_telefono;
		$this->numero = $numero;
		$this->sucursal_id = $sucursal_id;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$telefono=new TELEFONO();
				$telefono->id_telefono=$row['id_telefono']==null?"":$row['id_telefono'];
				$telefono->numero=$row['numero']==null?"":$row['numero'];
				$telefono->sucursal_id=$row['sucursal_id']==null?"":$row['sucursal_id'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.TELEFONO";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.TELEFONO(id_telefono, numero, sucursal_id) values("+$this->id_telefono+",'"+$this->numero+"',"+$this->sucursal_id+")";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
