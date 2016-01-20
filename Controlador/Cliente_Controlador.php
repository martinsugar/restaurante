<?php

include_once "../Clases/CONN.php";
include_once "../Clases/CLIENTE.php";
include_once "../Clases/HERRAMIENTASPHP.php";

error_reporting(0);
$cliente = new CLIENTE($con);
$error = "";
$resultado = "";
$proceso = $_POST["proceso"];
$con = new CONN("rest", "wdigital");
if ($proceso == "insertarCliente") {

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $cuenta = $_POST['cuenta'];
    $ci = $_POST['ci'];
    $contrasena = $_POST['contrasena'];
    $rcontraseña = $_POST['rcontraseña'];
    $telefono = $_POST['telefono'];
    $text = "";
    $Herramienta=new Herramientas();
    if (!$Herramienta->validar("vacio", $nombre))
    {
        $text .= "<p>el campo nombre completo no puede estar vacio</p>";
    }
    if (!$Herramienta->validar("texto", $nombre))
    {
        $text .= "<p>por favor instrodusca su nombre correctamente</p>";
    }
    if (!$Herramienta->validar("vacio", $email))
    {
        $text .= "<p>el correo electronico no puede estar vacio</p>";
    }
    if (!$Herramienta->validar("email", $email))
    {
        $text .= "<p>por favor instroduzca su correo electronico correctamente, no estan permitidos los carateres especiales</p>";
    }
    if (!$Herramienta->validar("texto y entero", $direccion)) {
        $text .= "<p>por favor instroduzca su direccion correctamente, no estan permitidos los carateres especiales</p>";
    }
    if (!$Herramienta->validar("texto y entero", $cuenta)) {
        $text .= "<p>no estan permitidos los caracteres especiales en el campo cuenta</p>";
    }
    if (!$Herramienta->validar("vacio", $cuenta))
    {
        $text .= "<p>el campo cuenta tiene que tener mayor a 4  y menor a 8 caracteres</p>";
    }
    if (strlen($contrasena) < 4 || strlen($contrasena) > 8) {
        $text .= "<p>el password tiene que tener mayor a 4  y menor a 8 caracteres</p>";
    }
        if ($rcontraseña===$contrasena)
    {
           $text .= "<p>las contraseñas no coinciden, vuelva a intentarlo</p>";
        
    }
    if (strlen($text) > 0) {
        $error = $text;
    } else {
        $cliente->contructor(0, $nombre, $ci, $cuenta, $contrasena, $correo, $telefono);
        $cliente->CON = $con;

        if ($cliente->insertar() == 0) {
            $error = "Se corto la conexion con el servidor. Intente nuevamente.";
        }
    }
}
$reponse = array("error" => $error, "result" => $resultado);
echo $_POST['callback'] .  json_encode($reponse) ;








