<body>
<div class="container-fluid">
<?php
$volver=true;//Variable identificar la navegación de la página
$title = "TALLERES";//Cabecera talleres
include('components/header.php');// Se incluye el archivo de la cabecera
?>
    <div class="row">
        <div class="col-lg-12">
            <h1>REGISTRO DE PERSONAS EN TALLERES</h1><!--Título principal talleres-->
            <div id="buscador">
                <form method="GET" action=""><!--Formulario búsqueda taller-->
                    <div class="form-inline">
                        <label>Taller a buscar:</label>
                        <input type="text" name="taller">
                        <input type="submit" value="Buscar" name="buscar_taller">
                        <input type="submit" value="Restaurar" name="restaurar">
                        <!--Creación botón derecha para inscribir usuari@-->
                        <input type="button" class="btn btn-success boton-derecha" name="inscripcion_usuarios" value="Inscripciones" onclick="window.location.href='../controllers/inscripcion_talleresController.php'">
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>

