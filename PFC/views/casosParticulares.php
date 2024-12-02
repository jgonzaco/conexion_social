<body>
<div class="container-fluid">
<?php
$volver=true;
$title = "CASOS PARTICULARES";
include('components/header.php');
?>
    <div class="row">
        <div class="col-lg-10">
            <div id="buscador" >
                <form method="POST" action="">
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
                <form method="POST" action="">
                    <input type="submit" value="Casos Abiertos" name="buscarCasosActivos">
                </form>
                <br>
            </div>
        </div>

    </div>
</div>
