<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
       
        <script src="JavaScript/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="JavaScript/jquery-ui.js" type="text/javascript"></script>
         <script src="JavaScript/HERRAMIENTAS.js" type="text/javascript"></script>
        <link href="Estilo/estilos.css" rel="stylesheet" type="text/css"/>
        <link href="Estilo/EstiloFecha.css" rel="stylesheet" type="text/css"/>
        <script src="JavaScript/cliente.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
         <div id="divprincipal">
       <center>
        <menu id="idmenu" style="background-color: "E8300C" >
            <div></div>
            <a onclick="popup()" style="cursor: pointer">principal</a>
            <a >home</a>
            <a >home</a>
            <a >home</a>
        </menu></center>
            <div id="idcontenedor">
                <br>
                <a class="negrillaenter ">nombre completo</a>
                <input type="text" class="grande2" name="nombre"/><br>
                 <a class="negrillaenter ">direccion</a>
                <input type="text" class="grande2" name="direccion"/><br>
                    <a class="negrillaenter">fecha de nacimiento: </a>
            <input id="edad" type="date" name="edad" class="fecha"><br>
             <a class="negrillaenter" >correo electronico</a>
                <input type="text" class="grande2" name="correo"/>
                <a class="negrillaenter ">cuenta</a>
                <input type="text" class="grande2" name="cuenta"/><br>        
                <a class="negrillaenter">contraseña</a>
                <input type="password" class="grande" id="contraseña"> <br>
               
              
          
                <button class="grande2" id="bvalidar" onclick="validar1()" name="Ver total" value="Ver total">crear cuenta</button>
                
            </div>
            
           
           
      </div>
    </body>
</html>
