function Linea(x, y, x2, y2, grosor, color,id) {
    this.x = x;
    this.y = y;
    this.x2 = x2;
    this.y2= y2;
    this.grosor = grosor;
    this.id = id;
    this.color = color;
    this.dibujar = function(contexto) {
        contexto.beginPath();
        contexto.strokeStyle=this.color;
        contexto.lineWidth=this.grosor;
        if(this.x2==this.x && this.y2==this.y){
            contexto.beginPath();
            contexto.arc(this.x, this.y, this.grosor/2, 0, Math.PI*2, true);
            contexto.closePath();
            contexto.fill();
        }else{
            contexto.moveTo(this.x,this.y);
            contexto.lineTo(this.x2,this.y2);
            contexto.closePath();
            contexto.stroke();
        }
        
    };
}
function Rectangulo(x, y,ancho, alto, grosor, color,id) {
    this.x = x;
    this.y = y;
    this.ancho = ancho;
    this.alto = alto;
    this.grosor = grosor;
    this.id = id;
    this.color = color;
    this.dibujar = function(contexto) {
        contexto.beginPath();
        contexto.strokeStyle=this.color;
        contexto.lineWidth=this.grosor;
        contexto.beginPath();
        contexto.rect(this.x,this.y,this.ancho,this.alto);
        if(ancho<0 && alto<0){
            contexto.rect(this.x+this.ancho,this.y+this.alto,this.ancho*-1,this.alto*-1);
        }
        if(ancho<0 && alto>=0){
            contexto.rect(this.x+this.ancho,this.y,this.ancho*-1,this.alto);
        }
        if(ancho>=0 && alto<0){
            contexto.rect(this.x,this.y+this.alto,this.ancho,this.alto*-1);
        }
        if(ancho>=0 && alto>=0){
            contexto.rect(this.x,this.y,this.ancho,this.alto);
        }
        contexto.closePath();
        contexto.fill();
    };
}
function Borrador(x, y,grosor, color,id) {
    this.x = x;
    this.y = y;
    this.grosor = grosor;
    this.id = id;
    this.color = color;
    this.dibujar = function(contexto) {
        contexto.beginPath();
        contexto.strokeStyle=this.color;
        contexto.lineWidth=this.grosor;
        contexto.beginPath();
        contexto.rect(this.x,this.y,this.ancho,this.alto);
        contexto.clearRect(this.x,this.y, grosor, grosor);
        contexto.closePath();
        contexto.stroke();
    };
}
