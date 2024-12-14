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


    if(!$errores){// Si No existen errores, se realiza la siguiente condición
// Verificar si es una solicitud POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $cone = "mysql:host=localhost;dbname=pfc";// Establecer conexión con la base de datos
                $conexiondb = new PDO($cone, 'root', '');
                $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// Ver si existe un error en la conexión

                // Incializar variables
                $nombre = $_POST["nombre"];
                $apellido1 = $_POST["apellido1"];
                $apellido2 = $_POST["apellido2"];
                $origen = $_POST["origen"];
                $fnacimiento = $_POST["fnacimiento"];
                $taller = $_POST["taller"];
                $participacion = isset($_POST["participacion"]) ? $_POST["participacion"] : '';

                // Inicializar variables originales del formulario para el where
                $nombre_original = $_POST["nombre_original"];
                $apellido1_original = $_POST["apellido1_original"];
                $apellido2_original = $_POST["apellido2_original"];
                $taller_original = $_POST["taller_original"]; // Asegúrate de incluir esto

                // Actualizar los datos en la base de datos
                $consulta = $conexiondb->prepare(
                    "UPDATE taller 
            SET nombre=?, apellido1=?, apellido2=?, origen=?, fnacimiento=?, taller=? ,participacion=? 
            WHERE nombre=? AND apellido1=? AND apellido2=? AND taller=?"
                );
                // Enlaza variables y ejecuta la consulta
                $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
                $consulta->bindParam(2, $apellido1, PDO::PARAM_STR);
                $consulta->bindParam(3, $apellido2, PDO::PARAM_STR);
                $consulta->bindParam(4, $origen, PDO::PARAM_STR);
                $consulta->bindParam(5, $fnacimiento, PDO::PARAM_STR);
                $consulta->bindParam(6, $taller, PDO::PARAM_STR);
                $consulta->bindParam(7, $participacion, PDO::PARAM_STR);
                $consulta->bindParam(8, $nombre_original, PDO::PARAM_STR);
                $consulta->bindParam(9, $apellido1_original, PDO::PARAM_STR);
                $consulta->bindParam(10, $apellido2_original, PDO::PARAM_STR);
                $consulta->bindParam(11, $taller_original, PDO::PARAM_STR);
                $consulta->execute();

                // Redirigir de vuelta a la página principal de talleres
                header("Location: talleresController.php");
                exit();
            } catch (PDOException $e) {
                echo "Error en la actualización: " . $e->getMessage();//maneja error
            }finally {
                $conexiondb = null;//cierra conexion
            }
        }
    }

}
?>