<body>
<div class="container-fluid">
    <?php
    $volverLogin=true;//Variable identificar la navegación de la página
    $title = "INICIO DE SESIÓN";//Cabecera Inicio de sesión
    include('components/header.php');// Se incluye el archivo de la cabecera
    ?>
    <div class="row">
        <div class="col text-center">
            <form method="post" action=""> <!-- Formulario loguearse-->
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
            <a href="../controllers/registroController.php">No estoy registrado. Ir al Registro</a><!--Redirige a Regístrate-->
        </div>
    </div>
</div>

