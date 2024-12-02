<body>
<div class="container-fluid">
<?php
$volver=true;
$title = "TALLERES";
include('components/header.php');
?>
    <div class="row">
        <div class="col-lg-12">
            <h1>REGISTRO DE PERSONAS EN TALLERES</h1>
            <div id="buscador">
                <form method="GET" action="">
                    <div class="form-inline">
                        <label>Taller a buscar:</label>
                        <input type="text" name="taller">
                        <input type="submit" value="Buscar" name="buscar_taller">
                        <input type="submit" value="Restaurar" name="restaurar">
                        <input type="button" class="btn btn-success boton-derecha" name="inscripcion_usuarios" value="Inscripciones" onclick="window.location.href='../controllers/inscripcion_talleresController.php'">
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>

