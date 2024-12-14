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
  <title>Modificar Base de Datos</title><!-- Título de la página -->
  <link rel="icon" href="../public/images/mano.png" type="image/x-icon"><!--favicon-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"><!--Booststrap diseño responsivo-->
  <link rel="stylesheet" type="text/css" href="../public/css/editar_tf.css"><!--Enlaza css Estilo editar_tf-->
  <link rel="stylesheet" type="text/css" href="../public/css/header.css"><!--Enlaza Estilo header-->
    <link rel="stylesheet" type="text/css" href="../public/css/footer.css"><!--Enlaza css Estilo footer-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet"><!--Bootstrap para utilizar íconos -->
</head>';



// Verificar si es una solicitud GET (para mostrar el formulario de edición)
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['ts'])&& isset($_GET['fechaDerivacion']) && isset($_GET['nombre']) && isset($_GET['apellido1'])&& isset($_GET['apellido2'])&& isset($_GET['ingresos'])&& isset($_GET['fnacimiento']) && isset($_GET['genero']) && isset($_GET['procedencia'])
    && isset($_GET['telefono'])&& isset($_GET['intervencion'])&& isset($_GET['finalizacion'])&& isset($_GET['seguimiento'])) {

// Obtener los valores de los parámetros
    $id = $_GET['id'];
    $ts = $_GET['ts'];
    $fechaDerivacion = $_GET['fechaDerivacion'];
    $nombre = $_GET['nombre'];
    $apellido1 = $_GET['apellido1'];
    $apellido2 = $_GET['apellido2'];
    $ingresos = $_GET['ingresos'];
    $fnacimiento = $_GET['fnacimiento'];
    $genero = $_GET['genero'];
    $procedencia = $_GET['procedencia'];
    $telefono = $_GET['telefono'];
    $intervencion = $_GET['intervencion'];
    $finalizacion = $_GET['finalizacion'];
    $seguimiento = $_GET['seguimiento'];

}

    include '../models/modificarModel.php';//Incluye modificarModel, interacción con los datos
    include '../views/modificar.php';//Incluye vista principal
    include '../views/components/footer.php';//Incluye footer
    echo "</body>
    </html>";

?><!--Cierre html-->