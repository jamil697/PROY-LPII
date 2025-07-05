<?php
require_once "../../controladores/CitaController.php";

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

<h1>Actualizar Cita</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="id_expediente">ID Expediente:</label>
    <input type="number" id="id_expediente" name="id_expediente" value="<?= $id_expediente ?>" required><br>

    <label for="fecha">Fecha y hora:</label>
    <input type="datetime-local" id="fecha" name="fecha" value="<?= $fecha ?>" required><br>

    <label for="asunto">Asunto:</label>
    <input type="text" id="asunto" name="asunto" value="<?= htmlspecialchars($asunto) ?>"><br>

    <label for="recordatorio_enviado">Recordatorio enviado:</label>
    <select name="recordatorio_enviado" id="recordatorio_enviado">
        <option value="1" <?= $recordatorio_enviado ? 'selected' : '' ?>>Sí</option>
        <option value="0" <?= !$recordatorio_enviado ? 'selected' : '' ?>>No</option>
    </select><br>

    <input type="hidden" name="id" value="<?= $id ?>">
    <button type="submit">Actualizar</button>
</form>

<?php
// Ejecutar actualización al enviar el formulario
if (!empty($_POST)) {
    echo $cc->actualizar($_POST);
}
?>