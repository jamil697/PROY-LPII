<?php
session_start();
require_once "../../controladores/CitaController.php";
require_once "../../layouts/header.php";

$tipo_usuario = $_SESSION['tipo'];
$cc = new CitaController();
$citas = $cc->mostrar();
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
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8 pb-6 border-b-4 border-primary">
            <h1 class="text-4xl md:text-5xl font-bold text-primary mb-2">
                📅 Citas Programadas
            </h1>
            <p class="text-lg text-slate-600 font-medium">
                Gestiona y organiza todas tus citas de manera eficiente
            </p>
            
        </div>

        <!-- New Appointment Button -->
        <div class="mb-6 flex justify-between items-center">
        <!-- Botón Registrar -->
        <div>
            <a href="registrarCita.php" 
            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary to-primary-dark text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 hover:from-primary-dark hover:to-primary-light">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Registrar nueva cita
            </a>
        </div>

    <!-- Botón Volver -->
        <div>
            <?php
            $dashboard_url = "#";
            if ($tipo_usuario === 'admin') {
                $dashboard_url = "../../Dashboards/dashboard_admin.php";
            } elseif ($tipo_usuario === 'abogado') {
                $dashboard_url = "../../Dashboards/dashboard_abogado.php";
            } elseif ($tipo_usuario === 'cliente') {
                $dashboard_url = "../../Dashboards/dashboard_cliente.php";
            }
            ?>
            <a href="<?= $dashboard_url ?>" 
            class="inline-flex items-center gap-2 bg-gradient-to-r from-cyan-400 to-blue-500 hover:from-blue-500 hover:to-cyan-400 text-white px-5 py-2 rounded-lg font-bold shadow-lg text-base transition transform hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Volver al Inicio
            </a>
            </div>
        </div>


        <!-- Content -->
        <?php if (empty($citas)): ?>
            <!-- Empty State -->
            <div class="bg-white rounded-xl shadow-lg p-12 text-center">
                <div class="text-6xl mb-4">📋</div>
                <h3 class="text-2xl font-semibold text-slate-700 mb-2">No hay citas programadas</h3>
                <p class="text-slate-500 text-lg mb-6">Comienza registrando tu primera cita</p>
                <a href="registrarCita.php" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary to-primary-dark text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Crear primera cita
                </a>
            </div>
        <?php else: ?>
            <!-- Table Container -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <!-- Table Head -->
                        <thead class="bg-gradient-to-r from-primary to-primary-dark text-white">
                            <tr>
                                <th class="px-6 py-4 text-left font-semibold text-sm uppercase tracking-wide">Expediente</th>
                                <th class="px-6 py-4 text-left font-semibold text-sm uppercase tracking-wide">Fecha y Hora</th>
                                <th class="px-6 py-4 text-left font-semibold text-sm uppercase tracking-wide">Asunto</th>
                                <th class="px-6 py-4 text-center font-semibold text-sm uppercase tracking-wide">Recordatorio</th>
                                <th class="px-6 py-4 text-center font-semibold text-sm uppercase tracking-wide">Acciones</th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($citas as $index => $cita): ?>
                                <tr class="hover:bg-slate-50 transition-colors duration-200 <?= $index % 2 === 0 ? 'bg-white' : 'bg-slate-50' ?>">
                                    <td class="px-6 py-4 font-semibold text-primary text-sm">
                                        <?= htmlspecialchars($cita['titulo_expediente'] ?? 'Expediente #' . $cita['id_expediente']) ?>
                                    </td>
                                    <td class="px-6 py-4 text-emerald-600 font-semibold text-sm">
                                        <?= htmlspecialchars($cita['fecha']) ?>
                                    </td>
                                    <td class="px-6 py-4 text-slate-700 text-sm max-w-xs truncate" title="<?= htmlspecialchars($cita['asunto']) ?>">
                                        <?= htmlspecialchars($cita['asunto']) ?>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <?php if ($cita['recordatorio_enviado']): ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                                ✅ Enviado
                                            </span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                ❌ Pendiente
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'admin'): ?>
                                            <div class="flex justify-center space-x-2">
                                                <a href="actualizarCita.php?id=<?= $cita['id'] ?>" 
                                                   class="inline-flex items-center px-3 py-1.5 bg-slate-600 text-white text-xs font-medium rounded-md hover:bg-slate-700 transition">
                                                    ✏️ Editar
                                                </a>
                                                <a href="eliminarCita.php?id=<?= $cita['id'] ?>" 
                                                   onclick="return confirm('¿Estás seguro de eliminar esta cita?')"
                                                   class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-xs font-medium rounded-md hover:bg-red-700 transition">
                                                    🗑️ Eliminar
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            <span class="text-slate-400 text-xs italic">Sin permisos</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
require_once "../../layouts/footer.php";
?>
