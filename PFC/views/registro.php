<body>
<div class="container-fluid">
    <?php
    $volverRegistro=true;
    $title = "REGÍSTRATE";
    include('components/header.php');
    ?>
    <div class="row">
        <div class="col text-center">
            <h1>Introduzca sus datos</h1>
            <form method="post" action="../controllers/registroController.php"> <!-- Realizo formulario no registrado-->
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
            <a href="../controllers/loginController.php">Ya estoy registrado</a>
            <br>
        </div>
    </div>
</div>
