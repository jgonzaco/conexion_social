
<div class="row" id="banda-superior"><!--División de encabezado 4-4-4-->
    <div class="col-lg-4">
        <a href='../controllers/principalController.php'>
           <img src="../public/images/logo.png" alt="Logo" class="img-responsive"></a><!--Imagen redirige a principal.php-->
    </div>
    <div id='insertar' class='col-lg-4'><?php echo isset($title) ? $title : 'Conexion Social'; ?></div><!--Muestra el título de la página si está definido, sino muestra conexión social-->
    <?php
    // Verificación de diferentes variables, introducción de cabecera y generación de enlaces para "volver"
    if(isset($volver) && $volver){
        echo "<div id='volver' class='col-lg-4'><a href='../controllers/principalController.php'><i class='bi bi-skip-backward-fill'></i></a></div>";
    }else
        if (isset($volverbd) && $volverbd){
            echo "<div id='volver' class='col-lg-4'><a href='../controllers/baseDatosController.php'><i class='bi bi-skip-backward-fill'></i></a></div>";
    }else
        if(isset($volvercp) && $volvercp){
            echo "<div id='volver' class='col-lg-4'><a href='../controllers/casosParticularesController.php'><i class='bi bi-skip-backward-fill'></i></a></div>";
        }else
            if(isset($volvertf) && $volvertf){
                echo "<div id='volver' class='col-lg-4'><a href='../controllers/tfController.php'><i class='bi bi-skip-backward-fill'></i></a></div>";
            }
            else
                if(isset($volverTaller) && $volverTaller){
                    echo "<div id='volver' class='col-lg-4'><a href='../controllers/talleresController.php'><i class='bi bi-skip-backward-fill'></i></a></div>";
                }else
                    if(isset($volverLogin) && $volverLogin){
                        echo "<div id='volver' class='col-lg-4'><a href='../index.html'><i class='bi bi-skip-backward-fill'></i></a></div>";
                    }else
                        if(isset($volverRegistro) && $volverRegistro){
                            echo "<div id='volver' class='col-lg-4'><a href='../controllers/loginController.php'><i class='bi bi-skip-backward-fill'></i></a></div>";
                        }
    else {
        echo "<div id='cerrar' class='col-lg-4'>
            <form method='post' action='../controllers/loginController.php'>
                <button type='submit' name='cerrar_sesion' class='btn btn-danger'>
                        <i class='bi bi-person'></i>
                    </button>
                </form>
            </div>";
    }
  ?>
</div>
