<?php
//Validación en Back
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //SE CREAN LAS FUNCIONES
    function validar_nombre($nombre){//Función validar nombre
        return !(trim($nombre) == '');
    }
    function validar_apellido1($apellido1){//Función validar apellido1
        return !(trim($apellido1) == '');
    }

    function validar_apellido2($apellido2){ //Función validar apellido2
        return !(trim($apellido2)== '');
    }

    function validar_origen($origen){ //Función validar origen
        return !(trim($origen) == '');
    }

    function validar_fnacimiento($fnacimiento){ //Función validar fnacimiento.
        return !(trim($fnacimiento)=='');
    }

    function validar_taller($taller){ //Función validar taller.
        return !(trim($taller)=='');
    }

    //Inicialización de variables.
    $errores=[];//Se crea array para posteriormente almacenar errores.
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido1= isset($_POST['apellido1']) ? $_POST['apellido1'] : '';
    $apellido2= isset($_POST['apellido2']) ? $_POST['apellido2'] : '';
    $origen= isset($_POST['origen']) ? $_POST['origen'] : '';
    $fnacimiento= isset($_POST['fnacimiento']) ? $_POST['fnacimiento'] : '';
    $taller= isset($_POST['taller']) ? $_POST['taller'] : '';

    if (!validar_nombre($nombre)) { //Validación de nombre
        $errores[] = "Introduzca un nombre";
    }

    if (!validar_apellido1($apellido1)) {//Validación del primer apellido
        $errores[] = "Introduzca el primer apellido";
    }

    if (!validar_apellido2($apellido2)) {//Validación del segundo apellido
        $errores[] = "Introduzca el segundo apellido";
    }

    if (!validar_origen($origen)) {//Validación origen.
        $errores[] = "Introduzca el origen";
    }

    if (!validar_fnacimiento($fnacimiento)) {//Validación fecha de nacimiento.
        $errores[] = "Introduzca la fecha de nacimiento";
    }
    if(!validar_taller($taller)){ //Validación fecha de taller.
        $errores[] = "Introduzca la taller";
    }

    //Comprobación de errores
    if (isset($errores)) { // Si hay errores, saca por pantalla los errores.
        echo "<ul class='errores'>";
        foreach ($errores as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
    }

    if (!$errores) {// Si No existen errores, se realiza la siguiente condición
        if (isset($_POST['insertar'])) {//  Si existe inste insertar mediante POST
            try {// Se realiza un try-catch para realizar la conexión a BD para insertar los datos
                // Conexión a la base de datos
                $cone = "mysql:host=localhost;dbname=pfc";
                $conexiondb = new PDO($cone, "root", "");

                // Configuración de atributos de error de PDO
                $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Comprobación de la conexión
                if ($conexiondb) {
                    echo "Conexión exitosa a la base de datos.";
                }

                // Inicializa variables
                $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
                $apellido1 = isset($_POST["apellido1"]) ? $_POST["apellido1"] : "";
                $apellido2 = isset($_POST["apellido2"]) ? $_POST["apellido2"] : "";
                $origen = isset($_POST["origen"]) ? $_POST["origen"] : "";
                $fnacimiento = isset($_POST["fnacimiento"]) ? $_POST["fnacimiento"] : "";
                $taller = isset($_POST["taller"]) ? $_POST["taller"] : "";
                $id_profesional = $_SESSION["profesional"];//Inicialización del profesional

                // Prepara la consulta
                $consulta = $conexiondb->prepare("INSERT INTO taller (nombre, apellido1, apellido2, origen, fnacimiento, taller,id_trabajador) VALUES (?, ?, ?, ?, ?, ?,?)");

                // Enlaza parámetros y ejecuta la consulta
                $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
                $consulta->bindParam(2, $apellido1, PDO::PARAM_STR);
                $consulta->bindParam(3, $apellido2, PDO::PARAM_STR);
                $consulta->bindParam(4, $origen, PDO::PARAM_STR);
                $consulta->bindParam(5, $fnacimiento, PDO::PARAM_STR);
                $consulta->bindParam(6, $taller, PDO::PARAM_STR);
                $consulta->bindParam(7, $id_profesional, PDO::PARAM_INT);
                $consulta->execute();//Ejecución de la query

                // Vuelve a la página de talleres
                header("Location: talleresController.php");
                exit();

            } catch (PDOException $e) {//Control del error.
                echo "Error en la base de datos: " . $e->getMessage();//maneja error
            } finally {
                $conexiondb = null;//cierra conexion
            }
        }
    }

}

?>