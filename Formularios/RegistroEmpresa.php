<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../Estilo/estilos.css" rel="stylesheet" type="text/css"/>
        <link href="../Estilo/EstiloFecha.css" rel="stylesheet" type="text/css"/>
        <script src="../JavaScript/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="../JavaScript/jquery-ui.js" type="text/javascript"></script>
        <script src="../JavaScript/HERRAMIENTAS.js" type="text/javascript"></script>
        <script src="../JavaScript/RegistroEmpresa.js" type="text/javascript"></script>
    <a href="../Clases/HERRAMIENTASPHP.php"></a>
    <title></title>
</head>
<body>
    <?php
    include_once "../Clases/CONN.php";
    include_once "../Clases/REGIONAL.php";
    ?>
    <div class="cuerpoFormulario">
        <h1 class="centrar">REGISTRO DE EMPRESA</h1><br>
        <div class="contenedor50">
            <span class="negrilla grande2">EMPRESA</span><br>
            <div id="fotoperfil">

                <img id="logo" src="../JavaScript/img376.jpg" alt="" onclick="cargarImagen(this, 1)" class="point"/>
                <input type="file" id="fotocargar" style="display:none" onchange="cargarImagen(this, 2)">
                <canvas id="canvas" style="display: none"></canvas>
            </div>
            <span class="negrillaenter">Nombre</span>
            <input type="text" class="grande2" name="nombre">
            <span class="negrillaenter">Razon social</span>
            <input type="text" class="grande2" name="razonsocial"><br>

            <br>
            <br>
            <span class="negrilla grande2">SUCURSAL</span><br>
            <span class="negrillaenter">Nombre</span>
            <input id="nombres" type="text" class="grande2" name="nombre">
            <span class="negrillaenter">Nit</span>
            <input type="text" class="grande2" name="nit"><br>
            <span class="negrillaenter">Direccion</span>
            <input type="text" class="grande2" name="direccions"><br>
            <span class="negrillaenter">Regional</span>
            <select id="regional" class="medio">
                <?php
                $con = new CONN("rest", "wdigital");
                $regional = new REGIONAL($con);
                $listaregional = $regional->todo();
                $resultado = "<option value='0'>-seleccione regional-</option>";
                if ($listaregional !== null) {
                    for ($index = 0; $index < count($listaregional); $index++) {
                        $resultado .= "<option value='"
                                . $listaregional[$index]->id_regional
                                . "'>"
                                . $listaregional[$index]->descripcion
                                . "</option>";
                    }
                }
                echo "$resultado";
                ?>
            </select>


        </div>
        <div class="contenedor50">

          
            <span class="negrilla grande2">PERSONAL</span>
            <span class="negrillaenter">Nombre</span>
            <input id="nombrep" type="text" class="grande2" name="nombre">
            <span class="negrillaenter">Cuenta</span>
            <input type="text" class="grande2" name="cuenta"><br>
            <span id="rol" class="negrillaenter">Rol</span>
            <select>
                <option value="0">-seleccione un rol-</option>
                <option value="1">administrador</option>
                <option value="2">vendedor</option>
                <option value="3">almacenero</option>
            </select>           <br>
                  <span class="negrillaenter ">Telefono</span>
            <input type="text" class="grande2" name="telefono"/><br><br>
            <span class="negrillaenter">Sueldo</span>
            <input type="text" class="grande2" name="sueldo"><br>
            <span class="negrillaenter ">Direccion</span>
            <input type="text" class="grande2" name="direccionp"/>
            <span class="negrillaenter grande">Fecha Contratado</span>
            <input type="date" class="grande2 fecha medio" name="fechacontratado"><br>
            <button onclick="crearRestaurante()" > registrar</button>
        </div>
    </div>
</body>
</html>
