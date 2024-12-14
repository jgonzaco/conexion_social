<?php
session_start();//Inicio de sesión.

// Verifica si el usuario está autenticado
if (!isset($_SESSION["profesional"])) {
    header("Location: loginController.php");//Redirige a loginController.php para registrarse.
    exit();
}

// Eliminar a una persona del taller
if (isset($_GET['eliminar']) && isset($_GET['nombre']) && isset($_GET['apellido1']) && isset($_GET['apellido2']) && isset($_GET['taller'])) {
    try {
        //Conexión con BD
        $cone = "mysql:host=localhost;dbname=pfc";
        $conexiondb = new PDO($cone, 'root', '');

        $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Control de errores

        // Se establecen variables
        $nombre1 = $_GET['nombre'];
        $apellido1 = $_GET['apellido1'];
        $apellido2 = $_GET['apellido2'];
        $taller = $_GET['taller'];

        // Peraración de consulta
        $consulta1 = $conexiondb->prepare('DELETE FROM taller WHERE nombre=? AND apellido1=? AND apellido2=? AND taller=?');
        $consulta1->bindParam(1, $nombre1, PDO::PARAM_STR);
        $consulta1->bindParam(2, $apellido1, PDO::PARAM_STR);
        $consulta1->bindParam(3, $apellido2, PDO::PARAM_STR);
        $consulta1->bindParam(4, $taller, PDO::PARAM_STR);
        //Ejecuta consulta
        $consulta1->execute();

        // Redirigir después de la eliminación
        header("Location: ../controllers/talleresController.php");
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();//Control de errores
    } finally {
        $conexiondb = null;//Finalización de conexión
    }
}

// Inicio HTML
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talleres</title><!-- Título de la página -->
    <link rel="icon" href="../public/images/mano.png" type="image/x-icon"><!--favicon-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"><!--Booststrap diseño responsivo-->
    <link rel="stylesheet" type="text/css" href="../public/css/talleres.css"><!--Enlaza css Estilo talleres-->
    <link rel="stylesheet" type="text/css" href="../public/css/header.css"><!-- Enlaza Estilo header-->
    <link rel="stylesheet" type="text/css" href="../public/css/footer.css"><!--Enlaza css Estilo footer-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet"><!--Bootstrap para utilizar íconos -->
</head>';

include '../views/talleres.php';//Incluye vista talleres
include '../models/talleresModel.php';//Incluye talleresModel, interacción con los datos
include '../views/components/footer.php';//Incluye footer
echo '</body>
</html>';
?><!--Cierre html-->