<?php
class FACTURA {
	var $id_factura;
	var $fecha;
	var $nroFactura;
	var $nombre;
	var $nit;
	var $codigoControl;
	var $autorizacion;
	var $llavedosificacion;
	var $total;
	var $totalDescrito;
	var $estado;
	var $sucursal_id;
	var $CON;
	function FACTURA($con) {
		$this->CON=$con;
	}

	function contructor($id_factura, $fecha, $nroFactura, $nombre, $nit, $codigoControl, $autorizacion, $llavedosificacion, $total, $totalDescrito, $estado, $sucursal_id){
		$this->id_factura = $id_factura;
		$this->fecha = $fecha;
		$this->nroFactura = $nroFactura;
		$this->nombre = $nombre;
		$this->nit = $nit;
		$this->codigoControl = $codigoControl;
		$this->autorizacion = $autorizacion;
		$this->llavedosificacion = $llavedosificacion;
		$this->total = $total;
		$this->totalDescrito = $totalDescrito;
		$this->estado = $estado;
		$this->sucursal_id = $sucursal_id;
	}

	function cargar($resultado){
		if ($resultado->num_rows > 0) {
			$lista=array();
			while($row = $resultado->fetch_assoc()) {
				$factura=new FACTURA();
				$factura->id_factura=$row['id_factura']==null?"":$row['id_factura'];
				$factura->fecha=$row['fecha']==null?"":$row['fecha'];
				$factura->nroFactura=$row['nroFactura']==null?"":$row['nroFactura'];
				$factura->nombre=$row['nombre']==null?"":$row['nombre'];
				$factura->nit=$row['nit']==null?"":$row['nit'];
				$factura->codigoControl=$row['codigoControl']==null?"":$row['codigoControl'];
				$factura->autorizacion=$row['autorizacion']==null?"":$row['autorizacion'];
				$factura->llavedosificacion=$row['llavedosificacion']==null?"":$row['llavedosificacion'];
				$factura->total=$row['total']==null?"":$row['total'];
				$factura->totalDescrito=$row['totalDescrito']==null?"":$row['totalDescrito'];
				$factura->estado=$row['estado']==null?"":$row['estado'];
				$factura->sucursal_id=$row['sucursal_id']==null?"":$row['sucursal_id'];
				$lista[]=$empresa;
			}
			return $lista;
		}else{
			return null;
		}
	}

	function todo(){
		$consulta="select * from eldebatedegusto.FACTURA";
		$result=$this->CON->consulta($consulta);
		return $this->rellenar($result);
	}

	function insertar(){
		$consulta="insert into eldebatedegusto.FACTURA(id_factura, fecha, nroFactura, nombre, nit, codigoControl, autorizacion, llavedosificacion, total, totalDescrito, estado, sucursal_id) values("+$this->id_factura+",'"+$this->fecha+"',"+$this->nroFactura+",'"+$this->nombre+"','"+$this->nit+"','"+$this->codigoControl+"','"+$this->autorizacion+"','"+$this->llavedosificacion+"',"+$this->total+",'"+$this->totalDescrito+"','"+$this->estado+"',"+$this->sucursal_id+")";
		$resultado=$this->CON->consulta($consulta);
		$consulta="SELECT LAST_INSERT_ID() as id";
		$resultado=$this->CON->consulta($consulta);
		return $resultado->fetch_assoc()['id'];
	}

}
