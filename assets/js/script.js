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
    var id=document.getElementById('id').value;
    var nombre=document.getElementById('txtNombre').value;
    var apellido=document.getElementById('txtApellido').value;

    if (nombre == '' && apellido == '') {
        alert("llena los campos");
        return;
    } 

    var peticion= new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            document.getElementById('cuerpo').innerHTML=this.responseText;
            recargar();
            limpiar();
            document.getElementById('btn').value="ingresar";
            document.getElementById('btn').innerHTML="Agregar";

        }
    };

    var datos = 'nombre='+nombre+'&apellido='+apellido;
        if (this.value=="editar") {
            datos+='&id='+id;
        }

    peticion.open('POST','usuarios/'+this.value);
    peticion.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    peticion.send(datos);
}


function eliminar() 
{
    var peticion= new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            recargar();
        }
    };
    // Aca procederiamos con la eliminacion del registro
    peticion.open('GET','usuarios/delete/'+this.value);
    peticion.send();
}


function limpiar() {
    document.getElementById('txtNombre').value = '';
    document.getElementById('txtApellido').value = '';
}


function actualizar() 
{
    var peticion= new XMLHttpRequest();
    peticion.onreadystatechange=function(){
        if (this.readyState==4) {
            document.getElementById('frm').innerHTML=this.responseText;
            recargar();
        }
    };
    // Aca procederiamos con la actualizacion del registro
    peticion.open('GET','usuarios/getById/'+this.value);
    peticion.send();
}

