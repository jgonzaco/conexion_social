<?php
session_start();//Inicio de sesión.

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
    <title>Inscripcion a los talleres</title>
    <link rel="icon" href="https://example.com/favicon.ico" type="image/x-icon"><!--favicon-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"><!--boostrap-->
    <link rel="stylesheet" type="text/css" href="../public/css/inscripcion_talleres.css"><!--css-->
    <link rel="stylesheet" type="text/css" href="../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../public/css/footer.css"><!--footer-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet"><!--boostrap-->
</head>';
include '../views/inscripcion_talleres.php';
include '../models/inscripcion_talleresModel.php';
include '../views/components/footer.php';
echo "</body>
</html>";
?>
