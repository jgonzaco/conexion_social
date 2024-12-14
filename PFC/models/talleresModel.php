<?php
try {
    // Conexión base de datos
    $cone = "mysql:host=localhost;dbname=pfc";
    $conexiondb = new PDO($cone, 'root', '');
    $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Control de errores

    // Establecimiento de variables
    $taller = isset($_GET['taller']) ? $_GET['taller'] : '';
    $errores = [];
    $consulta1 = null;

    // Validación si se busca un taller
    if (isset($_GET['buscar_taller'])) {
        // Función de validación taller
        function validar_taller($taller) {
            return !empty(trim($taller)); // Asegurarse de que no esté vacío
        }

        if (!validar_taller($taller)) {
            $errores[] = "Introduzca nombre del taller"; // Agregar error si está vacío
        } else {
            // Si no hay errores, ejecutamos la consulta con filtro
            $consulta1 = $conexiondb->prepare('SELECT * FROM taller WHERE taller = ?');
            $consulta1->bindParam(1, $taller, PDO::PARAM_STR);
            $consulta1->execute();
        }
    } elseif (isset($_GET['restaurar'])) {
        // Restaurar: Mostrar todos los talleres sin filtros
        $consulta1 = $conexiondb->prepare('SELECT * FROM taller');
        $consulta1->execute();
    } else {
        // Mostrar todos los talleres por defecto
        $consulta1 = $conexiondb->prepare('SELECT * FROM taller');
        $consulta1->execute();
    }


    // Mostrar errores
    if (!empty($errores)) {
        echo "<ul class='errores'>";
        foreach ($errores as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
    }

    // Se verifica consulta
    if($consulta1) {
        $resultados = $consulta1->fetchAll(PDO::FETCH_ASSOC);

        // Mostrar resultados en tabla
        if ($resultados) {
            echo "<table class='table table-success table-striped border border-success'>
                             <thead>
                                <tr>
                                    <th scope='col'>NOMBRE</th>
                                    <th scope='col'>PRIMER APELLIDO</th>
                                    <th scope='col'>SEGUNDO APELLIDO</th>
                                    <th scope='col'>ORIGEN</th>
                                    <th scope='col'>FECHA REALIZACION</th>
                                    <th scope='col'>TALLER</th>
                                    <th scope='col'>PARTICIPACION</th>
                                    <th scope='col'>ACCIONES</th>
                                </tr>
                            </thead>
                            ";

            foreach ($resultados as $result) { //Se recorre bd y se muestra contenido
                echo "<tbody>
                                <tr>
                                    <td>" . $result['nombre'] . "</td>
                                    <td>" . $result['apellido1'] . "</td>
                                    <td>" . $result['apellido2'] . "</td>
                                    <td>" . $result['origen'] . "</td>
                                    <td>" . $result['fnacimiento'] . "</td>
                                    <td>" . $result['taller'] . "</td>
                                    <td>" . $result['participacion'] . "</td>
                                    <td>
                                     <!-- Botón para editar -->
                                      <a href='../controllers/editar_tallerController.php?nombre=" . $result['nombre'] . "&apellido1=" . $result['apellido1'] . "&apellido2=" . $result['apellido2'] . "&origen=" . $result['origen'] . "&fnacimiento=" . $result['fnacimiento'] . "&taller=" . $result['taller'] . "'class='btn btn-info'>
                                        <i class='bi bi-pencil'></i> 
                                      </a>
                                      <!-- Botón para eliminar -->
                                       <a href='../controllers/talleresController.php?eliminar=true&nombre=" . urlencode($result['nombre']) . "&apellido1=" . urlencode($result['apellido1']) . "&apellido2=" . urlencode($result['apellido2']) . "&taller=" . urlencode($result['taller']) ."' class='btn btn-danger' onclick=\"return confirm('¿Estás seguro de que quieres eliminar a " . htmlspecialchars($result['nombre']) . " " . htmlspecialchars($result['apellido1']) . " " . htmlspecialchars($result['apellido2']) . " del taller " . htmlspecialchars($result['taller']) . "?')\" 'class='btn btn-danger'>
                                          <i class='bi bi-x-circle'></i>
                                       </a>
                                    </td>                           
                                </tr>
                                </tbody>";
            }

            echo "</tbody></table>";//Cierre de la tabla
        } else {
            echo "<p>No se encontraron resultados.</p>";// Mensaje si no se encuentran resultados.
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();//Control de errores
} finally {
    include '../views/components/footer.php';// Se incluye footer
    $conexiondb = null;// Cierre de conexión bd
}
?>
