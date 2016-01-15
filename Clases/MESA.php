<?php
class MESA {
	var $id_mesa;
	var $nromesa;
	var $sucursal_id;
	var $estado;
	var $CON;
	function MESA($con) {
		$this->CON=$con;
	}

	function contructor($id_mesa, $nromesa, $sucursal_id, $estado){
		$this->id_mesa = $id_mesa;
		$this->nromesa = $nromesa;
		$this->sucursal_id = $sucursal_id;
		$this->estado = $estado;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$mesa=new MESA();
				$mesa->id_mesa=$row['id_mesa']==null?"":$row['id_mesa'];
				$mesa->nromesa=$row['nromesa']==null?"":$row['nromesa'];
				$mesa->sucursal_id=$row['sucursal_id']==null?"":$row['sucursal_id'];
				$mesa->estado=$row['estado']==null?"":$row['estado'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.MESA";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.MESA(id_mesa, nromesa, sucursal_id, estado) values("+$this->id_mesa+",'"+$this->nromesa+"',"+$this->sucursal_id+",'"+$this->estado+"')";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
