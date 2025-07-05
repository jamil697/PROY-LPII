<?php
require_once "../../layouts/header.php";
require_once "../../config/Conn.php";
require_once "../../controladores/ExpedienteController.php";

$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ec = new ExpedienteController();
    $resultado = $ec->guardar($_POST);
    if (strpos($resultado, "correctamente") !== false) {
        header("Location: verExpediente.php");
        exit;
    } else {
        $mensaje = $resultado;
    }
}
?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-white to-blue-200 py-4 font-sans">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl px-6 pt-6 pb-8 border border-blue-100">
        <div class="flex flex-col items-center mb-6">
            <div class="bg-blue-100 rounded-full p-3 mb-2 shadow">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </div>
            <h2 class="text-2xl font-extrabold text-blue-700 mb-1 text-center tracking-tight">Registrar Expediente
            </h2>
            <p class="text-gray-500 text-center text-sm">Completa los datos para registrar un nuevo expediente.
            </p>
        </div>
        <?php if ($mensaje): ?>
            <div class="mb-3 text-center text-red-600 font-semibold text-sm"><?= $mensaje ?></div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="space-y-4">
            <div>
                <label for="titulo"
                    class="block text-gray-700 font-semibold mb-1 tracking-wide text-sm">Título</label>
                <input type="text" id="titulo" name="titulo" required
                    class="w-full px-3 py-2 border border-blue-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 transition text-sm font-medium shadow-sm bg-blue-50" />
            </div>
            <div>
                <label for="id_abogado"
                    class="block text-gray-700 font-semibold mb-1 tracking-wide text-sm">Abogado</label>
                <select name="id_abogado" id="id_abogado" required
                    class="w-full px-3 py-2 border border-blue-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 transition bg-white text-sm font-medium shadow-sm">
                    <option value="">-- Seleccione un abogado --</option>
                    <?php
                    $conn = new Conn();
                    $conexion = $conn->conectar();
                    $sql = "SELECT id, nombres, apellidos FROM usuarios WHERE tipo = 'abogado'";
                    $abogados = $conexion->query($sql);
                    foreach ($abogados as $row) {
                        echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['nombres'] . " " . $row['apellidos']) . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="descripcion"
                    class="block text-gray-700 font-semibold mb-1 tracking-wide text-sm">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="3" required
                    class="w-full px-3 py-2 border border-blue-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 transition resize-none text-sm font-medium shadow-sm bg-blue-50"></textarea>
            </div>
            <div>
                <label for="id_cliente"
                    class="block text-gray-700 font-semibold mb-1 tracking-wide text-sm">Cliente</label>
                <select name="id_cliente" id="id_cliente" required
                    class="w-full px-3 py-2 border border-blue-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 transition bg-white text-sm font-medium shadow-sm">
                    <option value="">-- Seleccione un cliente --</option>
                    <?php
                    $sql = "SELECT id, nombres, apellidos FROM usuarios WHERE tipo = 'cliente'";
                    $clientes = $conexion->query($sql);
                    foreach ($clientes as $row) {
                        echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['nombres'] . " " . $row['apellidos']) . "</option>";
                    }
                    $conn->cerrar();
                    ?>
                </select>
            </div>
            <div class="flex justify-center mt-6 gap-6">
                <!-- Botón Registrar -->
                <button type="submit"
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white px-7 py-2 rounded-xl font-bold shadow text-base transition transform hover:-translate-y-1 tracking-wide">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Registrar
                </button>

                <!-- Botón Cancelar en rojo -->
                <a href="verExpediente.php"
                    class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-7 py-2 rounded-xl font-bold shadow text-base transition transform hover:-translate-y-1 tracking-wide">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

<?php require_once "../../layouts/footer.php"; ?>