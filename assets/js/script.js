window.addEventListener('load',recargar);

// Metodo recargar, para poder cargar la informacion
function recargar(){
    var peticion= new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            document.getElementById('cuerpo').innerHTML=this.responseText;
        }
    };

    peticion.open('GET','usuarios/recargar');

    peticion.send();
}