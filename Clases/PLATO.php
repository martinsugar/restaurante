<?php
class PLATO {
	var $id_plato;
	var $nombre;
	var $preparacion;
	var $CON;
	function PLATO($con) {
		$this->CON=$con;
	}

	function contructor($id_plato, $nombre, $preparacion){
		$this->id_plato = $id_plato;
		$this->nombre = $nombre;
		$this->preparacion = $preparacion;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$plato=new PLATO();
				$plato->id_plato=$row['id_plato']==null?"":$row['id_plato'];
				$plato->nombre=$row['nombre']==null?"":$row['nombre'];
				$plato->preparacion=$row['preparacion']==null?"":$row['preparacion'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.PLATO";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.PLATO(id_plato, nombre, preparacion) values("+$this->id_plato+",'"+$this->nombre+"','"+$this->preparacion+"')";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
