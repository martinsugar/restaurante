<?php
    include_once "../Clases/CONN.php";
include_once "../Clases/PERSONAL.php";
include_once "../Clases/HERRAMIENTASPHP.php";


$con = new CONN("rest", "wdigital");
error_reporting(0);
$personal = new PERSONAL($con);
$error = "";
$resultado = "";
$proceso = $_POST["proceso"];
if ($proceso == "verificarLogeo") {

    $cuenta = $_POST['cuenta'];
    $contrasena = $_POST['contrasena'];
    $text = "";
    $Herramienta = new Herramientas();
    if(!$Herramienta->validar('texto y entero', $contrasena))
    {
        $text .= "<p>Por favor intruduzca su contrasena correctamente</p>";
    }
    if(!$Herramienta->validar('texto y entero', $cuenta))
    {
        $text .= "<p>Por favor intruduzca su cuenta correctamente</p>";
    }
    if(!$Herramienta->validar('vacio', $cuenta))
    {
        $text .= "<p>El campo Cuenta no puede estar vacio</p>";
    }
    if(!$Herramienta->validar('vacio', $contrasena))
    {
        $text .= "<p>El campo Contrasena no puede estar vacio</p>";
    }
    if ($personal->logeo($cuenta, $contrasena===1)) {
        
    if ($personal->verificacionestado($cuenta, $contrasena===1)) {
        
    }
    else
        $text .= "<p>Cuenta inactiva</p>";
    }
    else
        $text .= "<p>La Cuenta o la Contrasena no son correctas, vuelva a intentarlo</p>";

    if (strlen($text) > 0) {
        $error = $text;
    } 
}
$con->closed();
$reponse = array("error" => $error, "result" => $resultado);
echo $_POST['callback'] . json_encode($reponse);


