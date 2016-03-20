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

	function rellenar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$mesa=new MESA();
				$mesa->id_mesa=$row['id_mesa']==null?"":$row['id_mesa'];
				$mesa->nromesa=$row['nromesa']==null?"":$row['nromesa'];
				$mesa->sucursal_id=$row['sucursal_id']==null?"":$row['sucursal_id'];
				$mesa->estado=$row['estado']==null?"":$row['estado'];
				$lista[]=$mesa;
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


	function buscarXID($id){
		$consulta="select * from eldebatedegusto.MESA where id_mesa=$id";
		$result=$this->CON->consulta($consulta);
		$empresa=$this->rellenar($result);
		if($empresa==null){
			return null;
		}
return $empresa[0];
	}

	function modificar($id_mesa){
		$consulta="update eldebatedegusto.MESA set id_mesa =".$this->id_mesa.", nromesa ='".$this->nromesa."', sucursal_id =".$this->sucursal_id.", estado ='".$this->estado."' where id_mesa=".$id_mesa;
		return $this->CON->manipular($consulta);
	}

	function eliminar($id_mesa){
		$consulta="delete from eldebatedegusto.MESA where id_mesa=".$id_mesa;
		return $this->CON->manipular($consulta);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.MESA(id_mesa, nromesa, sucursal_id, estado) values(".$this->id_mesa.",'".$this->nromesa."',".$this->sucursal_id.",'".$this->estado."')";
		return $this->CON->manipular($consulta);
	}

}
