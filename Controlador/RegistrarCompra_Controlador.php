<?php
include_once "../Clases/CONN.php";
include_once "../Clases/HERRAMIENTASPHP.php";
error_reporting(0);
$error = "";
$resultado = "";
session_start();
$almacensession = $_SESSION["almacen"];
$personalsession = $_SESSION["personal"];
$sucursalsession = $_SESSION["sucursal"];
$Herramienta = new Herramientas();
$con = new CONN("taller1", "wdigital");
if (!$con->estado) {
    $error = "No se pudo establecer conexion. Intente nuevamente.";
    $reponse = array("error" => $error, "result" => $resultado);
    echo $_GET['callback'] . json_encode($reponse);
    return;
}
if ($personalsession == null) {
    $error = "Error Session";
    $reponse = array("error" => $error, "result" => $resultado);
    echo $_GET['callback'] . json_encode($reponse);
    return;
}
$personal = new PERSONAL($con);
$proceso = $_POST["proceso"];
if ($proceso === "buscarEmpleado") {
    $text = $_POST["text"];
    if (!$Herramienta->validar("texto y entero", $text)) {
        $error = "El criterio de busqueda no puede tener caracteres especiales.";
    } else {
        $estado = $_POST["estado"];
        $resultado = $personal->BuscarPersonal($text, $estado);
    }
}
$reponse = array("error" => $error, "result" => $resultado);
echo $_GET['callback'] . json_encode($reponse);

