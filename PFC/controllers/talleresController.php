<?php
session_start();//Inicio de sesión.

// Verifica si el usuario está autenticado
if (!isset($_SESSION["coleccionista"])) {
    header("Location: loginController.php");//Redirige a login.php para registrarse.
    exit();
}

// Eliminar a una persona del taller
if (isset($_GET['eliminar']) && isset($_GET['nombre']) && isset($_GET['apellido1']) && isset($_GET['apellido2']) && isset($_GET['taller'])) {
    try {
        $cone = "mysql:host=localhost;dbname=pfc";
        $conexiondb = new PDO($cone, 'root', '');

        $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Establezco variables
        $nombre1 = $_GET['nombre'];
        $apellido1 = $_GET['apellido1'];
        $apellido2 = $_GET['apellido2'];
        $taller = $_GET['taller'];

        // Elimino la persona del taller
        $consulta1 = $conexiondb->prepare('DELETE FROM taller WHERE nombre=? AND apellido1=? AND apellido2=? AND taller=?');
        $consulta1->bindParam(1, $nombre1, PDO::PARAM_STR);
        $consulta1->bindParam(2, $apellido1, PDO::PARAM_STR);
        $consulta1->bindParam(3, $apellido2, PDO::PARAM_STR);
        $consulta1->bindParam(4, $taller, PDO::PARAM_STR);
        $consulta1->execute();

        // Redirigir después de la eliminación
        header("Location: ../controllers/talleresController.php");
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally {
        $conexiondb = null;
    }
}

echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talleres</title>
    <link rel="icon" href="https://example.com/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/talleres.css">
    <link rel="stylesheet" type="text/css" href="../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../public/css/footer.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>';

include '../views/talleres.php';
include '../models/talleresModel.php';
include '../views/components/footer.php';
echo '</body>
</html>';
?>