 <body>
<div class="container-fluid">
<?php
$volver=true;//Variable identificar la navegación de la página
$title = "CASOS PARTICULARES";//Cabecera casos particulares
include('components/header.php');// Se incluye el archivo de la cabecera
?>
    <div class="row">
        <div class="col-lg-10">
            <div id="buscador" >
                <form method="POST" action=""><!--Formulario búsqueda de usuari@-->
                    <label>Persona a buscar:</label><br>
                    <label>Nombre/apellidos: </label><input type="text" name="persona"> &nbsp;
                    <input type="submit" value="Buscar" name="buscar_persona">
                    <input type="submit" value="Restablecer" name="restablecer">
                </form>
                <br>
            </div>
        </div>
        <div class="col-lg-2">
            <div id="buscadorCasosActivos" >
                <form method="POST" action=""><!--Formulario filtrar usuari@ activo-->
                    <input type="submit" value="Casos Abiertos" name="buscarCasosActivos">
                </form>
                <br>
            </div>
        </div>

    </div>
</div>
