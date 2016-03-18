<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>LOGIN</title>
        <link href="../Estilo/estilos.css" rel="stylesheet" type="text/css"/>
        <script src="../JavaScript/Plugin/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="../JavaScript/Plugin/jquery-ui.js" type="text/javascript"></script>
        <script src="../JavaScript/Plugin/HERRAMIENTAS.js" type="text/javascript"></script>
        <script src="../JavaScript/Login.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="formulario">
            <h1>Registro de Compra</h1>
            <div id="compraRegistro">
                <div class='contenedor50'>
                    <span class='negrilla'>Foto</span>
                    <div id="fotoperfil">
                        <img src="../Imagen/food.svg" alt="Comida" onclick="cargarImagen(this,1)" class="point"/>
                    </div>
                    <span class='negrillaenter'>Nombre del producto</span>
                    <input type='text' class='grande' name='nombre'/>
                    <span class='negrillaenter'>Cantidad</span>
                    <input type='number' min="0" step="0.5" class='normal' name='cantidad'/><br>
                    <span class='negrilla'>Unidad de Medida</span><span class='mas' onclick="masunida(this)">(+)</span><br>
                    <select id='unidad' class="medio">
                        <option value='0'>Paquete</option>
                        <option value='1'>Unidad</option>
                    </select>
                    <span class='negrillaenter'>Tipo de Producto</span>
                    <select id='tipo' class="medio">
                        <option value='Ingredientes'>Ingredientes</option>
                        <option value='Bebidas'>Bebidas</option>
                        <option value='Para Ventas'>Para Ventas</option>
                    </select>
                </div>
                <div class='contenedor50'>
                    <span class='negrillaenter'>Precio Compra</span>
                    <input type='number' min="0" step="0.5" class='normal' name='preciocompra'/>
                    <span class='negrillaenter'>Precio Venta</span>
                    <input type='number' min="0" step="0.5" class='normal' name='precioventa'/>
                    <span class='negrillaenter'>Stock min</span>
                    <input type='number' min="0" step="0.5" class='normal' name='cantmin'/>
                    <span class='negrillaenter'>Sucursal</span>
                    <select id='sucursal' class="grande">
                        <option value='Ingredientes'>Ingredientes</option>
                        <option value='Bebidas'>Bebidas</option>
                        <option value='Para Ventas'>Para Ventas</option>
                    </select>
                    <span class='negrillaenter'>Almacen</span>
                    <select id='almacen' class="grande">
                        <option value='Ingredientes'>Ingredientes</option>
                        <option value='Bebidas'>Bebidas</option>
                        <option value='Para Ventas'>Para Ventas</option>
                    </select>
                    <span class='negrillaenter'>Fecha Comprada</span>
                    <input type='text' class='normal' name='fecha'/>
                </div>    
            </div>
            <div class='centrar clear'>
                <button onclick='evento()' class='medio'>REGISTRAR</button>
            </div>
        </div>
    </body>
</html>
