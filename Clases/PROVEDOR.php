<?php
class PROVEDOR {
	var $id_Provedor;
	var $Nombre;
	var $direccion;
	var $telefono;
	var $correo;
	var $Contacto;
	var $Telefono_Contacto;
	var $sucursal_id;
	var $CON;
	function PROVEDOR($con) {
		$this->CON=$con;
	}

	function contructor($id_Provedor, $Nombre, $direccion, $telefono, $correo, $Contacto, $Telefono_Contacto, $sucursal_id){
		$this->id_Provedor = $id_Provedor;
		$this->Nombre = $Nombre;
		$this->direccion = $direccion;
		$this->telefono = $telefono;
		$this->correo = $correo;
		$this->Contacto = $Contacto;
		$this->Telefono_Contacto = $Telefono_Contacto;
		$this->sucursal_id = $sucursal_id;
	}

	function rellenar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$provedor=new PROVEDOR();
				$provedor->id_Provedor=$row['id_Provedor']==null?"":$row['id_Provedor'];
				$provedor->Nombre=$row['Nombre']==null?"":$row['Nombre'];
				$provedor->direccion=$row['direccion']==null?"":$row['direccion'];
				$provedor->telefono=$row['telefono']==null?"":$row['telefono'];
				$provedor->correo=$row['correo']==null?"":$row['correo'];
				$provedor->Contacto=$row['Contacto']==null?"":$row['Contacto'];
				$provedor->Telefono_Contacto=$row['Telefono_Contacto']==null?"":$row['Telefono_Contacto'];
				$provedor->sucursal_id=$row['sucursal_id']==null?"":$row['sucursal_id'];
				$lista[]=$provedor;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.PROVEDOR";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}


	function buscarXID($id){
		$consulta="select * from eldebatedegusto.PROVEDOR where id_Provedor=$id";
		$result=$this->CON->consulta($consulta);
		$empresa=$this->rellenar($result);
		if($empresa==null){
			return null;
		}
return $empresa[0];
	}

	function modificar($id_Provedor){
		$consulta="update eldebatedegusto.PROVEDOR set id_Provedor =".$this->id_Provedor.", Nombre ='".$this->Nombre."', direccion ='".$this->direccion."', telefono ='".$this->telefono."', correo ='".$this->correo."', Contacto ='".$this->Contacto."', Telefono_Contacto ='".$this->Telefono_Contacto."', sucursal_id =".$this->sucursal_id." where id_Provedor=".$id_Provedor;
		return $this->CON->manipular($consulta);
	}

	function eliminar($id_Provedor){
		$consulta="delete from eldebatedegusto.PROVEDOR where id_Provedor=".$id_Provedor;
		return $this->CON->manipular($consulta);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.PROVEDOR(id_Provedor, Nombre, direccion, telefono, correo, Contacto, Telefono_Contacto, sucursal_id) values(".$this->id_Provedor.",'".$this->Nombre."','".$this->direccion."','".$this->telefono."','".$this->correo."','".$this->Contacto."','".$this->Telefono_Contacto."',".$this->sucursal_id.")";
		return $this->CON->manipular($consulta);
	}

}
