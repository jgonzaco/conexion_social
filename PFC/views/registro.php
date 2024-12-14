<body>
<div class="container-fluid">
    <?php
    $volverRegistro=true;//Variable identificar la navegación de la página
    $title = "REGÍSTRATE";//Cabecera regístrate
    include('components/header.php');// Se incluye el archivo de la cabecera
    ?>
    <div class="row">
        <div class="col text-center">
            <h1>Introduzca sus datos</h1><!--Título principal para registrarse profesionalmente-->
            <form method="post" action="../controllers/registroController.php"> <!--Formulario no registrado-->
                <p>
                    <label>Nombre: </label> <input type="text" name="nombre" required>
                </p>

                <p>
                    <label>Primer apellido: </label> <input type="text" name="apellido1" required>
                </p>

                <p>
                    <label>Segundo apellido: </label> <input type="text" name="apellido2" required>
                </p>

                <p>
                    <label>Pais: </label> <input type="text" name="pais" required>
                </p>

                <p>
                    <label>Municipio: </label> <input type="text" name="municipio" required>
                </p>

                <p>
                    <label>Dirección: </label> <input type="text" name="direccion" required>
                </p>

                <p>
                    <label>Teléfono: </label> <input type="number" name="telefono" required>
                </p>

                <p>
                    <label>Correo: </label> <input type="email" name="correo" required>
                </p>

                <p>
                    <label>contraseña: </label> <input type="password" name="contraseña" required>
                </p>

                <p>
                    <input type="submit" value="Registro" name="registro">
                </p>

            </form>
            <a href="../controllers/loginController.php">Ya estoy registrado</a><!--Redirige a Login-->
            <br>
        </div>
    </div>
</div>
