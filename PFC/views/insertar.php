<body>
<div class="container-fluid">
    <?php
    $volverbd=true;//Variable identificar la navegación de la página
    $title = "NUEVO USUARI@";//Cabecera Nuevo usuari@
    include('components/header.php');// Se incluye el archivo de la cabecera
    ?>
    <div class="row">
        <div class="col text-center">
            <h1>Introduzca sus datos</h1><!--Título principal para introducir los datos-->
            <form method="POST" action="../controllers/insertarController.php" autocomplete="off"> <!--Formulario insertar usuari@-->

                <div>
                    <label>Email del Técnic@: </label> <input type="email" name="tecnica" required>
                </div>

                <div>
                    <label>Trabajador@ Social: </label> <input type="text" name="ts" required>
                </div>

                <div>
                    <label>Fecha derivación: </label> <input type="date" name="fderivacion" required>
                </div>

                <div>
                    <label>Nombre: </label> <input type="text" name="nombre" required>
                </div>

                <div>
                    <label>Primer Apellido: </label> <input type="text" name="apellido1" required>
                </div>

                <div>
                    <label>Segundo Apellido: </label> <input type="text" name="apellido2" required>
                </div>

                <div>
                    <label>Ingresos: </label> <input type="text" name="ingresos" required>
                </div>

                <div>
                    <label>Fecha Nacimiento: </label> <input type="date" name="fnacimiento" required>
                </div>

                <div>
                    <label>Género: </label> <input type="text" name="genero" required>
                </div>

                <div>
                    <label>Procedencia: </label> <input type="text" name="procedencia" required>
                </div>

                <div>
                    <label>Teléfono: </label> <input type="number" name="telefono" required>
                </div>

                <div>
                    <label>Intervención: </label> <input type="text" name="intervencion" required>
                </div>

                <div>
                    <label>Fecha Finalización: </label> <input type="date" name="ffinalizacion">
                </div>

                <div>
                    <input type="submit" value="Insertar" name="registro">
                </div>


            </form>
        </div>
    </div>
</div>