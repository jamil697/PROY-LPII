<?php
    require_once "layouts/header.php";
    session_start();
    if (isset($_SESSION["id"])) {
        header("Location: verUsuario.php");
        exit;
    }

?>
<div class="container mt-5" style="max-width: 400px;">
    <h1>Acceso al Sistema</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="formulario">
        <div class="form-group">
            <label for="username" class="form-label">Usuario:</label><br>
            <input type="text" name="username" placeholder="Ingrese su usuario" class="form-control"><br>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Contraseña:</label><br>
            <input type="password" name="password" placeholder="Ingrese su contraseña" class="form-control"><br>
        </div>
        <input type="submit" value="Ingresar" class="btn btn-primary"><br>
    </form>
    <br>
    <p class="text-center">¿No tienes una cuenta? <a href="registrarUsuario.php">Regístrate aquí</a></p>
</div>
<?php
require_once "Controladores/UsuarioController.php";
    if(!empty($_POST)){
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $errores=0;
        if($username == " ") {
            echo "<div class='alert alert-danger'>El usuario no puede estar vacío.</div>";
            $errores++;
        }
        if ($password == " ") {
            echo "<div class='alert alert-danger'>La contraseña no puede estar vacía.</div>";
            $errores++;
        }
        if(strlen($username) != 8 && strlen($username) != 11){
            echo "<div class='alert alert-danger'>El usuario debe tener 8 o 11 caracteres.</div>";
            $errores++;
        }
        if(preg_match('/\d/', $username) == 0) {
            echo "<div class='alert alert-danger'>El usuario debe contener al menos un número.</div>";
            $errores++;
        }
        if($errores == 0){
            $uc = new UsuarioController();
            $resultado = $uc->login($username, $password);
            if ($resultado) {
                echo "<div class='alert alert-success'>$resultado</div>";
            } else {
                echo "<div class='alert alert-danger'>Usuario o contraseña incorrectos.</div>";
            }
        }
    }
require_once "layouts/footer.php";
?>