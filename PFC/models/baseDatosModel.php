<?php
try {//inicializo conexión Bd
    $cone = "mysql:host=localhost; dbname=pfc";// Conexión a la base de datos
    $conexiondb = new PDO($cone, 'root', '');

    // Veo si existe un error en la conexión
    $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Inicialización de variables de búsqueda
    $expediente = isset($_POST['expediente']) ? $_POST['expediente'] : '';
    $profesionales = isset($_POST['profesionales']) ? $_POST['profesionales'] : '';
    $buscarExpediente = isset($_POST['buscarExpediente']) ? $_POST['buscarExpediente'] : '';
    $buscarProfesionales = isset($_POST['buscarProfesionales']) ? $_POST['buscarProfesionales'] : '';

    // Comprobar si se ha pulsado el botón buscar
    if (!empty($buscarExpediente)) {
        // Comprobar campos vacíos
        if (empty($expediente)) {
            echo "<ul class='errores'>
                      <li>Debe introducir un expediente para la búsqueda</li>
                   </ul>";
        } else {
            // Preparar la consulta dependiendo lo que indique el usuario
            $consulta = $conexiondb->prepare('SELECT usuarios.*,trabajadores.nombre AS trabajador_nombre 
                                                    FROM usuarios 
                                                    JOIN trabajadores ON usuarios.persona_id = trabajadores.id
                                                    WHERE usuarios.id=?
                                                    ORDER BY usuarios.id ASC');
            $consulta->bindParam(1, $expediente, PDO::PARAM_INT);//Se ejecuta consulta
        }
    }elseif(!empty($buscarProfesionales)){//Muestra de error

        if (empty($profesionales )) {
            echo "<ul class='errores'>
                      <li>Debe introducir un profesional para la búsqueda</li>
                   </ul>";
        } else {
            // Preparar la consulta dependiendo lo que indique el usuario
            $consulta = $conexiondb->prepare('SELECT usuarios.*, trabajadores.nombre AS trabajador_nombre
                                                    FROM usuarios
                                                    JOIN trabajadores ON usuarios.persona_id = trabajadores.id
                                                    WHERE trabajadores.nombre = ? OR usuarios.ts = ?
                                                    ORDER BY usuarios.id ASC');
            // Enlaza variables y ejecuta la consulta
            $consulta->bindParam(1, $profesionales, PDO::PARAM_STR);
            $consulta->bindParam(2, $profesionales, PDO::PARAM_STR);

        }
    } else {
        // Si no se busca, aparece toda la tabla
        $consulta = $conexiondb->prepare('SELECT usuarios.*,trabajadores.nombre AS trabajador_nombre
                                                FROM usuarios
                                                JOIN trabajadores ON usuarios.persona_id = trabajadores.id
                                                ORDER BY usuarios.id ASC');
    }

    // Ejecutar la consulta si existe consulta
    if (isset($consulta)) {
        $consulta->execute();
        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
        if($resultados){
            // Genera la tabla
            echo "<div class='table-responsive'>
            <table class='table table-success table-striped table-hover table-sm border border-success'>
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
                        <th scope='col'>GENERO</th>
                        <th scope='col'>PROCEDENCIA</th>
                        <th scope='col'>TELÉFONO</th>
                        <th scope='col'>INTERVENCIÓN</th>
                        <th scope='col'>FECHA FINALIZACIÓN</th>
                        <th scope='col'>SEGUIMIENTO</th>
                        <th scope='col'>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>";

            foreach ($resultados as $result) {//Recorre todos los datos y los introduce
                $id = $result['id'];
                $nombreCompleto = $result['nombre'] . " " . $result['apellido1'] . " " . $result['apellido2'];
                echo "<tr>
                    <td>{$id}</td>
                    <td>" . $result['trabajador_nombre'] . "</td>
                    <td>" . $result['ts'] . "</td>
                    <td>" . $result['fechaDerivacion'] . "</td>
                    <td>" . $result['nombre'] . "</td>
                    <td>" . $result['apellido1'] . "</td>
                    <td>" . $result['apellido2'] . "</td>
                    <td>" . $result['ingresos'] . "</td>
                    <td>" . $result['fnacimiento'] . "</td>
                    <td>" . $result['genero'] . "</td>
                    <td>" . $result['procedencia'] . "</td>
                    <td>" . $result['telefono'] . "</td>
                    <td>" . $result['intervencion'] . "</td>
                    <td>" . $result['finalizacion'] . "</td>
                    <td>" . $result['seguimiento'] . "</td>
                    <td>
                        <a href='../controllers/modificarController.php?id={$id}&tecnico=" . urlencode($result['trabajador_nombre']) . "&ts=" . urlencode($result['ts']) . "&fechaDerivacion=" . urlencode($result['fechaDerivacion']) . "&nombre=" . urlencode($result['nombre']) . "&apellido1=" . urlencode($result['apellido1']) . "&apellido2=" . urlencode($result['apellido2']) . "&ingresos=" . urlencode($result['ingresos']) . "&fnacimiento=" . urlencode($result['fnacimiento']) . "&genero=" . urlencode($result['genero']) . "&procedencia=" . urlencode($result['procedencia']) . "&telefono=" . urlencode($result['telefono']) . "&intervencion=" . urlencode($result['intervencion']) . "&finalizacion=" . urlencode($result['finalizacion']) . "&seguimiento=" . urlencode($result['seguimiento']) . "' class='btn btn-info'>
                            <i class='bi bi-pencil'></i> <!--Al seleccionar lapiz lleva toda la informacion a otra vista-->
                        </a>
                        <a href='../controllers/baseDatosController.php?eliminar=true&id=" . urlencode($id) . "' class='btn btn-danger' onclick=\"return confirm('¿Estás seguro de que quieres eliminar a {$nombreCompleto} de la Base de Datos?')\">
                            <i class='bi bi-x-circle'></i><!--Al seleccionar eliminar te muestra un popup donde te pregunta borrar el usuario-->
                        </a>
                    </td>
                </tr>";
            }
            echo "</tbody></table></div>";
        }else{
            echo "<ul class='errores'><!--Muestra de error-->
                      <li>No se han encontrado resultados para la búsqueda</li><!--Muestra mensaje si no hay resultados-->
                   </ul>";
        }


    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();//maneja error
} finally {
    $conexiondb = null;//cierra conexion
}

?>
