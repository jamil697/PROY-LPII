<?php
require_once "../../controladores/CitaController.php";

// Procesar actualización antes de enviar HTML
if (!empty($_POST)) {
    $cc = new CitaController();
    $cc->actualizar($_POST); // Esto internamente puede usar header(), y debe ejecutarse antes del HTML
    exit;
}

// Obtener ID de la cita
$id = $_GET['id'] ?? $_POST['id'] ?? null;

if (!$id) {
    echo "Error: ID de cita no proporcionado.";
    exit;
}

$cc = new CitaController();
$cita = $cc->buscar($id);

if (!$cita || $cita->rowCount() === 0) {
    echo "Error: Cita no encontrada.";
    exit;
}

foreach ($cita as $c) {
    $id_expediente = $c['id_expediente'];
    $fecha = date('Y-m-d\TH:i', strtotime($c['fecha']));
    $asunto = $c['asunto'];
    $recordatorio_enviado = $c['recordatorio_enviado'];
}
?>

<?php require_once(__DIR__ . "/../../layouts/header.php"); ?>

<!-- Contenedor -->
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-100 via-white to-green-200 py-10 px-4">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-xl w-full">
        <h1 class="text-2xl font-bold text-center text-green-800 mb-6">Actualizar Cita</h1>

        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="space-y-4">
            <input type="hidden" name="id" value="<?= $id ?>">

            <div>
                <label for="id_expediente" class="block text-sm font-semibold text-gray-700">ID Expediente:</label>
                <input type="number" id="id_expediente" name="id_expediente" value="<?= $id_expediente ?>" required
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div>
                <label for="fecha" class="block text-sm font-semibold text-gray-700">Fecha y hora:</label>
                <input type="datetime-local" id="fecha" name="fecha" value="<?= $fecha ?>" required
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div>
                <label for="asunto" class="block text-sm font-semibold text-gray-700">Asunto:</label>
                <input type="text" id="asunto" name="asunto" value="<?= htmlspecialchars($asunto) ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div>
                <label for="recordatorio_enviado" class="block text-sm font-semibold text-gray-700">Recordatorio enviado:</label>
                <select name="recordatorio_enviado" id="recordatorio_enviado"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="1" <?= $recordatorio_enviado ? 'selected' : '' ?>>Sí</option>
                    <option value="0" <?= !$recordatorio_enviado ? 'selected' : '' ?>>No</option>
                </select>
            </div>

            <div class="flex justify-between pt-3">
                <a href="verCita.php"
                   class="bg-gray-400 text-white px-6 py-2 rounded-lg font-semibold hover:bg-gray-600 transition text-center">
                    Cancelar
                </a>
                <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-green-700 transition shadow">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>

<?php require_once(__DIR__ . "/../../layouts/footer.php"); ?>
