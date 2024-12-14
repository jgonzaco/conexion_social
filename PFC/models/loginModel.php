<?php
// Creación de variables junto a array error
$errores = []; //incialializamos la variable errores para posteriormente introducir los posibles errores que pudiera haber introducido la persona usuaria.
$correo = isset($_POST["email"]) ? $_POST["email"] : "";
$contraseña = isset($_POST["password"]) ? $_POST["password"] : "";
$sesion = isset($_POST["sesion"]) ? $_POST["sesion"] : "";

if (!empty($sesion)){
    // Se realiza validación de página. En el caso de que no exista errores, se enviará a la página de persona. Que es quien elije a dónde ir a usuario o trabajador.
    // Se realizan validaciones
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Se ejecuta el siguiente código al ser la solicitud del formulario de tipo post.

        //Creación de función validación email
        function validar_correo($correo)
        {
            return filter_var($correo, FILTER_VALIDATE_EMAIL);
        }

        // Creación de función validación Contraseña
        function validar_contraseña($contraseña)
        {
            return !(trim($contraseña) == '');
        }

        // función validación email
        if (!validar_correo($correo)) {
            $errores[] = "Introduzca un correo correcto";
        }

        // función validación contraseña
        if (!validar_contraseña($contraseña)) {
            $errores[] = "Introduzca una contraseña correcta";
        }

        if (isset($errores)) { // Si hay errores, saca por pantalla los errores. Sino introduce al usuario registrado.
            echo "<ul class='errores'>";
            foreach ($errores as $error) {
                echo "<li>" . $error . "</li>";
            }
            echo "</ul>";
        }

        if (!$errores) {// Si no hay errores
            $cone = "mysql:host=localhost; dbname=pfc";

            $conexiondb = new PDO($cone, "root", ""); //Realizo la conexión. No puse ninguna contraseña.
            $conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Veo posibles errores


            $consulta = $conexiondb->prepare("SELECT * FROM trabajadores"); // Preparación de la consulta.
            $consulta->execute(); // Se ejecuta consulta.

            $resultados = $consulta->fetchall(PDO::FETCH_ASSOC); //Hace que me saque toda las filas de la tabla.
            $verificacion = false; // Inicializo verificación a falso para poder utilizarlo posteriormente en el foreach.
            $id_persona = null; // creo una valiable id_persona (foreign key)

            foreach ($resultados as $resul) { // Recorro el correo electrónico y contraseña para ver si coinciden.
                if (isset($_POST["email"]) && isset($_POST["password"]) && $_POST["email"] == $resul["correo_electronico"] && $_POST["password"] == $resul["contraseña"]) {
                    $verificacion = true; // Me "guardo" toda la condición en la verificaci
                    $id_persona = $resul["id"]; // Asigno al id_persona el id del profesional.
                }
            }

            if ($verificacion) { // Si la verificación es correcta me lleva a principalController.php, sino deja un mensaje de error.
                session_start(); // Se inicializa la sesión del usuario
                $_SESSION["profesional"] = $id_persona; //Establezco la sesión al usuario.
                header("location:../controllers/principalController.php"); // Envía directamente al perfil principal del trabajador
            } else {
                echo "<h5>Error, no coincide el usuario o contraseña</h5>"; // En caso de que el usuario o contraseña no coincida, se dejará el siguiente mensaje.
            }
        }
    }
}

?>
