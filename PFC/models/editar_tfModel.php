<?php

//Validación en Back
if($_SERVER['REQUEST_METHOD'] == 'POST') {
//SE CREAN LAS FUNCIONES
    function validar_seguimiento($seguimiento){//Función validar seguimiento
        return !(trim($seguimiento) == '');
    }

    //Inicialización de variables.
    $errores=[];//Se crea array para posteriormente almacenar errores.
    $seguimiento = isset($_POST['seguimiento']) ? $_POST['seguimiento'] : '';

    if (!validar_seguimiento($seguimiento)) { //Validación de seguimiento
        $errores[] = "Introduzca algún dato";
    }

    if(!$errores){// Si No existen errores, se realiza la siguiente condición
        // Verificar si es una solicitud POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                //Conexión con BD
                $cone = "mysql:host=localhost;dbname=pfc";
                $conexiondb = new PDO($cone, 'root', '');
                $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//comprueba errores

                // Incializar variables
                $id = $_POST['id'];
                $ts = $_POST['ts'];
                $nombre = $_POST['nombre'];
                $apellido1 = $_POST['apellido1'];
                $apellido2 = $_POST['apellido2'];
                $ingresos = $_POST['ingresos'];
                $fnacimiento = $_POST['fnacimiento'];
                $telefono = $_POST['telefono'];
                $finalizacion = $_POST['finalizacion'];
                $seguimiento = isset($_POST['seguimiento']) ? $_POST['seguimiento'] : '';

                // Inicializar variables originales del formulario para el where
                $id_original = $_POST['id_original'];
                $ts_original = $_POST['ts_original'];
                $nombre_original = $_POST["nombre_original"];
                $apellido1_original = $_POST["apellido1_original"];
                $apellido2_original = $_POST["apellido2_original"];

                // Actualizar los datos en la base de datos
                $consulta = $conexiondb->prepare(
                    "UPDATE usuarios 
            SET id=?, ts=?, nombre=?, apellido1=? ,apellido2=? ,ingresos=? ,fnacimiento=? ,telefono=? ,finalizacion=? ,seguimiento=?
            WHERE id=? AND nombre=? AND apellido1=? AND apellido2=?"
                );
                // Enlaza variables y ejecuta la consulta
                $consulta->bindParam(1, $id, PDO::PARAM_INT);
                $consulta->bindParam(2, $ts, PDO::PARAM_STR);
                $consulta->bindParam(3, $nombre, PDO::PARAM_STR);
                $consulta->bindParam(4, $apellido1, PDO::PARAM_STR);
                $consulta->bindParam(5, $apellido2, PDO::PARAM_STR);
                $consulta->bindParam(6, $ingresos, PDO::PARAM_STR);
                $consulta->bindParam(7, $fnacimiento, PDO::PARAM_STR);
                $consulta->bindParam(8, $telefono, PDO::PARAM_STR);
                $consulta->bindParam(9, $finalizacion, PDO::PARAM_STR);
                $consulta->bindParam(10, $seguimiento, PDO::PARAM_STR);

                $consulta->bindParam(11, $id_original, PDO::PARAM_INT);
                $consulta->bindParam(12, $nombre_original, PDO::PARAM_STR);
                $consulta->bindParam(13, $apellido1_original, PDO::PARAM_STR);
                $consulta->bindParam(14, $apellido2_original, PDO::PARAM_STR);
                $consulta->execute();

                // Vuelve a la página principal de tf
                header("Location: tfController.php");
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
