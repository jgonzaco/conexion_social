<?php
session_start(); // Inicializo sesión para poder realizar las operaciones que vienen a continuación
if (isset($_POST["cerrar_sesion"])) { // Verifico que han seleccionado cerrar sesión para destruir la sesión. En caso contrario, está la siguiente condición.
    session_destroy();
}
else if(isset($_SESSION["coleccionista"])){ // Verifico que existe sesión coleccionista y lo envía directamente a la página del coleccionista para obligar al usuario a seleccionar cerrar sesión.
    header ("location: principalController.php");
}

echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="icon" href="https://example.com/favicon.ico" type="image/x-icon"><!--favicon-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/login.css">
    <link rel="stylesheet" type="text/css" href="../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../public/css/footer.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet"><!--bootstrap-->

</head>';
include '../views/login.php';
include '../models/loginModel.php';
include '../views/components/footer.php';
echo "</body>
</html>";

?>
