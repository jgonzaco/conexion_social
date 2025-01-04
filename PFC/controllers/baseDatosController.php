<?php

session_start();//Inicio de sesión.

// Verifica si el usuario está autenticado
if (!isset($_SESSION["profesional"])) {
    header("Location: loginController.php");//Redirige a login.php para registrarse.
    exit();
}

//Selección botón de eliminar
if (isset($_GET['eliminar']) && $_GET['eliminar'] == 'true' && isset($_GET['id'])) {
    try {
        // Conexión a la base de datos
        $cone = "mysql:host=localhost;dbname=pfc";
        $conexiondb = new PDO($cone, 'root', '');

        // Conntrol de errores
        $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener el ID del registro a eliminar
        $id = $_GET['id'];

        // Consulta para eliminar el registro
        $consulta = $conexiondb->prepare('DELETE FROM usuarios WHERE id = ?');
        $consulta->bindParam(1, $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        $consulta->execute();
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";//Mensaje de error
    } finally {
        // Cerrar la conexión
        $conexiondb = null;
    }
}

// Inicio HTML
echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Base de Datos</title><!-- Título de la página -->
    <link rel='icon' href='../public/images/mano.png' type='image/x-icon'><!--favicon-->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'><!--Booststrap diseño responsivo-->
    <link rel='stylesheet' type='text/css' href='../public/css/baseDatos.css'><!--Enlaza css Estilo Base de datos-->
    <link rel='stylesheet' type='text/css' href='../public/css/header.css'><!--Enlaza Estilo header-->
    <link rel='stylesheet' type='text/css' href='../public/css/footer.css'><!--Enlaza css Estilo footer-->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css' rel='stylesheet'><!--Bootstrap para utilizar íconos -->
</head>";

include '../views/baseDatos.php';//Incluye vista baseDatos
include '../models/baseDatosModel.php';//Incluye baseDatosModel, interacción con los datos
include '../views/components/footer.php';//Incluye footer
echo "</body>
</html>";
?><!--Cierre html-->