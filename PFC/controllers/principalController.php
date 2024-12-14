<?php
session_start();//Inicio de sesión.

// Verifica si el usuario está autenticado
if (!isset($_SESSION["profesional"])) {
    header("Location: loginController.php");//Redirige a loginController.php para registrate.
    exit();
}

// Inicio HTML
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel principal</title><!-- Título de la página -->
    <link rel="icon" href="../public/images/mano.png" type="image/x-icon"><!--favicon-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"><!--Booststrap diseño responsivo-->
    <link rel="stylesheet" type="text/css" href="../public/css/principal.css"><!--Enlaza css Estilo principal-->
    <link rel="stylesheet" type="text/css" href="../public/css/header.css"><!--Enlaza Estilo header-->
    <link rel="stylesheet" type="text/css" href="../public/css/footer.css"><!--Enlaza css Estilo footer-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet"><!--Bootstrap para utilizar íconos -->
</head>';

include '../views/principal.php';//Incluye vista principal
include '../models/principalModel.php';//Incluye principalModel, interacción con los datos
include '../views/components/footer.php';//Incluye footer
echo "</body>
</html>";
?><!--Cierre html-->
