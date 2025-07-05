<?php
require_once "../../layouts/header.php";
require_once "../../config/Conn.php";   
?>

<div class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-200 flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-xl bg-white rounded-2xl shadow-xl p-8 space-y-6">
        <h1 class="text-2xl font-bold text-blue-700 text-center">Registrar Cita</h1>

        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="space-y-4">

            <!-- Expediente -->
            <div>
                <label for="id_expediente" class="block text-sm font-semibold text-gray-700 mb-1">Expediente:</label>
                <select name="id_expediente" id="id_expediente" required
                    class="w-full px-3 py-2 rounded-xl border border-blue-200 bg-white shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm">
                    <option value="">-- Seleccione un expediente --</option>
                    <?php
                    $conn = new Conn();
                    $conexion = $conn->conectar();
                    $sql = "SELECT id, titulo FROM expedientes";
                    $expedientes = $conexion->query($sql);
                    foreach ($expedientes as $exp) {
                        echo "<option value='" . $exp['id'] . "'>" . $exp['titulo'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Fecha -->
            <div>
                <label for="fecha" class="block text-sm font-semibold text-gray-700 mb-1">Fecha y hora:</label>
                <input type="datetime-local" id="fecha" name="fecha" required
                    class="w-full px-3 py-2 rounded-xl border border-blue-200 bg-blue-50 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm">
            </div>

            <!-- Asunto -->
            <div>
                <label for="asunto" class="block text-sm font-semibold text-gray-700 mb-1">Asunto:</label>
                <input type="text" id="asunto" name="asunto" maxlength="255"
                    class="w-full px-3 py-2 rounded-xl border border-blue-200 bg-blue-50 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm">
            </div>

            <!-- Recordatorio -->
            <div>
                <label for="recordatorio_enviado" class="block text-sm font-semibold text-gray-700 mb-1">Recordatorio enviado:</label>
                <select name="recordatorio_enviado" id="recordatorio_enviado" required
                    class="w-full px-3 py-2 rounded-xl border border-blue-200 bg-white shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm">
                    <option value="0" selected>No</option>
                    <option value="1">Sí</option>
                </select>
            </div>

            <!-- Botón -->
            <div class="pt-4 text-center">
                <button type="submit"
                    class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 py-2 rounded-xl text-sm font-semibold shadow transition duration-200 transform hover:-translate-y-1">
                    Registrar
                </button>
            </div>
            <a href="verCita.php"
                    class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-7 py-2 rounded-xl font-bold shadow text-base transition transform hover:-translate-y-1 tracking-wide">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Cancelar
                </a>
        </form>
    </div>
</div>

<?php
require_once "../../controladores/CitaController.php";
require_once "../../layouts/footer.php";

if (!empty($_POST)) {
    $cc = new CitaController();
    echo $cc->guardar($_POST);
    echo "<script>window.location.href='verCita.php';</script>";
}
?>
