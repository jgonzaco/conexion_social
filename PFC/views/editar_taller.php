<body>
<div class="container-fluid">
    <?php
    $volverTaller=true;//Variable identificar la navegación de la página
    $title = "TALLERES";//Cabecera Talleres
    include('components/header.php');// Se incluye el archivo de la cabecera
    ?>
    <div class="row">
        <div class="col-lg-12">
            <h1>Editar Datos del Taller</h1><!--Título principal para editar los datos-->
            <form method="post" action="">
                <!--Formulario para realizar los cambios-->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : $nombre; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido1" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="apellido1" name="apellido1" value="<?php echo isset($_POST['apellido1']) ? $_POST['apellido1'] : $apellido1; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido2" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" id="apellido2" name="apellido2" value="<?php echo isset($_POST['apellido2']) ? $_POST['apellido2'] : $apellido2; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="origen" class="form-label">Origen</label>
                    <input type="text" class="form-control" id="origen" name="origen" value="<?php echo isset($_POST['origen']) ? $_POST['origen'] : $origen; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fnacimiento" class="form-label">Fecha de Realización</label>
                    <input type="date" class="form-control" id="fnacimiento" name="fnacimiento" value="<?php echo isset($_POST['fnacimiento']) ? $_POST['fnacimiento'] : $fnacimiento; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="taller" class="form-label">Taller</label>
                    <input type="text" class="form-control" id="taller" name="taller" value="<?php echo isset($_POST['taller']) ? $_POST['taller'] : $taller; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Participación</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="participacion_si" name="participacion" value="Si" <?php if (isset($participacion) && $participacion == "Si") echo 'checked'; ?> required>
                            <label class="form-check-label" for="participacion_si">Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="participacion_no" name="participacion" value="No" <?php if (isset($participacion) && $participacion == "No") echo 'checked'; ?> required>
                            <label class="form-check-label" for="participacion_no">No</label>
                        </div>
                    </div>
                </div>

                <!-- Campos ocultos para los valores originales -->
                <input type="hidden" name="nombre_original" value="<?php echo $nombre; ?>">
                <input type="hidden" name="apellido1_original" value="<?php echo $apellido1; ?>">
                <input type="hidden" name="apellido2_original" value="<?php echo $apellido2; ?>">
                <input type="hidden" name="taller_original" value="<?php echo $taller; ?>">

                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>
        </div>
        <?php if (!empty($errores))://Muestra los errores ?>
            <div>
                <ul>
                    <?php foreach ($errores as $error): ?>
                        <li><?php echo ($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>