<?php
//Validación en Back
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errores=[];//Se crea array para posteriormente almacenar errores.

    //Inicialización de variables.
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $ts = isset($_POST['ts']) ? $_POST['ts'] : '';
    $fechaDerivacion = isset($_POST['fechaDerivacion']) ? $_POST['fechaDerivacion'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido1 = isset($_POST['apellido1']) ? $_POST['apellido1'] : '';
    $apellido2 = isset($_POST['apellido2']) ? $_POST['apellido2'] : '';
    $ingresos = isset($_POST['ingresos']) ? $_POST['ingresos'] : '';
    $fnacimiento = isset($_POST['fnacimiento']) ? $_POST['fnacimiento'] : '';
    $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
    $procedencia = isset($_POST['procedencia']) ? $_POST['procedencia'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $intervencion = isset($_POST['intervencion']) ? $_POST['intervencion'] : '';
    $seguimiento = isset($_POST['seguimiento']) ? $_POST['seguimiento'] : '';



//SE CREAN LAS CONDICIONES DE VALIDACION

    // función validación id
    if (trim($id) == '') {
        $errores[] = "Introduzca un número de expediente.";
    }

    // función validación ts
    if (trim($ts) == '') {
        $errores[] = "Introduzca el nombre del Trabajador Social.";
    }

    // función validación fecha derivación
    if (trim($fechaDerivacion) == '') {
        $errores[] = "Introduzca una fecha correcta.";
    }

    // función validación nombre
    if (trim($nombre) == '') {
        $errores[] = "Introduzca su nombre";
    }

    // función validación apellido1
    if (trim($apellido1) == '') {
        $errores[] = "Introduzca su primer apellido";
    }

    // función validación apellido2
    if (trim($apellido2) == '') {
        $errores[] = "Introduzca su segundo apellido";
    }

    // función validación ingresos
    if (trim($ingresos) == '') {
        $errores[] = "Introduzca los ingresos correctos.";
    }

    // función validación fecha nacimiento
    if (trim($fnacimiento) == '') {
        $errores[] = "Introduzca una fecha de nacimiento correcta.";
    }

    // función validación genero
    if (trim($genero) == '') {
        $errores[] = "Introduzca el género correspondiente.";
    }

    // función validación procedencia
    if (trim($procedencia) == '') {
        $errores[] = "Introduzca procedencia correcta.";
    }

    // función validación teléfono
    if (trim($telefono) == '') {
        $errores[] = "Introduzca un teléfono correcto.";
    }

    // función validación intervención
    if (trim($intervencion) == '') {
        $errores[] = "Introduzca una intervención correcta.";
    }

    // función validación seguimiento
    if (trim($seguimiento) == '') {
        $errores[] = "Introduzca los datos del seguimiento.";
    }

    if(!$errores){// Si No existen errores, se realiza la siguiente condición
        // Verificar si es una solicitud POST (para procesar la actualización)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                // Conexión base de datos
                $cone = "mysql:host=localhost;dbname=pfc";
                $conexiondb = new PDO($cone, 'root', '');
                $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Control de errores

                // Recibir los datos editados del formulario
                $id = $_POST['id'];
                $ts = $_POST['ts'];
                $fechaDerivacion = $_POST['fechaDerivacion'];
                $nombre = $_POST['nombre'];
                $apellido1 = $_POST['apellido1'];
                $apellido2 = $_POST['apellido2'];
                $ingresos = $_POST['ingresos'];
                $fnacimiento = $_POST['fnacimiento'];
                $genero = $_POST['genero'];
                $procedencia = $_POST['procedencia'];
                $telefono = $_POST['telefono'];
                $intervencion = $_POST['intervencion'];
                $finalizacion = $_POST['finalizacion'];
                $seguimiento = isset($_POST['seguimiento']) ? $_POST['seguimiento'] : '';

                // Recibir los valores originales del formulario (para el WHERE)
                $id_original = $_POST['id_original'];
                $ts_original = $_POST['ts_original'];
                $nombre_original = $_POST["nombre_original"];
                $apellido1_original = $_POST["apellido1_original"];
                $apellido2_original = $_POST["apellido2_original"];

                // Se prepara la consulta
                $consulta = $conexiondb->prepare(
                    "UPDATE usuarios 
                            SET id=?, ts=?, fechaDerivacion=?, nombre=?, apellido1=? ,apellido2=? ,ingresos=? ,fnacimiento=? , genero=?, procedencia=?, telefono=? , intervencion=?, finalizacion=? ,seguimiento=?
                            WHERE id=? AND nombre=? AND apellido1=? AND apellido2=?"
                );
                // Se Enlaza variables y Ejecuta
                $consulta->bindParam(1, $id, PDO::PARAM_INT);
                $consulta->bindParam(2, $ts, PDO::PARAM_STR);
                $consulta->bindParam(3, $fechaDerivacion, PDO::PARAM_STR);
                $consulta->bindParam(4, $nombre, PDO::PARAM_STR);
                $consulta->bindParam(5, $apellido1, PDO::PARAM_STR);
                $consulta->bindParam(6, $apellido2, PDO::PARAM_STR);
                $consulta->bindParam(7, $ingresos, PDO::PARAM_STR);
                $consulta->bindParam(8, $fnacimiento, PDO::PARAM_STR);
                $consulta->bindParam(9, $genero, PDO::PARAM_STR);
                $consulta->bindParam(10, $procedencia, PDO::PARAM_STR);
                $consulta->bindParam(11, $telefono, PDO::PARAM_STR);
                $consulta->bindParam(12, $intervencion, PDO::PARAM_STR);
                $consulta->bindParam(13, $finalizacion, PDO::PARAM_STR);
                $consulta->bindParam(14, $seguimiento, PDO::PARAM_STR);

                $consulta->bindParam(15, $id_original, PDO::PARAM_INT);
                $consulta->bindParam(16, $nombre_original, PDO::PARAM_STR);
                $consulta->bindParam(17, $apellido1_original, PDO::PARAM_STR);
                $consulta->bindParam(18, $apellido2_original, PDO::PARAM_STR);
                $consulta->execute();

                // Redirigir de vuelta a la página principal de base de datos
                header("Location: baseDatosController.php");
                exit();
            } catch (PDOException $e) {
                echo "Error en la actualización: " . $e->getMessage();// Control de errores.
            }
        }

    }

}
?>