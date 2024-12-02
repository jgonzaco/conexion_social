<?php

session_start();

if (!isset($_SESSION["coleccionista"])) {
    header("Location: loginController.php");
    exit();
}

echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Casos Particulares</title>
    <link rel='icon' href='https://example.com/favicon.ico' type='image/x-icon'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' href='../public/css/casosParticulares.css'>
    <link rel='stylesheet' type='text/css' href='../public/css/header.css'>
    <link rel='stylesheet' type='text/css' href='../public/css/footer.css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css' rel='stylesheet'>
</head>
";
include '../views/casosParticulares.php';
include '../models/casosParticularesModel.php';
include '../views/components/footer.php';
echo "</body>
</html>";
?>
