<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../Estilo/estilos.css" rel="stylesheet" type="text/css"/>
        <link href="../Estilo/EstiloFecha.css" rel="stylesheet" type="text/css"/>
        <script src="../JavaScript/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="../JavaScript/jquery-ui.js" type="text/javascript"></script>
        <script src="../JavaScript/HERRAMIENTAS.js" type="text/javascript"></script>
        <script src="../JavaScript/cliente.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <div id='cuerpoFormulario'>
            <span class="negrillaenter ">nombre completo</span>
            <input type="text" class="grande2" name="nombre"/>
            <span class="negrillaenter ">C.I.</span>
            <input type="text" class="grande2" name="ci"/>
            <span class="negrillaenter ">direccion</span>
            <input type="text" class="grande2" name="direccion"/>
            <span class="negrillaenter ">telefono</span>
            <input type="text" class="grande2" name="telefono"/>
            <span class="negrillaenter">fecha de nacimiento: </span>
            <input id="edad" type="date" name="edad" class="fecha medio">
            <span class="negrillaenter" >correo electronico</span>
            <input type="text" class="grande" name="correo"/>
            <span class="negrillaenter ">cuenta</span>
            <input type="text" class="medio" name="cuenta"/>      
            <span class="negrillaenter">contraseña</span>
            <input type="password" class="medio" name="contraseña" id="contraseña">
            
            <div class='centrar'>
                <button class="medio" id="bvalidar" onclick="crearCliente()">REGISTRAR</button>
            </div>
        </div>
    </body>
</html>
