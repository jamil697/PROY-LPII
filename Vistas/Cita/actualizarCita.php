<?php
require_once "../../controladores/CitaController.php";
require_once "../../layouts/header.php";

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

// Procesar formulario si se envió
$mensaje = '';
$tipo_mensaje = '';
if (!empty($_POST)) {
    $resultado = $cc->actualizar($_POST);
    if (strpos($resultado, 'exitosamente') !== false) {
        $mensaje = '¡Cita actualizada exitosamente!';
        $tipo_mensaje = 'success';
    } else {
        $mensaje = 'Error al actualizar la cita: ' . $resultado;
        $tipo_mensaje = 'error';
    }
}
?>

<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'primary': '#1e3a8a',
                    'primary-light': '#3b82f6',
                    'primary-dark': '#1e40af',
                }
            }
        }
    }
</script>

<div class="min-h-screen bg-gradient-to-br from-slate-100 to-slate-200 py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-4">
                <div class="bg-primary rounded-full p-3 mr-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold text-primary">Actualizar Cita</h1>
            </div>
            <p class="text-lg text-slate-600 font-medium">
                Modifica los detalles de tu cita programada
            </p>
        </div>

        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center space-x-2 text-sm">
                <li>
                    <a href="verCita.php" class="text-primary hover:text-primary-dark transition-colors duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4h6m-6 4h6m-6 4h6"></path>
                        </svg>
                        Citas
                    </a>
                </li>
                <li class="text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </li>
                <li class="text-slate-600 font-medium">Actualizar</li>
            </ol>
        </nav>

        <!-- Mensaje de estado -->
        <?php if ($mensaje): ?>
            <div class="mb-6 p-4 rounded-lg shadow-sm <?= $tipo_mensaje === 'success' ? 'bg-emerald-50 border-l-4 border-emerald-400' : 'bg-red-50 border-l-4 border-red-400' ?>">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <?php if ($tipo_mensaje === 'success'): ?>
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        <?php else: ?>
                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        <?php endif; ?>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm <?= $tipo_mensaje === 'success' ? 'text-emerald-700' : 'text-red-700' ?> font-medium">
                            <?= htmlspecialchars($mensaje) ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-primary to-primary-dark px-6 py-4">
                <h2 class="text-xl font-semibold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Detalles de la Cita
                </h2>
            </div>

            <form action="actualizarCita.php?id=<?= $id ?>" method="post" class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- ID Expediente -->
                    <div class="space-y-2">
                        <label for="id_expediente" class="block text-sm font-semibold text-slate-700">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                </svg>
                                ID Expediente
                            </div>
                        </label>
                        <input type="number" 
                               id="id_expediente" 
                               name="id_expediente" 
                               value="<?= $id_expediente ?>" 
                               required
                               class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 bg-slate-50 text-slate-700 font-medium">
                    </div>

                    <!-- Fecha y Hora -->
                    <div class="space-y-2">
                        <label for="fecha" class="block text-sm font-semibold text-slate-700">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4h6m-6 4h6m-6 4h6"></path>
                                </svg>
                                Fecha y Hora
                            </div>
                        </label>
                        <input type="datetime-local" 
                               id="fecha" 
                               name="fecha" 
                               value="<?= $fecha ?>" 
                               required
                               class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 bg-slate-50 text-slate-700 font-medium">
                    </div>
                </div>

                <!-- Asunto -->
                <div class="space-y-2">
                    <label for="asunto" class="block text-sm font-semibold text-slate-700">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Asunto
                        </div>
                    </label>
                    <textarea id="asunto" 
                              name="asunto" 
                              rows="3"
                              placeholder="Describe el motivo de la cita..."
                              class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 bg-slate-50 text-slate-700 font-medium resize-none"><?= htmlspecialchars($asunto) ?></textarea>
                </div>

                <!-- Recordatorio -->
                <div class="space-y-2">
                    <label for="recordatorio_enviado" class="block text-sm font-semibold text-slate-700">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5-5-5h5v-5a7.5 7.5 0 00-15 0v5h5l-5 5-5-5h5v-5a7.5 7.5 0 0015 0v5z"></path>
                            </svg>
                            Estado del Recordatorio
                        </div>
                    </label>
                    <select name="recordatorio_enviado" 
                            id="recordatorio_enviado"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200 bg-slate-50 text-slate-700 font-medium">
                        <option value="1" <?= $recordatorio_enviado ? 'selected' : '' ?>>
                            ✅ Recordatorio enviado
                        </option>
                        <option value="0" <?= !$recordatorio_enviado ? 'selected' : '' ?>>
                            ❌ Recordatorio pendiente
                        </option>
                    </select>
                </div>

                <input type="hidden" name="id" value="<?= $id ?>">

                <!-- Botones -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-slate-200">
                    <button type="submit" 
                            class="flex-1 bg-gradient-to-r from-primary to-primary-dark text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 hover:from-primary-dark hover:to-primary-light flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        Actualizar Cita
                    </button>
                    
                    <a href="verCita.php" 
                       class="flex-1 bg-slate-100 text-slate-700 font-semibold py-3 px-6 rounded-lg shadow-md hover:shadow-lg hover:bg-slate-200 transition-all duration-300 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Cancelar
                    </a>
                </div>
            </form>
        </div>

        <!-- Información adicional -->
        <div class="mt-8 bg-slate-50 rounded-lg p-6 border border-slate-200">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-slate-800 mb-2">Información importante</h3>
                    <ul class="text-sm text-slate-600 space-y-1">
                        <li>• Todos los campos marcados son obligatorios</li>
                        <li>• La fecha y hora deben ser futuras</li>
                        <li>• El recordatorio se enviará automáticamente si está activado</li>
                        <li>• Los cambios se guardarán inmediatamente al actualizar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once "../../layouts/footer.php";
?>