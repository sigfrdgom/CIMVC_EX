<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        <?= $titulo?>
    </h1>

    <div id="frm" style="border: 1px dotted blue;">

        <input type="hidden" id="id">
        <label for="txtNombre">Nombre</label>
        <input type="text" id="txtNombre" required> <br>
        <label for="txtApellido">Apellido</label>
        <input type="text" id="txtApellido" required> <br>

        <button id="btn" value="ingresar">Agregar</button>
        

    </div>
<br>
    <div>
        <!-- Creating a table -->
        <table style="border: dotted 1px blue">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody id="cuerpo">

            </tbody>
        </table>
    </div>

    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>
</html>