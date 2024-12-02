<body>
<div class="container-fluid">
    <?php
    $title = "BIENVENID@";
    include('components/header.php');
    ?>
    <div class="row" id="chinchetas">
        <div class="col-lg-3">
            <form method="post" action="../controllers/principalController.php">
                <input type="submit" name="button" value="Base de datos">
            </form>
        </div>
        <div class="col-lg-3">
            <form method="post" action="../controllers/principalController.php">
                <input type="submit" name="button" value="Casos Particulares">
            </form>
        </div>
        <div class="col-lg-3">
            <form method="post" action="../controllers/principalController.php">
                <input type="submit" name="button" value="Tarjetas Familia">
            </form>
        </div>
        <div class="col-lg-3">
            <form method="post" action="../controllers/principalController.php">
                <input type="submit" name="button" value="Talleres">
            </form>
        </div>
    </div>
</div>
