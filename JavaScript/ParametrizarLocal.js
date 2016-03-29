var accion = "";
var clickdown = false;
var listaForma = [];
var identificador = 0;
$(document).ready(function () {
    $(".btnBoceto:eq(0)").click();
    var offset = $("#boceto").offset();
    
});
function presionaMouse(e) {
    clickdown = true;
    var grosor = $("#rslrango").text();
    var offset = $("#boceto").offset();
    var x = e.pageX - offset.left;
    var y = e.pageY - offset.top;
    var color = $("#colorBoceto").val();
    if (accion === "lapiz") {
        var linea=new Linea(x,y,x,y,grosor,color,identificador);
        listaForma.push(linea);
        pintar();
    }
    if (accion === "linea") {
        var linea=new Linea(x,y,x,y,grosor,color,identificador);
        listaForma.push(linea);
        pintar();
    }
    if (accion === "rectangulo") {
        var rectangulo=new Rectangulo(x,y,0,0,grosor,color,identificador);
        listaForma.push(rectangulo);
        pintar();
    }
    if (accion === "borrador") {
        var borrador=new Borrador(x,y,grosor,color,identificador);
        listaForma.push(borrador);
        identificador++;
        pintar();
    }
}
function SueltaMouse(e) {
    clickdown = false;
     if (accion === "lapiz") {
         identificador++;
     }
}
function moverMouse(e) {
    if (clickdown) {
        var grosor = $("#rslrango").text();
        var offset = $("#boceto").offset();
        var x = e.pageX - offset.left;
        var y = e.pageY - offset.top;
        var color = $("#colorBoceto").val();
        if (accion === "lapiz") {
            var ultimoPunto=listaForma[listaForma.length-1];
            ultimoPunto.x2=x;
            ultimoPunto.y2=y;
            var linea=new Linea(x,y,x,y,grosor,color,identificador);
            listaForma.push(linea);
            pintar();
        }
        if (accion === "linea") {
            var ultimoPunto=listaForma[listaForma.length-1];
            ultimoPunto.x2=x;
            ultimoPunto.y2=y;
            pintar();
        }
        if (accion === "rectangulo") {
            var ultimoPunto=listaForma[listaForma.length-1];
            ultimoPunto.ancho=x-ultimoPunto.x;
            ultimoPunto.alto=y-ultimoPunto.y;
            pintar()
        }
        if (accion === "borrador") {
            var borrador=new Borrador(x,y,grosor,color,identificador);
            listaForma.push(borrador);
            identificador++;
            pintar();
        }
    }
    if (accion === "borrador") {
        var offset = $("#boceto").offset();
        var left = e.pageX;
        var top = e.pageY;
        var grosor = $("#rslrango").text();
        $("#borradorBoceto").css({
           top:top,
           left:left,
           width:parseInt(grosor),
           height:parseInt(grosor)
        });
    }

}
function presionarOption(tipo, ele) {
    $(".btnBoceto").css({
        "box-shadow": "1px 2px 1px 2px #454545",
        "background-color": "white"
    });
    $(ele).css({
        "box-shadow": "0px 0px 0px 2px black",
        "background-color": "#D6D6D6"
    });
    accion = tipo;
}
function cambiarGrosor(valor) {
    $("#rslrango").text(valor);
}
function pintar() {
    var canvas = document.getElementById("boceto");
    var ctx = canvas.getContext("2d");
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    for (var i = 0; i < listaForma.length; i++) {
        listaForma[i].dibujar(ctx);
    }
}
