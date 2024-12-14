<body>
<div class="container-fluid">
    <?php
    $title = "BIENVENID@";//Cabecera Bienvenida
    include('components/header.php');// Se incluye el archivo de la cabecera
    ?>
    <!--Creación diferentes formularios para acceder a cada apartado-->
    <div class="row" id="chinchetas">
        <div class="col-lg-3">
            <form method="post" action="../controllers/principalController.php"><!--Base de datos-->
                <input type="submit" name="button" value="Base de datos">
            </form>
        </div>
        <div class="col-lg-3">
            <form method="post" action="../controllers/principalController.php"><!--Casos Particulares-->
                <input type="submit" name="button" value="Casos Particulares">
            </form>
        </div>
        <div class="col-lg-3">
            <form method="post" action="../controllers/principalController.php"><!--Tarjeta Familia-->
                <input type="submit" name="button" value="Tarjetas Familia">
            </form>
        </div>
        <div class="col-lg-3">
            <form method="post" action="../controllers/principalController.php"><!--Talleres-->
                <input type="submit" name="button" value="Talleres">
            </form>
        </div>
    </div>
</div>
