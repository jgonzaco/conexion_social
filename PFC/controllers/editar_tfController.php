<?php
session_start();//inicio de sesión
// Verifica si el usuario está autenticado
if (!isset($_SESSION["profesional"])) {
    header("Location: loginController.php");//Redirige a loginController.php para registrarse.
    exit();
}

// Inicio HTML
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarjeta Familia</title><!-- Título de la página -->
    <link rel="icon" href="../public/images/mano.png" type="image/x-icon"><!--favicon-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"><!--Booststrap diseño responsivo-->
    <link rel="stylesheet" type="text/css" href="../public/css/editar_tf.css"><!--Enlaza css Estilo editar_tf-->
    <link rel="stylesheet" type="text/css" href="../public/css/header.css"><!--Enlaza Estilo header-->
    <link rel="stylesheet" type="text/css" href="../public/css/footer.css"><!--Enlaza css Estilo footer-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet"><!--Bootstrap para utilizar íconos -->
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

include '../models/editar_tfModel.php';//Incluye editar_tfModel, interacción con los datos
include '../views/editar_tf.php';//Incluye vista editar_tf
include '../views/components/footer.php';//Incluye footer
echo "</body>
</html>";
?><!--Cierre html-->