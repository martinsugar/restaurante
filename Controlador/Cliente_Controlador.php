<?php
    include_once "../Clases/CONN.php";
    include_once "../Clases/CLIENTE.php";
    error_reporting(0);
    $cliente=new CLIENTE($con);
    $error="";
    $resultado="";
    $proceso=$_POST["proceso"];
    $con=new CONN("root", "wdigital");
    if($proceso=="insertarCliente"){
        $nombre=$_POST['nombre'];
        $correo=$_POST['correo'];
        $direccion=$_POST['direccion'];
        $cuenta=$_POST['cuenta'];
        $ci=$_POST['ci'];
        
        $cliente->contructor(0, $nombre, $ci, $cuenta, $contrasena, $correo, $telefono);
        $cliente->insertar();
        if($cliente->insertar()==0){
            $error="Se corto la conexion con el servidor. Intenet nuevamente.";
        }
    }
    $reponse = array("error" => $error,"result"=>$resultado);
    echo $_POST['callback'].'('.json_encode($reponse).')';
   
    
         
    
    
         
    
    
    