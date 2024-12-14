<?php
session_start(); //inicio de sesión
if (isset($_POST["cerrar_sesion"])) { // Verifico que han seleccionado cerrar sesión para destruir la sesión. En caso contrario, está la siguiente condición.
    session_destroy();
}
else if(isset($_SESSION["profesional"])){ // Verifico que existe sesión profesional y lo envía directamente a la página del profesional para obligar al usuario a seleccionar cerrar sesión.
    header ("location: principalController.php");
}

// Inicio HTML
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title><!-- Título de la página -->
    <link rel="icon" href="../public/images/mano.png" type="image/x-icon"><!--favicon-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"><!--Booststrap diseño responsivo-->
    <link rel="stylesheet" type="text/css" href="../public/css/login.css"><!--Enlaza css Estilo login-->
    <link rel="stylesheet" type="text/css" href="../public/css/header.css"><!--Enlaza Estilo header-->
    <link rel="stylesheet" type="text/css" href="../public/css/footer.css"><!--Enlaza css Estilo footer-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet"><!--Bootstrap para utilizar íconos -->

</head>';
include '../views/login.php';//Incluye vista login
include '../models/loginModel.php';//Incluye loginModel, interacción con los datos
include '../views/components/footer.php';//Incluye footer
echo "</body>
</html>";

?>
