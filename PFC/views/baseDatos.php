<body>
<div class="container-fluid">
<?php
$volver=true;//Variable identificar la navegación de la página
$title = "BASE DE DATOS";//Cabecera base de datos
include('components/header.php');// Se incluye el archivo de la cabecera
?>
    <div class="row">
        <div class="col-lg-12">
            <div id="buscador1">
                <form method="POST" action="" autocomplete="off"><!--Formulario para búsqueda expediente-->
                    <label>Expediente: </label><input type="text" name="expediente" required> &nbsp;
                    <input type="submit" value="Buscar" name="buscarExpediente">
                </form>
                <br>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <div id="buscador">
                <form method="POST" action="" autocomplete="off"><!--Formulario para búsqueda profesional técnico / TS-->
                    <label>Técnic@/Trabajador@ Social: </label><input type="text" name="profesionales" required>&nbsp;
                    <input type="submit" value="Buscar" name="buscarProfesionales">
                </form>
                <br>
            </div>
        </div>
        <div class="col-lg-2">
            <div id="botones">
                <form method="POST" action="" autocomplete="off"><!--Formulario para botones insertar o restablecer-->
                    <input type="submit" value="Restablecer" name="restablecer">
                    <input type="button" class="btn btn-success boton-derecha" name="button" value="Insertar" onclick="window.location.href='../controllers/insertarController.php'"><!--Redirige a insertar.php-->
                </form>
                <br>
            </div>
        </div>
    </div>
</div>

