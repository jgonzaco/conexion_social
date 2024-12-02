<?php
session_start();//inicio de sesión
// Verifica si el usuario está autenticado
if (!isset($_SESSION["coleccionista"])) {
    header("Location: loginController.php");//Redirige a login.php para registrarse.
    exit();
}

echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Taller</title>
    <link rel="icon" href="https://example.com/favicon.ico" type="image/x-icon"><!--favicon-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/editar_taller.css">
    <link rel="stylesheet" type="text/css" href="../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../public/css/footer.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet"><!--boostrap-->
</head>';

// Verificar si es una solicitud GET (para mostrar el formulario de edición)
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nombre']) && isset($_GET['apellido1']) && isset($_GET['apellido2']) && isset($_GET['origen']) && isset($_GET['fnacimiento']) && isset($_GET['taller'])) {

    // Inicializa las variables que se han traido
    $nombre = $_GET['nombre'];
    $apellido1 = $_GET['apellido1'];
    $apellido2 = $_GET['apellido2'];
    $origen = $_GET['origen'];
    $fnacimiento = $_GET['fnacimiento'];
    $taller = $_GET['taller'];
}


include '../models/editar_tallerModel.php';
include '../views/editar_taller.php';
include '../views/components/footer.php';
echo "</body>
</html>";
?>
