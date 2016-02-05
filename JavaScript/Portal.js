var estadomenu = false;
var estado = true;
$(document).ready(function () {
    var elemento = $("#divprincipalp");
    var posicion = elemento.position();
    $("#divinvisible").css({
        left: posicion.left, top: (posicion.top + 27)
    });

    $("#menu").mouseover(function () {

        $("#contenedormenu").animate({
            height: "250px"
            , width: "250px"

        }, 500, function () {

        });
    });

    $("#divprincipalp").mouseover(function () {


        $("#contenedormenu").animate({
            height: "0"
            , width: "0"
        }, 500, function () {
            estadmenu = false;

        });


    });
    /*    $("p").hover(function(){
     $(this).css("background-color", "yellow");
     }, function(){
     $(this).css("background-color", "pink");
     });*/
});
function abrirsubmenu() {
    if ($("#divsubmenu").data("estado") === "1" || $("#divsubmenu").data("estado") === 1) {
        $("#submenu").animate({
            left: "658px"

        }, 500, function () {
            var img = "../Estilo/previous.png";
            $("#divsubmenu").css("backgroundImage", "url(" + img + ")");
            $("#divsubmenu").data("estado", '0');
        });
    }
    else
        $("#submenu").animate({
            left: "874px"

        }, 500, function () {
            var img = "../Estilo/next.png";
            $("#divsubmenu").css("backgroundImage", "url(" + img + ")");
            $("#divsubmenu").data("estado", '1');
        });
}
$(window).resize(function () {
    var elemento = $("#divprincipalp");
    var posicion = elemento.position();
    $("#divinvisible").css({
        left: posicion.left, top: (posicion.top + 27)
    });
});
function cambiarMenu(url) {
    $("#frameprincipal").attr('src', url);
}
