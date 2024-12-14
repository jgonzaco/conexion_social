<?php

try {
    $casoFormal = "Formal";
    $casoTelematico = "Telemático";
    $cone = "mysql:host=localhost;dbname=pfc";
    $conexiondb = new PDO($cone, 'root', '');
    $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $profesional = $_SESSION["profesional"];
    $identificador = isset($_POST['persona']) ? $_POST['persona'] : '';

    $consulta1 = null;

    if (isset($_POST["buscar_persona"])) {
        // Inicialización de errores.
        $errores = [];

        // Validaciones
        if (empty(trim($identificador))) {
            $errores[] = "Introduzca una identificación válida";
        }

        // Comprobación de errores
        if (!empty($errores)) {
            echo "<ul class='errores'>";
            foreach ($errores as $error) {
                echo "<li>" . $error . "</li>";
            }
            echo "</ul>";
        } else {
            // Preparar la consulta
            $consulta1 = $conexiondb->prepare('SELECT usuarios.*,trabajadores.nombre AS trabajador_nombre  
                                                     FROM usuarios 
                                                     JOIN trabajadores ON trabajadores.id = ?
                                                     WHERE persona_id= ? 
                                                     AND intervencion IN (?, ?) 
                                                     AND usuarios.nombre= ? 
                                                     OR usuarios.apellido1= ? 
                                                     OR usuarios.apellido2= ?');
            //Se ejecuta consulta casos telematicos y formales
            $consulta1->execute([$profesional,$profesional,$casoFormal,$casoTelematico, $identificador,$identificador,$identificador]);
        }
    }elseif(isset($_POST["buscarCasosActivos"])){//Filtro casos activos
        // Preparar la consulta
        $consulta1 = $conexiondb->prepare("SELECT usuarios.*,trabajadores.nombre AS trabajador_nombre  
                                                     FROM usuarios 
                                                     JOIN trabajadores ON trabajadores.id = ?
                                                     WHERE persona_id= ? 
                                                     AND intervencion IN (?, ?) 
                                                     AND (TRIM(finalizacion) = ''
                                                     OR finalizacion IS NULL)");
        //Se ejecuta casos activos
        $consulta1->execute([$profesional,$profesional,$casoFormal,$casoTelematico]);
    } else {
        // Consulta sin filtros
        $consulta1 = $conexiondb->prepare('SELECT usuarios.*,trabajadores.nombre AS trabajador_nombre 
                                                 FROM usuarios 
                                                 JOIN trabajadores ON trabajadores.id = :profesional
                                                 WHERE persona_id= :profesional 
                                                 AND intervencion IN (:casoFormal, :casoTelematico) ');
        //Se ejecuta consulta sin filtros
        $consulta1->execute([':casoFormal' => $casoFormal, ':casoTelematico' => $casoTelematico, ':profesional' => $profesional]);
    }

    // Ejecutar la consulta si existe
    if ($consulta1) {
        // Obtener resultados
        $resultados = $consulta1->fetchAll(PDO::FETCH_ASSOC);

        // Mostrar los resultados en la tabla
        if ($resultados) {
            echo "<table class='table table-success table-striped border border-success'>
                    <thead>
                        <tr>
                            <th scope='col'>EXPEDIENTE</th>
                            <th scope='col'>TÉCNICO</th>
                            <th scope='col'>TRABAJADORA SOCIAL</th>
                            <th scope='col'>FECHA DERIVACIÓN</th>
                            <th scope='col'>NOMBRE</th>
                            <th scope='col'>PRIMER APELLIDO</th>
                            <th scope='col'>SEGUNDO APELLIDO</th>
                            <th scope='col'>INGRESOS</th>
                            <th scope='col'>FECHA NACIMIENTO</th>
                            <th scope='col'>PROCEDENCIA</th>
                            <th scope='col'>TELÉFONO</th>
                            <th scope='col'>FECHA FINALIZACIÓN</th>
                            <th scope='col'>SEGUIMIENTO</th>
                            <th scope='col'>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>";

            foreach ($resultados as $result) {
                echo "<tr>
                        <td>" . $result['id'] . "</td>
                        <td>" . $result['trabajador_nombre'] . "</td>
                        <td>" . $result['ts'] . "</td>
                        <td>" . $result['fechaDerivacion'] . "</td>
                        <td>" . $result['nombre'] . "</td>
                        <td>" . $result['apellido1'] . "</td>
                        <td>" . $result['apellido2'] . "</td>
                        <td>" . $result['ingresos'] . "</td>
                        <td>" . $result['fnacimiento'] . "</td>
                        <td>" . $result['procedencia'] . "</td>
                        <td>" . $result['telefono'] . "</td>
                        <td>" . $result['finalizacion'] . "</td>
                        <td class='ocultar-columna'>" . $result['seguimiento'] . "</td>
                        <td>
                        <!-- Botón para editar -->
                          <a href='../controllers/editar_casosParticularesController.php?id=" . urlencode($result['id']) . "&tecnico=" . urlencode($result['trabajador_nombre']) . "&ts=" . urlencode($result['ts']) . "&fechaDerivacion=" . urlencode($result['fechaDerivacion']) . "&nombre=" . urlencode($result['nombre']) . "&apellido1=" . urlencode($result['apellido1']) . "&apellido2=" . urlencode($result['apellido2']) . "&ingresos=" . urlencode($result['ingresos']) . "&fnacimiento=" . urlencode($result['fnacimiento']) . "&procedencia=" . urlencode($result['procedencia']) . "&telefono=" . urlencode($result['telefono']) . "&finalizacion=" . urlencode($result['finalizacion']) . "&seguimiento=" . urlencode($result['seguimiento']) . "' class='btn btn-info'>
                            <i class='bi bi-pencil'></i> 
                          </a>
                        </td>       
                    </tr>";
            }

            echo "</tbody></table>";//Cierre de la tabla
        } else {
            echo "<p>No se encontraron resultados.</p>";// Mensaje si no se encuentran resultados.
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();//Control de errores
} finally {
    $conexiondb = null;// Cierre de conexión bd
}
?>

