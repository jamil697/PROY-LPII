<?php
require_once "layouts/header.php";
session_start();
if (isset($_SESSION["id"])) {
    header("Location: verUsuario.php");
    exit;
}
?>

<div class="flex items-center justify-center min-h-screen bg-slate-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Acceso al Sistema</h1>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Usuario:</label>
                <input type="text" name="username" placeholder="Ingrese su usuario"
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Contraseña:</label>
                <input type="password" name="password" placeholder="Ingrese su contraseña"
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Ingresar
            </button>
        </form>

        <p class="text-center mt-4 text-sm text-gray-600">
            ¿No tienes una cuenta?
            <a href="registrarUsuario.php" class="text-blue-600 hover:underline">Regístrate aquí</a>
        </p>

        <div class="mt-4">
            <?php
            require_once "controladores/UsuarioController.php";
            if (!empty($_POST)) {
                $username = trim($_POST["username"]);
                $password = trim($_POST["password"]);
                $errores = 0;

                if (empty($username)) {
                    echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-2 text-center'>El usuario no puede estar vacío.</div>";
                    $errores++;
                }
                if (empty($password)) {
                    echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-2 text-center'>La contraseña no puede estar vacía.</div>";
                    $errores++;
                }
                if (strlen($username) < 4) {
                    echo "<div class='bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-2 rounded mb-2 text-center'>El usuario debe tener al menos 4 caracteres.</div>";
                    $errores++;
                }
                if (!preg_match('/\d/', $username)) {
                    echo "<div class='bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-2 rounded mb-2 text-center'>El usuario debe contener al menos un número.</div>";
                    $errores++;
                }
                if ($errores == 0) {
                    $uc = new UsuarioController();
                    $usuario = $uc->login($username, $password);
                    if ($usuario) {
                        $_SESSION["id"] = $usuario["id"];
                        $_SESSION["username"] = $usuario["username"];
                        $_SESSION["tipo"] = $usuario["tipo"]; // Aquí se guarda el rol
                        header("Location: verUsuario.php");
                        exit;
                    } else {
                        echo "<p class='text-red-600 text-sm'>Usuario o contraseña incorrectos.</p>";
                    }
                }

            }
            ?>
        </div>
    </div>
</div>

<?php require_once "layouts/footer.php"; ?>
