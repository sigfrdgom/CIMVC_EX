window.addEventListener('load',recargar);

// Metodo recargar, para poder cargar la informacion
function recargar(){
    var peticion= new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            document.getElementById('cuerpo').innerHTML=this.responseText;
            asignarEventos();
        }
    };

    peticion.open('GET','usuarios/recargar');

    peticion.send();
}


// Contorlador de eventos
 function asignarEventos() {
    document.getElementById('btn').addEventListener('click',accion);

    var btnEdit=document.getElementsByClassName('btnEditar');
    var btnElim=document.getElementsByClassName('btnEliminar');

    for (var i = 0; i < btnEdit.length; i++) {
        btnEdit[i].addEventListener('click',actualizar);
        btnElim[i].addEventListener('click',eliminar);
    }

 }

function accion() 
{
    var nombre=document.getElementById('txtNombre').value;
    var apellido=document.getElementById('txtApellido').value;

    var peticion= new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            document.getElementById('cuerpo').innerHTML=this.responseText;
            recargar();
        }
    };

    peticion.open('POST','usuarios/ingresar');
    peticion.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    peticion.send('nombre='+nombre+'&apellido='+apellido);
}


function eliminar() 
{
    
    alert('acccion realizada eliminar'); 
}


function actualizar() 
{
    alert('acccion realizada editar'); 
}