<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Inventario</title>
        <link href="../Estilo/estilos.css" rel="stylesheet" type="text/css"/>
        <script src="../JavaScript/Plugin/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="../JavaScript/Plugin/jquery-ui.js" type="text/javascript"></script>
        <script src="../JavaScript/Plugin/HERRAMIENTAS.js" type="text/javascript"></script>
        <script src="../JavaScript/RegistroInventario.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="formulario">
            <h1>Registro de Compra</h1>
            <div class='centrar'>
                <input type='text' class='grande centrarTexto' name='buscadorNombre' placeholder="Buscadar por Nombre"/>
                <select id='tipo' class="normal">
                    <option value='Todos'>------ TIPO ------</option>
                    <option value='Ingredientes'>Ingredientes</option>
                    <option value='Bebidas'>Bebidas</option>
                    <option value='Ventas'>Ventas</option>
                </select>
                <select id='unidad' class="normal">
                    <option value='0'>--- MEDIDA ---</option>
                </select>
                <select id='sucursal' class="medio">
                    <option value='0'>--------- SUCURSAL ---------</option>
                </select>
                <select id='almacen' class="medio">
                    <option value='0'>--------- ALMACEN ---------</option>
                </select>
                <button onclick='buscarProducto()' class='medio'>BUSCAR</button>
            </div>
            <table>
                <thead>
                    <th><div class='grande'>Nombre del Producto</div></th>
                    <th><div class='normal'>Cantidad</div></th>
                    <th><div class='medio'>Medida</div></th>
                    <th><div class='medio'>Tipo</div></th>
                    <th><div class='normal'>Precio Compra</div></th>
                    <th><div class='normal'>Precio Venta</div></th>
                </thead>
                <tbody>
                    <tr><td><div class='grande'>Nombre del Producto</div></td>
                    <td><div class='normal'>Cantidad</div></td>
                    <td><div class='medio'>Medida</div></td>
                    <td><div class='medio'>Tipo</div></td>
                    <td><div class='normal'>Precio Compra</div></td>
                    <td><div class='normal'>Precio Venta</div></td><tr>
                </tbody>
            </table>
            <div class='centrar clear'>
                <button onclick='registroCompra()' class='medio'>REGISTRAR</button>
            </div>
        </div>
        
    </body>
</html>
