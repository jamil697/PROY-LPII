<?php
require_once("../../controladores/UsuarioController.php");
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: verUsuario.php");
    exit;
}

$id = null;
$username = $nombres = $apellidos = $email = $tipo = "";

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
} elseif (isset($_POST["id"])) {
    $id = (int)$_POST["id"];
}

// Procesar actualización
if ($_SERVER["REQUEST_METHOD"] === "POST" && $id !== null) {
    $uc = new UsuarioController();
    $resultado = $uc->actualizar($_POST);
    if ($resultado) {
        header("Location: verUsuario.php");
        exit;
    } else {
        $mensaje = "No se pudo actualizar el usuario.";
    }
}

// Obtener datos del usuario para mostrar en el formulario
if ($id !== null) {
    $uc = new UsuarioController();
    $usuarioStmt = $uc->buscar($id);
    $usuario = $usuarioStmt->fetch(PDO::FETCH_ASSOC);
    if ($usuario) {
        $username = $usuario["username"];
        $nombres = $usuario["nombres"];
        $apellidos = $usuario["apellidos"];
        $email = isset($usuario["email"]) ? $usuario["email"] : "";
        $tipo = $usuario["tipo"];
    } else {
        $mensaje = "Usuario no encontrado.";
    }
} else {
    $mensaje = "Error: No se recibió un ID válido para actualizar.";
}
?>

<?php require_once(__DIR__ . "/../../layouts/header.php"); ?>

<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-blue-100 via-white to-blue-200 py-10">
    <div class="w-full max-w-xl bg-white rounded-2xl shadow-2xl px-10 pt-8 pb-10">
        <h2 class="text-3xl font-extrabold mb-8 text-center text-blue-700 flex items-center gap-2">
            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6" />
            </svg>
            Actualizar Usuario
        </h2>
        <?php if (!empty($mensaje)): ?>
            <div class="mb-4 text-center text-red-600 font-semibold"><?= $mensaje ?></div>
        <?php endif; ?>
        <form method="POST" action="" class="space-y-5">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
            <div>
                <label class="block text-gray-700 font-semibold mb-2" for="username">Usuario</label>
                <input type="text" id="username" name="username" required
                    value="<?= htmlspecialchars($username) ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2" for="nombres">Nombres</label>
                <input type="text" id="nombres" name="nombres" required
                    value="<?= htmlspecialchars($nombres) ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2" for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" required
                    value="<?= htmlspecialchars($apellidos) ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2" for="email">Email</label>
                <input type="email" id="email" name="email" required
                    value="<?= htmlspecialchars($email) ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2" for="tipo">Tipo de Usuario</label>
                <select name="tipo" id="tipo" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition bg-white">
                    <option value="" disabled>Seleccione un tipo</option>
                    <option value="admin" <?= $tipo == "admin" ? "selected" : "" ?>>Administrador</option>
                    <option value="abogado" <?= $tipo == "abogado" ? "selected" : "" ?>>Abogado</option>
                    <option value="cliente" <?= $tipo == "cliente" ? "selected" : "" ?>>Cliente</option>
                    <option value="secretaria" <?= $tipo == "secretaria" ? "selected" : "" ?>>Secretaria</option>
                </select>
            </div>
            <div class="flex justify-between mt-8">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Guardar Cambios
                </button>
                <a href="verUsuario.php"
                    class="bg-gray-400 text-white px-6 py-2 rounded-lg font-semibold hover:bg-gray-600 transition text-center">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

<?php require_once(__DIR__ . "/../../layouts/footer.php"); ?>
