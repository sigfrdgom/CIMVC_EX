<input type="hidden" id="id" value="<?=  $usuario->id ?>">
<label for="txtNombre">Nombre</label>
<input type="text" id="txtNombre" required value="<?=  $usuario->nombre ?>" placeholder="nombres"> <br>
<label for="txtApellido">Apellido</label>
<input type="text" id="txtApellido" required value="<?=  $usuario->apellido ?>" placeholder="apellidos"> <br>

<button id="btn" value="editar">Guardar</button>
        