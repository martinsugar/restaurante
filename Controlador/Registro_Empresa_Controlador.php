<?php

include_once "../Clases/CONN.php";
include_once "../Clases/RESTAURANTE.php";
include_once "../Clases/HERRAMIENTASPHP.php";
include_once "../Clases/PERSONAL.php";
include_once "../Clases/REGIONAL.php.php";


error_reporting(0);
$restaurante = new RESTAURANTE($con);
$error = "";
$resultado = "";
$proceso = $_POST["proceso"];
$con = new CONN("rest", "wdigital");
        


   
if ($proceso == "insertarRestaurante") {

    $nombres = $_POST['nombres'];
    $razonsocial = $_POST['razonsocial'];   
  $nombrer = $_POST['nombrer'];
    $regional = $_POST['regional'];
   $nit = $_POST['nit'];
   $direccions = $_POST['direccions'];
      $direccionp = $_POST['direccionp'];

   
  $cuenta =  $_POST['cuenta'];
  $rol = $_POST['rol'];
   $sueldo =$_POST['sueldo'];
   $nombrep = $_POST['nombrep'];
   $telefono = $_POST['telefono'];
   
    $logo   = $_POST['logo'];
    $fechacreacion =  date("d/m/Y"); 
    $text = "";
    $Herramienta = new Herramientas();
    if (!$Herramienta->validar("vacio", $nombres)) {
        $text .= "<p>el campo nombre completo no puede estar vacio</p>";
    }
    if ($Herramienta->validar("texto", $nombre)===FALSE) {
        $text .= "<p>por favor instrodusca su nombre correctamente</p>";
    }
    if (!$Herramienta->validar("vacio", $razonsocial)) {
        $text .= "<p>la razonsocial no puede estar vacio</p>";
    }
    if (!$Herramienta->validar("texto", $razonsocial)) {
        $text .= "<p>por favor instroduzca su razon social correctamente, no estan permitidos los carateres especiales</p>";
    }
 
    if (strlen($text) > 0) {
        $error = $text;
    } else {
        
        $restaurante->contructor(0, $nombre, $razonsocial, $logo, $fechacreacion);
        $restaurante->CON = $con;
        $con->transacion();
        $insert = $restaurante->insertar();
        if ($insert !== 0) {
            $dire = new DIRECCION();
            $dire->id_direccion=0;
            $dire->cliente_id = $insert;
            $dire->descripcion = $direccion;
            $dire->CON = $con;
            $insert= $dire->insertar();
     
            if ($insert == 0) {
                $con->rollback();
                $error = "Se corto la conexion con el servidor. Intente nuevamente.";
            }
            else
                $con->commit ();
        } else
            $error = "Se corto la conexion con el servidor. Intente nuevamente.";
    }
}
$con->closed();
$reponse = array("error" => $error, "result" => $resultado);
echo $_POST['callback'] . json_encode($reponse);


