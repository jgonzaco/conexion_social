<body>
<div class="container-fluid">
    <?php
    $volverTaller=true;//Variable identificar la navegación de la página
    $title = "TALLERES";//Cabecera Talleres
    include('components/header.php');// Se incluye el archivo de la cabecera
    ?>

    <div class="row">
        <div class="col text-center"><!--Realización de formulario inscripción al taller-->
            <h1>Cuestionario de Inscripción:</h1><!--Título principal para introducir los datos-->
            <form method="post" action="">

                <p>
                    <label>NOMBRE:</label><input type='text' name='nombre' required>
                </p>

                <p>
                    <label>PRIMER APELLIDO:</label><input type='text' name='apellido1' required>
                </p>

                <p>
                    <label>SEGUNDO APELLIDO:</label><input type='text' name='apellido2' required>
                </p>

                <p>
                    <label>ORIGEN:</label><input type='text' name='origen' required>
                </p>

                <p>
                    <label>FECHA DE REALIZACION:</label><input type='date' name='fnacimiento' required>
                </p>

                <p>
                    <label>NOMBRE DEL TALLER:</label><input type='text' name='taller' required>
                </p>

                <p>
                    <input type='submit' value="Insertar" name='insertar'  required>
                </p>

            </form>
        </div>
    </div>
</div>
