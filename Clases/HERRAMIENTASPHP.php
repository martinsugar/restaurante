<?php
class Herramientas{
function HERRAMIENTASPHP(){}
function validar($tipo,$texto){
    $texto.=" ";
    switch ($tipo){
        case "texto":
           
            if(preg_match("/^[a-zA-Z\.\,\s-_º()=?¿/%$@!:;{}óíáéúñÍÁÉÚÓ]+$/", $texto)){
                return false;
            }
            break;
        case "vacio":
           if(strlen($texto)==1){
              return false;
            }
            break;
        case "entero":
            
            if(preg_match("/^[0-9\s]+$/", $texto)){
               return false;
            }
            break;
        case "texto y entero":
            $expresion="/^[0-9a-zA-Z\.\,\s-_º()=?¿/%$@!:;{}óíáéúñÍÁÉÚÓ]+$/";
            if(preg_match($expresion, $texto)){
                  return false;
            }
            break;
           
    }
     return true;
}
}
