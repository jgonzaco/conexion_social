<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Creación de variables junto a array de errores
    $errores = [];
    $expediente = isset($_POST["expediente"]) ? $_POST["expediente"] : "";
    $tecnica = isset($_POST["tecnica"]) ? $_POST["tecnica"] : "";
    $ts = isset($_POST["ts"]) ? $_POST["ts"] : "";
    $fderivacion = isset($_POST["fderivacion"]) ? $_POST["fderivacion"] : "";
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $apellido1 = isset($_POST["apellido1"]) ? $_POST["apellido1"] : "";
    $apellido2 = isset($_POST["apellido2"]) ? $_POST["apellido2"] : "";
    $titular = isset($_POST["titular"]) ? $_POST["titular"] : "";
    $ingresos = isset($_POST["ingresos"]) ? $_POST["ingresos"] : "";
    $fnacimiento = isset($_POST["fnacimiento"]) ? $_POST["fnacimiento"] : "";
    $genero = isset($_POST["genero"]) ? $_POST["genero"] : "";
    $procedencia = isset($_POST["procedencia"]) ? $_POST["procedencia"] : "";
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
    $intervencion = isset($_POST["intervencion"]) ? $_POST["intervencion"] : "";
    $ffinalizacion = isset($_POST["ffinalizacion"]) ? $_POST["ffinalizacion"] : "";


    // Se realizan validaciones
    // validación Técnica profesional
    if ((trim($tecnica) == '')) {
        $errores[] = "Introduzca el correo del Profesional correspondiente";
    }

    // validación Trabajadora Social
    if ((trim($ts) == '')) {
        $errores[] = "Introduzca Trabajador Social correspondiente";
    }

    // validación fecha derivacion
    if ((trim($fderivacion) == '')) {
        $errores[] = "Introduzca una fecha de derivación correcta";
    }

    //validación nombre
    if ((trim($nombre) == '')) {
        $errores[] = "Introduzca su nombre";
    }

    // validación apellido1
    if ((trim($apellido1) == '')) {
        $errores[] = "Introduzca su primer apellido";
    }

    // validación apellido2
    if ((trim($apellido2) == '')) {
        $errores[] = "Introduzca su segundo apellido";
    }

    // validación ingresos
    if ((trim($ingresos) == '')) {
        $errores[] = "Introduzca los ingresos que disponga";
    }

    // validación fecha de nacimiento
    if ((trim($fnacimiento) == '')) {
        $errores[] = "Introduzca la fecha de nacimiento correcata";
    }

    // validación género
    if ((trim($genero) == '')) {
        $errores[] = "Introduzca el género correspondiente";
    }

    // validación Procedencia
    if ((trim($procedencia) == '')) {
        $errores[] = "Introduzca la procedencia correcta";
    }

    // validación telefono
    if ((trim($telefono) == '')) {
        $errores[] = "Introduzca un teléfono correcto";
    }

    // validación intervención
    if ((trim($intervencion) == '')) {
        $errores[] = "Introduzca un tipo de intervención correcta";
    }

    if (count($errores) > 0) { // Si hay errores, muestra los errores y detiene la ejecución
        echo "<ul class='errores'>";
        foreach ($errores as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
        return; // Detiene la ejecución
    }

    try {
        // Conexión base de datos
        $cone = "mysql:host=localhost;dbname=pfc";
        $conexiondb = new PDO($cone, "root", "");
        $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Control de errores

        //Preparación consulta
        $consultaTrabajador = $conexiondb->prepare("SELECT id FROM trabajadores WHERE correo_electronico = ?");
        $consultaTrabajador->bindParam(1, $tecnica, PDO::PARAM_STR);
        $consultaTrabajador->execute();//Se ejecuta consulta
        $trabajador = $consultaTrabajador->fetch(PDO::FETCH_ASSOC);

        if ($trabajador) {
            //Se prepara consulta para insertar en bd
            $consulta = $conexiondb->prepare("INSERT INTO usuarios (persona_id, ts, fechaDerivacion, nombre, apellido1, apellido2, ingresos, fnacimiento, genero, procedencia, telefono, intervencion, finalizacion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
            // Se Enlaza variables y Ejecuta
            $consulta->bindParam(1, $trabajador['id'], PDO::PARAM_INT);
            $consulta->bindParam(2, $ts, PDO::PARAM_STR);
            $consulta->bindParam(3, $fderivacion, PDO::PARAM_STR);
            $consulta->bindParam(4, $nombre, PDO::PARAM_STR);
            $consulta->bindParam(5, $apellido1, PDO::PARAM_STR);
            $consulta->bindParam(6, $apellido2, PDO::PARAM_STR);
            $consulta->bindParam(7, $ingresos, PDO::PARAM_STR);
            $consulta->bindParam(8, $fnacimiento, PDO::PARAM_STR);
            $consulta->bindParam(9, $genero, PDO::PARAM_STR);
            $consulta->bindParam(10, $procedencia, PDO::PARAM_STR);
            $consulta->bindParam(11, $telefono, PDO::PARAM_STR);
            $consulta->bindParam(12, $intervencion, PDO::PARAM_STR);
            $consulta->bindParam(13, $ffinalizacion, PDO::PARAM_STR);
            $consulta->execute();

            header("Location: baseDatosController.php");// Redirigir de vuelta a la página principal de base de datos
            exit();
        } else {
            echo "<script>alert('No se encuentra ningún trabajador para ese email');</script>";//Si no coincide con ningún correo, saldrá popup
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();//Control de errores
    } finally {
        $conexiondb = null; // Cierro conexión
    }
}

?>

