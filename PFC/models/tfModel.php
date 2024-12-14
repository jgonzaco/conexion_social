<?php

try {
    // Conexión base de datos
    $cone = "mysql:host=localhost;dbname=pfc";
    $conexiondb = new PDO($cone, 'root', '');
    $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Control de error

    //Establecimiento de variables.
    $profesional = $_SESSION["profesional"];
    $identificador = isset($_POST['persona']) ? $_POST['persona'] : '';
    $tf="Tarjeta Familia";

    $consulta1 = null;// Almacenamiento de la consulta.

// Verifica si se ha enviado el formulario para buscar una persona.
    if (isset($_POST["buscar_persona"])) {
        // Inicialización de errores.
        $errores = [];

        // Validacion, sino se ha introducido nada
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
                                                     AND intervencion= ?
                                                     AND usuarios.nombre= ? 
                                                     OR usuarios.apellido1= ? 
                                                     OR usuarios.apellido2= ?');
            // Se ejecuta consulta
            $consulta1->execute([$profesional,$profesional, $tf, $identificador,$identificador,$identificador]);
        }
    }elseif(isset($_POST["buscarCasosActivos"])){// Se comprueba si se busca casos activos
        //Prepara la consulta
        $consulta1 = $conexiondb->prepare("SELECT usuarios.*,trabajadores.nombre AS trabajador_nombre  
                                                     FROM usuarios 
                                                     JOIN trabajadores ON trabajadores.id = ?
                                                     WHERE persona_id= ? 
                                                     AND intervencion='Tarjeta Familia' 
                                                     AND (TRIM(finalizacion) = ''
                                                     OR finalizacion IS NULL)");

        //Se ejecuta consulta
        $consulta1->execute([$profesional,$profesional]);
    } else {
        // Consulta sin filtros
        $consulta1 = $conexiondb->prepare('SELECT usuarios.*,trabajadores.nombre AS trabajador_nombre 
                                                 FROM usuarios 
                                                 JOIN trabajadores ON trabajadores.id = :profesional
                                                 WHERE persona_id= :profesional 
                                                 AND intervencion="Tarjeta Familia"');
        // Se ejecuta consulta
        $consulta1->execute([':profesional' => $profesional]);
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
                        <td><!-- Enlace para editar la información del usuario -->
                          <a href='../controllers/editar_tfController.php?id=" . urlencode($result['id']) . "&tecnico=" . urlencode($result['trabajador_nombre']) . "&ts=" . urlencode($result['ts']) . "&fechaDerivacion=" . urlencode($result['fechaDerivacion']) . "&nombre=" . urlencode($result['nombre']) . "&apellido1=" . urlencode($result['apellido1']) . "&apellido2=" . urlencode($result['apellido2']) . "&ingresos=" . urlencode($result['ingresos']) . "&fnacimiento=" . urlencode($result['fnacimiento']) . "&procedencia=" . urlencode($result['procedencia']) . "&telefono=" . urlencode($result['telefono']) . "&finalizacion=" . urlencode($result['finalizacion']) . "&seguimiento=" . urlencode($result['seguimiento']) . "' class='btn btn-info'>
                            <i class='bi bi-pencil'></i> 
                          </a>
                        </td>       
                    </tr>";
            }

            echo "</tbody></table>";// Se cierra la tabla.
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
