<body>
<div class="container-fluid">
    <?php
    $volverbd=true;//Variable identificar la navegación de la página
    $title = "MODIFICAR BASE DE DATOS";//Cabecera Modificar base de datos
    include('components/header.php');// Se incluye el archivo de la cabecera
    ?>

  <div class="row">
    <div class="col-lg-12">
      <h1>SEGUIMIENTO</h1><!--Título principal Seguimiento-->
      <form method="POST" action="">
        <!-- Campos visibles del formulario con los valores a editar -->
        <div class="mb-3">
          <label for="id" class="form-label">Expediente</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo isset($_POST['id']) ? $_POST['id'] : $id; ?>" required>
        </div>
        <div class="mb-3">
          <label for="ts" class="form-label">Trabajador Social</label>
            <input type="text" class="form-control" id="ts" name="ts" value="<?php echo isset($_POST['ts']) ? $_POST['ts'] : $ts; ?>" required>
        </div>
        <div class="mb-3">
          <label for="fechaDerivacion" class="form-label">Fecha Derivación</label>
            <input type="date" class="form-control" id="fechaDerivacion" name="fechaDerivacion" value="<?php echo isset($_POST['fechaDerivacion']) ? $_POST['fechaDerivacion'] : $fechaDerivacion; ?>" required>
        </div>
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
          <label for="ingresos" class="form-label">Ingresos</label>
            <input type="text" class="form-control" id="ingresos" name="ingresos" value="<?php echo isset($_POST['ingresos']) ? $_POST['ingresos'] : $ingresos; ?>" required>
        </div>
        <div class="mb-3">
          <label for="fnacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fnacimiento" name="fnacimiento" value="<?php echo isset($_POST['fnacimiento']) ? $_POST['fnacimiento'] : $fnacimiento; ?>" required>
        </div>
        <div class="mb-3">
          <label for="genero" class="form-label">Género</label>
            <input type="text" class="form-control" id="genero" name="genero" value="<?php echo isset($_POST['genero']) ? $_POST['genero'] : $genero; ?>" required>
        </div>
        <div class="mb-3">
          <label for="procedencia" class="form-label">Procedencia</label>
            <input type="text" class="form-control" id="procedencia" name="procedencia" value="<?php echo isset($_POST['procedencia']) ? $_POST['procedencia'] : $procedencia; ?>" required>
        </div>
        <div class="mb-3">
          <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo isset($_POST['telefono']) ? $_POST['telefono'] : $telefono; ?>" required>
        </div>
        <div class="mb-3">
          <label for="intervencion" class="form-label">Intervención</label>
            <input type="text" class="form-control" id="intervencion" name="intervencion" value="<?php echo isset($_POST['intervencion']) ? $_POST['intervencion'] : $intervencion; ?>" required>
        </div>
        <div class="mb-3">
          <label for="finalizacion" class="form-label">Finalización</label>
            <input type="date" class="form-control" id="finalizacion" name="finalizacion" value="<?php echo isset($_POST['finalizacion']) ? $_POST['finalizacion'] : $finalizacion; ?>" >
        </div>
        <div class="mb-3">
          <label for="seguimiento" class="form-label">Seguimiento</label>
            <textarea class="form-control" id="seguimiento" name="seguimiento" required><?php echo isset($_POST['seguimiento']) ? $_POST['seguimiento'] : $seguimiento; ?></textarea>
        </div>

        <!-- Campos ocultos para los valores originales -->
        <input type="hidden" name="id_original" value="<?php echo $id; ?>">
        <input type="hidden" name="ts_original" value="<?php echo $ts; ?>">
        <input type="hidden" name="fechaDerivacion_original" value="<?php echo $fechaDerivacion; ?>">
        <input type="hidden" name="nombre_original" value="<?php echo $nombre; ?>">
        <input type="hidden" name="apellido1_original" value="<?php echo $apellido1; ?>">
        <input type="hidden" name="apellido2_original" value="<?php echo $apellido2; ?>">
        <input type="hidden" name="ingresos_original" value="<?php echo $ingresos; ?>">
        <input type="hidden" name="fnacimiento_original" value="<?php echo $fnacimiento; ?>">
        <input type="hidden" name="genero_original" value="<?php echo $genero; ?>">
        <input type="hidden" name="procedencia_original" value="<?php echo $procedencia; ?>">
        <input type="hidden" name="telefono_original" value="<?php echo $telefono; ?>">
        <input type="hidden" name="intervencion_original" value="<?php echo $intervencion; ?>">
        <input type="hidden" name="finalizacion_original" value="<?php echo $finalizacion; ?>">
        <input type="hidden" name="seguimiento_original" value="<?php echo $seguimiento; ?>">

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