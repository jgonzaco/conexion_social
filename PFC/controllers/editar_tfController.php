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
    <title>Editar Tarjeta Familia</title>
    <link rel="icon" href="https://example.com/favicon.ico" type="image/x-icon"><!--favicon-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"><!--bootstrap-->
    <link rel="stylesheet" type="text/css" href="../public/css/editar_tf.css"><!--Enlaza con css-->
    <link rel="stylesheet" type="text/css" href="../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../public/css/footer.css"><!--Enlaza con css-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet"><!--boostrap-->
</head>';

// Verificar si es una solicitud GET (para mostrar el formulario de edición)
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['ts']) && isset($_GET['nombre']) && isset($_GET['apellido1'])&& isset($_GET['apellido2'])&& isset($_GET['ingresos'])&& isset($_GET['fnacimiento'])
    && isset($_GET['telefono'])&& isset($_GET['finalizacion'])&& isset($_GET['seguimiento'])) {

    // Inicializa las variables que se han traido
    $id = $_GET['id'];
    $ts = $_GET['ts'];
    $nombre = $_GET['nombre'];
    $apellido1 = $_GET['apellido1'];
    $apellido2 = $_GET['apellido2'];
    $ingresos = $_GET['ingresos'];
    $fnacimiento = $_GET['fnacimiento'];
    $telefono = $_GET['telefono'];
    $finalizacion = $_GET['finalizacion'];
    $seguimiento = $_GET['seguimiento'];
}



include '../models/editar_tfModel.php';
include '../views/editar_tf.php';
include '../views/components/footer.php';
echo "</body>
</html>";
?>