<?php
if($_SERVER['REQUEST_METHOD']=='POST')// Comprobamos que la llamada viene de POST
    switch ($_POST["button"]){// Se realiza un Switch case para redirigir a la ventana que se quiere
        case "Base de datos":
            header("Location: baseDatosController.php");
            break;
        case "Casos Particulares":
            header("Location: casosParticularesController.php");
            break;
        case "Tarjetas Familia":
            header("Location: tfController.php");
            break;
        case "Talleres":
            header("Location: talleresController.php");
            break;
        default:
            echo "Error";

    }
?>
