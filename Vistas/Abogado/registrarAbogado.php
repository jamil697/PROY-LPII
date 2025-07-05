<?php
require_once "../../layouts/header.php";
require_once "../../Config/Coon.php";
?>

<div class="max-w-3xl mx-auto mt-10 bg-white shadow-md rounded-xl p-8">
<h1 class="text-2xl font-bold text-center mb-8 text-gray-800">Registrar Abogado</h1>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="space-y-6">

    <label class="block text-gray-700 font-medium" for="username">Usuario:</label>
    <input type="text" name="username" id="username" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-500" required><br>

    <label class="block text-gray-700 font-medium" for="password">Contraseña:</label>
    <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-500" required><br>

    <label class="block text-gray-700 font-medium" for="nombres">Nombres:</label>
    <input type="text" name="nombres" id="nombres" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-500" required><br>

    <label class="block text-gray-700 font-medium" for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" id="apellidos" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-500" required><br>

    <label class="block text-gray-700 font-medium" for="email">Correo:</label>
    <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-500" required><br>

    <label class="block text-gray-700 font-medium" for="colegiatura">N° Colegiatura:</label>
    <input type="text" name="colegiatura" id="colegiatura" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-500" required><br>

    <label class="block text-gray-700 font-medium" for="especialidad">Especialidad:</label>
    <input type="text" name="especialidad" id="especialidad" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-500" required><br>

    <label class="block text-gray-700 font-medium" for="experiencia">Experiencia (años):</label>
    <input type="number" name="experiencia" id="experiencia" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-500" required><br>

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow">Registrar</button>
</form>

<?php
require_once "../../controladores/AbogadoController.php";
require_once "../../layouts/footer.php";

if (!empty($_POST)) {
    $ac = new AbogadoController();
    echo $ac->guardar($_POST);
    
}
?>