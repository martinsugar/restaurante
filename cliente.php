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
        <script src="JavaScript/index.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
         <div id="divprincipal">
       <center>
        <menu id="idmenu"  >
            <div></div>
            <a onclick="popup()" style="cursor: pointer">principal</a>
            <a >home</a>
            <a >home</a>
            <a >home</a>
        </menu></center>
            <div id="idcontenedor">
                <br>
                <a class="negrillaenter ">nombre completo</a>
                <input type="text" class="grande2" name="nombre"/>
                <br>
                <a class="negrillaenter" id="correo">correo electronico</a>
                <input type="text"/>
                <a class="negrillaenter">contraseña</a>
                <input type="password" class="grande" id="contraseña"> <br>
               
              <a class="negrillaenter">fecha nacimiento: </a>
            <input id="fechanacimiento" type="date" name="fechanac"><br>
              <a class="negrillaenter">edad: </a>
            <input id="edad" type="date" name="edad" class="fecha"><br>
                <button id="validar" onclick="validar1()" name="Ver total" value="Ver total">crear cuenta</button>
                
            </div>
            
           
           
      </div>
    </body>
</html>
