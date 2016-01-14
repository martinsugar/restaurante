
function carga()
{
    posicion=0;
   
    // IE
    if(navigator.userAgent.indexOf("MSIE")>=0) navegador=0;
    // Otros
    else navegador=1;
}
 
function evitaEventos(event)
{
    // Funcion que evita que se ejecuten eventos adicionales
    if(navegador==0)
    {
        window.event.cancelBubble=true;
        window.event.returnValue=false;
    }
    if(navegador==1) event.preventDefault();
}
 
function comienzoMovimiento(event, id)
{
    elMovimiento=document.getElementById(id);
   
     // Obtengo la posicion del cursor
    if(navegador==0)
     {
        cursorComienzoX=window.event.clientX+document.documentElement.scrollLeft+document.body.scrollLeft;
        cursorComienzoY=window.event.clientY+document.documentElement.scrollTop+document.body.scrollTop;
 
        document.attachEvent("onmousemove", enMovimiento);
        document.attachEvent("onmouseup", finMovimiento);
    }
    if(navegador==1)
    {   
        cursorComienzoX=event.clientX+window.scrollX;
        cursorComienzoY=event.clientY+window.scrollY;
       
        document.addEventListener("mousemove", enMovimiento, true);
        document.addEventListener("mouseup", finMovimiento, true);
    }
    elComienzoX=parseInt(elMovimiento.style.left);
    elComienzoY=parseInt(elMovimiento.style.top);
    // Actualizo el posicion del elemento
    elMovimiento.style.zIndex=++posicion;
   
    evitaEventos(event);
}
 
function enMovimiento(event)
{ 
    var xActual, yActual;
    if(navegador==0)
    {   
        xActual=window.event.clientX+document.documentElement.scrollLeft+document.body.scrollLeft;
        yActual=window.event.clientY+document.documentElement.scrollTop+document.body.scrollTop;
    } 
    if(navegador==1)
    {
        xActual=event.clientX+window.scrollX;
        yActual=event.clientY+window.scrollY;
    }
   
    elMovimiento.style.left=(elComienzoX+xActual-cursorComienzoX)+"px";
    elMovimiento.style.top=(elComienzoY+yActual-cursorComienzoY)+"px";
 
    evitaEventos(event);
}
 
function finMovimiento(event)
{
    if(navegador==0)
    {   
        document.detachEvent("onmousemove", enMovimiento);
        document.detachEvent("onmouseup", finMovimiento);
    }
    if(navegador==1)
    {
        document.removeEventListener("mousemove", enMovimiento, true);
        document.removeEventListener("mouseup", finMovimiento, true);
    }
}
 
window.onload=carga;

function sumar(){
    
  var var1=parseInt($('#valor1').val()) ;
  var var2=parseInt($('#valor2').val()) ;
   var resultado =var1+var2; 
$('#resultado').val(resultado);
    alert("resultado= "+resultado);
}
/*function sigueme()
{
//Capto las coordenads del puntero.
var x = window.event.x;
var y = window.event.y;

//Y se las coloco al div.
$("#siguelo").style.left = x + "px";
$("#siguelo").style.top = y + "px";
}*/
function validacion(){
    var v=/^[A-Za-z\.\s\xF1\xD1]+$/;
        if ($('#contraseña').val().length===0)
            { alert("ponga un password por favor"); }
    else{
        if ($('#contraseña').val().length<4)
         {
            alert("el password tiene q tener mas de 4 caracteres")        
         }
        else
        {
            if ($('#contraseña').val().length>8)
            {
                alert("el password tiene q tener menos de 8 caracteres")}
            }
        }
        if ((v.test($('#nombre').val()))===true)
            {
                alert("se inserto correctamente");
            }
     else 
        {alert("porfavor no coloque numeros ni simbolos en los campos nombre, apellidos");}
      
        if ($('#selecdepartamento').selectIndex==="seleccione un departamento")
        {
            alert("porfavor seleccione un departamento")
        }
 }  
 