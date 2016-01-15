$(document).ready(function (){
   $(".fecha").datepicker();
   $(".fecha").val(fechaActual());
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
