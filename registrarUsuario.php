<?php
require_once "layouts/header.php";
require_once "controladores/UsuarioController.php";

if (!empty($_POST)) {
    $uc = new UsuarioController();
    $resultado = $uc->guardar($_POST);
    if ($resultado) {
        header("Location: login.php");
        exit;
    } else {
        echo "<div class='text-red-600'>No se pudo registrar al usuario.</div>";
    }
}
?>

<div class="container mx-auto mt-10">
    <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg px-10 pt-8 pb-10">
        <h2 class="text-3xl font-extrabold mb-8 text-center text-blue-700">Registrar Usuario</h2>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2" for="username">Usuario</label>
                <input type="text" id="username" name="username" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>

            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2" for="nombres">Nombres</label>
                <input type="text" id="nombres" name="nombres" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>

            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2" for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>

            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2" for="email">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>

            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2" for="password">Contraseña</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>

            <div class="mb-8">
                <label class="block text-gray-700 font-semibold mb-2" for="tipo">Tipo de Usuario</label>
                <select name="tipo" id="tipo" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition bg-white">
                    <option value="" disabled selected>Seleccione un tipo</option>
                    <option value="admin">Administrador</option>
                    <option value="abogado">Abogado</option>
                    <option value="cliente">Cliente</option>
                    <option value="secretaria">Secretaria</option>
                </select>
            </div>

            <div class="flex justify-between">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Guardar
                </button>
                <a href="verUsuario.php"
                    class="bg-red-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-red-700 transition text-center">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>