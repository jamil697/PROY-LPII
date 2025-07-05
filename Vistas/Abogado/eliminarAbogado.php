<?php
require_once "../../controladores/AbogadoController.php";
require_once "../../layouts/header.php";

$ac = new AbogadoController();

// Si se confirmó la eliminación 
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    echo $ac->eliminar($id);
    exit;
}

$id = $_GET["id"];
$datos = $ac->buscar($id);

// Validar que se encontró
if (!$datos) {
    echo "<div class='text-blue-600 font-bold text-center mt-10'> Abogado no encontrado.</p>";
    exit;
}
?>

<div class="max-w-2xl mx-auto mt-12 bg-white rounded-xl shadow-md p-8">

<h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">¿Estás seguro que deseas eliminar este abogado?</h2>

<table border="1" cellpadding="10" style="margin-bottom: 20px;">
    <tr><th>Username</th><td><?= htmlspecialchars($datos["username"]) ?></td></tr>
    <tr><th>Nombres</th><td><?= htmlspecialchars($datos["nombres"]) ?></td></tr>
    <tr><th>Apellidos</th><td><?= htmlspecialchars($datos["apellidos"]) ?></td></tr>
    <tr><th>Email</th><td><?= htmlspecialchars($datos["email"]) ?></td></tr>
    <tr><th>Colegiatura</th><td><?= htmlspecialchars($datos["colegiatura"]) ?></td></tr>
    <tr><th>Especialidad</th><td><?= htmlspecialchars($datos["especialidad"]) ?></td></tr>
    <tr><th>Experiencia</th><td><?= htmlspecialchars($datos["experiencia"]) ?> años</td></tr>
</table>

<form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
    <input type="hidden" name="id" value="<?= $id ?>">
    <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded hover:bg-blue-700"> Sí, eliminar</button>
    <a href="../Abogado/verAbogado.php" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-blue-700"> Cancelar</a>
</form>

<?php require_once "../../layouts/footer.php"; ?>