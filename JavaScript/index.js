$(document).ready(function (){
   $(".fecha").datepicker(); 
});
function popup(){
       $(".background").visible(); 
       $(".popup").visible(); 
       $(".popup").centrar(); 
}
function cerrarpopup(){
    
     $(".background").ocultar(); 
       $(".popup").ocultar(); 
}
function validacion(){
    var v=/^[A-Za-z\.\s\xF1\xD1]+$/;
    var er=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/;
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
        if ((er.test($('#correo').val()))===false)
        {
            
            alert("por favor corrija su correo electronico")
        }
 }  
 function validar1()
 {
     var nombres=$("input[name=nombre]").val().trim();
     var edad=$("input[name=edad]").val().trim();
     
     if(!validar("texto",nombres) )
     {
        text +="<p>por favor instrodusca su nombre correctamente</p>";
     }
    if ($('#contraseña').val().length===0)
            {  text +="<p>introduzca un password por favor"   ;     }
   
        if ($('#contraseña').val().length<4)
         {
            text +="<p>el password tiene q tener mas de 4 caracteres</p>"   ;     
         }
              if ($('#contraseña').val().length>8)
         {
            text +="<p>el password tiene q tener menos de 8 caracteres</p>"   ;     
         }
         if (!validar("numero",edad))
         {
             
         text +="<p>no colocar caracteres</p>"   ;            ;
         }
         if(text.val().length===0)
         {
             alert("se inserto correctamente la cuenta");
             
         }
         else
         {  
             print(text);
         }
             
        
 }
 