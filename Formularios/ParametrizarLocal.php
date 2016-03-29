<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Parametrizacion del local</title>
        <link href="../Estilo/estilos.css" rel="stylesheet" type="text/css"/>
        <script src="../JavaScript/Plugin/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="../JavaScript/Plugin/jquery-ui.js" type="text/javascript"></script>
        <script src="../JavaScript/Plugin/HERRAMIENTAS.js" type="text/javascript"></script>
        <script src="../JavaScript/ParametrizarLocal.js" type="text/javascript"></script>
        <script src="../JavaScript/Clases.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="formulario">
            <h1>Parametrizacion de Ambientes</h1>
            <div class='contenedor80'>
                <div class='negrilla'>BOCETO</div>
                <canvas id="boceto" width="690" height="444" onmousedown="presionaMouse(event)" onmouseout="SueltaMouse(event)"  onmousemove="moverMouse(event)" onmouseup="SueltaMouse(event)">
                    
                </canvas>
                <input type='color' id="colorBoceto"/>
                <input type='range' min="1" max="20" value="1" step="1" id="grosor"  onchange="cambiarGrosor(this.value)" class="grande"/>
                <span class='negrilla' id="rslrango">1</span>
                <div class='btnBoceto' onclick="presionarOption('lapiz',this)">
                    <img src="../Imagen/lapiz.svg" alt="Lapíz"/>
                </div>
                <div class='btnBoceto' onclick="presionarOption('linea',this)">
                    <img src="../Imagen/linea.svg" alt="Linea"/>
                </div>
                <div class='btnBoceto' onclick="presionarOption('rectangulo',this)">
                    <img src="../Imagen/rectangulo.svg" alt="Rectangulo"/>
                </div>
                <div class='btnBoceto' onclick="presionarOption('borrador',this)">
                    <img src="../Imagen/borrador.svg" alt="Atras"/>
                </div>
                <div class='btnBoceto' onclick="presionarOption('atras',this)">
                    <img src="../Imagen/atras.svg" alt="Atras"/>
                </div>
                <div class='btnBoceto' onclick="presionarOption('siguiente',this)">
                    <img src="../Imagen/sig.svg" alt="Siguientes"/>
                </div>
                
            </div>
            <div class='contenedor20' id="contenedorLocales">
                <div class='itemLocal'>
                    <div class='negrilla centrar'>
                        AMBIENTES
                    </div>
                    <div class='foto'>
                        <img src="../Imagen/administacion.svg">
                    </div>
                    <span class='negrilla nombre'>Balcon</span>
                </div>
            </div>
        </div>
        <div id="borradorBoceto" onmousedown="presionaMouse(event)" onmousemove="moverMouse(event)" onmouseup="SueltaMouse(event)"></div>
    </body>
</html>
