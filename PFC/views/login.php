<body>
<div class="container-fluid">
    <?php
    $volverLogin=true;
    $title = "INICIO DE SESIÓN";
    include('components/header.php');
    ?>
    <div class="row">
        <div class="col text-center">
            <form method="post" action=""> <!-- Realizo formulario que va a la página de registrado-->
                <p>
                    <label>Correo Electrónico: </label><input type="email" name="email" required>
                </p>

                <p>
                    <label>Contraseña: </label><input type="password" name="password" required>
                </p>

                <p>
                    <input type="submit" value="Iniciar sesión" name="sesion">
                </p>
            </form>
            <a href="../controllers/registroController.php">No estoy registrado. Ir al Registro</a>
        </div>
    </div>
</div>

