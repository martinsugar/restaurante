<?php
class CLIENTE {
	var $id_cliente;
	var $nombre;
	var $ci;
	var $cuenta;
	var $contrasena;
	var $correo;
	var $telefono;
        var $fechanacimiento;
        var $foto;
	var $CON;
	function CLIENTE($con) {
		$this->CON=$con;
	}
	function contructor($id_cliente, $nombre, $ci, $cuenta, $contrasena, $correo, $telefono, $fechanacimiento,$foto){
		$this->id_cliente = $id_cliente;
		$this->nombre = $nombre;
		$this->ci = $ci;
		$this->cuenta = $cuenta;
		$this->contrasena = $contrasena;
		$this->correo = $correo;
		$this->telefono = $telefono;
		$this->fechanacimiento = $fechanacimiento;
                $this->foto= $foto;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$cliente=new CLIENTE();
				$cliente->id_cliente=$row['id_cliente']==null?"":$row['id_cliente'];
				$cliente->nombre=$row['nombre']==null?"":$row['nombre'];
				$cliente->ci=$row['ci']==null?"":$row['ci'];
				$cliente->cuenta=$row['cuenta']==null?"":$row['cuenta'];
				$cliente->contrasena=$row['contrasena']==null?"":$row['contrasena'];
				$cliente->correo=$row['correo']==null?"":$row['correo'];
				$cliente->telefono=$row['telefono']==null?"":$row['telefono'];
				$cliente->fechanacimiento=$row['fechanacimiento']==null?"":$row['fechanacimiento'];
				$cliente->foto=$row['foto']==null?"":$row['foto'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.CLIENTE";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.CLIENTE(id_cliente, nombre, ci, cuenta, contrasena, correo, telefono,fechanacimiento,foto) values(".$this->id_cliente.",'".$this->nombre."','".$this->ci."','".$this->cuenta."','".$this->contrasena."','".$this->correo."','".$this->telefono."','".$this->fechanacimiento."','".$this->foto."')";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}
        

}
