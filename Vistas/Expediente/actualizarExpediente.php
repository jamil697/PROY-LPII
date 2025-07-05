<?php
require_once "../../controladores/ExpedienteController.php";
require_once "../../config/Conn.php";

$id = $_GET['id'] ?? $_POST['id'] ?? null;
if (!$id) {
    echo "Error: ID no proporcionado.";
    exit;
}

$ec = new ExpedienteController();
$expediente = $ec->buscar($id);

foreach ($expediente as $exp) {
    $titulo = $exp['titulo'];
    $descripcion = $exp['descripcion'];
    $id_abogado = $exp['id_abogado'];
    $id_cliente = $exp['id_cliente'];
    $estado = $exp['estado'];
}

$mensaje = "";
if (!empty($_POST)) {
    $mensaje = $ec->actualizar($_POST);
}

$conn = new Conn();
$conexion = $conn->conectar();
$abogados = $conexion->query("SELECT id, nombres, apellidos FROM usuarios WHERE tipo = 'abogado'");
$clientes = $conexion->query("SELECT id, nombres, apellidos FROM usuarios WHERE tipo = 'cliente'");
$conn->cerrar();

require_once "../../layouts/header.php";
?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-white to-blue-200 px-4 py-10">
    <div class="w-full max-w-xl bg-white border border-blue-100 rounded-2xl shadow-lg p-8 space-y-6">
        <div class="text-center">
            <div class="mx-auto mb-3 w-12 h-12 flex items-center justify-center bg-blue-100 rounded-full shadow">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-blue-700">Actualizar Expediente</h2>
            <p class="text-gray-500 text-sm">Modifica los datos del expediente seleccionado.</p>
        </div>

        <?php if ($mensaje): ?>
            <div class="text-green-600 text-sm font-semibold text-center"><?= $mensaje ?></div>
        <?php endif; ?>

        <form method="post" class="space-y-4">
            <input type="hidden" name="id" value="<?= $id ?>">

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Título</label>
                <input type="text" name="titulo" required value="<?= htmlspecialchars($titulo) ?>"
                    class="w-full px-3 py-2 rounded-xl border border-blue-200 bg-blue-50 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm" />
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Abogado</label>
                <select name="id_abogado" required
                    class="w-full px-3 py-2 rounded-xl border border-blue-200 bg-white shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm">
                    <option value="">-- Seleccione --</option>
                    <?php foreach ($abogados as $row): ?>
                        <option value="<?= $row['id'] ?>" <?= $row['id'] == $id_abogado ? 'selected' : '' ?>>
                            <?= htmlspecialchars($row['nombres'] . " " . $row['apellidos']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Descripción</label>
                <textarea name="descripcion" rows="3" required
                    class="w-full px-3 py-2 rounded-xl border border-blue-200 bg-blue-50 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm"><?= htmlspecialchars($descripcion) ?></textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Cliente</label>
                <select name="id_cliente" required
                    class="w-full px-3 py-2 rounded-xl border border-blue-200 bg-white shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm">
                    <option value="">-- Seleccione --</option>
                    <?php foreach ($clientes as $row): ?>
                        <option value="<?= $row['id'] ?>" <?= $row['id'] == $id_cliente ? 'selected' : '' ?>>
                            <?= htmlspecialchars($row['nombres'] . " " . $row['apellidos']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Estado</label>
                <select name="estado"
                    class="w-full px-3 py-2 rounded-xl border border-blue-200 bg-white shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm">
                    <option value="abierto" <?= $estado == 'abierto' ? 'selected' : '' ?>>Abierto</option>
                    <option value="en_proceso" <?= $estado == 'en_proceso' ? 'selected' : '' ?>>En Proceso</option>
                    <option value="cerrado" <?= $estado == 'cerrado' ? 'selected' : '' ?>>Cerrado</option>
                </select>
            </div>

            <div class="pt-4 text-center">
                <button type="submit"
                    class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 py-2 rounded-xl text-sm font-semibold shadow transition duration-200 transform hover:-translate-y-1">
                    Guardar Cambios
                </button>
            </div>
            <?php
            $dashboard_url = "#"; // por defecto, en caso de que el rol no sea reconocido
            if ($tipo_usuario === 'admin') {
                $dashboard_url = "../../Dashboards/dashboard_admin.php";
            } elseif ($tipo_usuario === 'abogado') {
                $dashboard_url = "../../Dashboards/dashboard_abogado.php";
            } elseif ($tipo_usuario === 'cliente') {
                $dashboard_url = "../../Dashboards/dashboard_cliente.php";
            }
            ?>

            <a href="<?= $dashboard_url ?>" class="inline-flex items-center gap-2 bg-gradient-to-r from-cyan-400 to-blue-500 hover:from-blue-500 hover:to-cyan-400 text-white px-5 py-2 rounded-lg font-bold shadow-lg text-base transition transform hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Retroceder
            </a>
            
        </form>
    </div>
</div>

<?php require_once "../../layouts/footer.php"; ?>
