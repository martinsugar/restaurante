<?php
class PEDIDO {
	var $id_pedido;
	var $fecha;
	var $estado;
	var $mesa_id;
	var $personal_id;
	var $nro;
	var $cliente_id;
	var $CON;
	function PEDIDO($con) {
		$this->CON=$con;
	}

	function contructor($id_pedido, $fecha, $estado, $mesa_id, $personal_id, $nro, $cliente_id){
		$this->id_pedido = $id_pedido;
		$this->fecha = $fecha;
		$this->estado = $estado;
		$this->mesa_id = $mesa_id;
		$this->personal_id = $personal_id;
		$this->nro = $nro;
		$this->cliente_id = $cliente_id;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$pedido=new PEDIDO();
				$pedido->id_pedido=$row['id_pedido']==null?"":$row['id_pedido'];
				$pedido->fecha=$row['fecha']==null?"":$row['fecha'];
				$pedido->estado=$row['estado']==null?"":$row['estado'];
				$pedido->mesa_id=$row['mesa_id']==null?"":$row['mesa_id'];
				$pedido->personal_id=$row['personal_id']==null?"":$row['personal_id'];
				$pedido->nro=$row['nro']==null?"":$row['nro'];
				$pedido->cliente_id=$row['cliente_id']==null?"":$row['cliente_id'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.PEDIDO";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.PEDIDO(id_pedido, fecha, estado, mesa_id, personal_id, nro, cliente_id) values("+$this->id_pedido+",'"+$this->fecha+"','"+$this->estado+"',"+$this->mesa_id+","+$this->personal_id+","+$this->nro+","+$this->cliente_id+")";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
