<?php

require_once "../../controladores/CitaController.php";
require_once "../../layouts/header.php";

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
        <div class="mb-6">
            <a href="registrarCita.php" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary to-primary-dark text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 hover:from-primary-dark hover:to-primary-light">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Registrar nueva cita
            </a>
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
                                <th class="px-6 py-4 text-left font-semibold text-sm uppercase tracking-wide">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                        </svg>
                                        Expediente
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left font-semibold text-sm uppercase tracking-wide">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4h6m-6 4h6m-6 4h6"></path>
                                        </svg>
                                        Fecha y Hora
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left font-semibold text-sm uppercase tracking-wide">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        Asunto
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-center font-semibold text-sm uppercase tracking-wide">
                                    <div class="flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5-5-5h5v-5a7.5 7.5 0 00-15 0v5h5l-5 5-5-5h5v-5a7.5 7.5 0 0015 0v5z"></path>
                                        </svg>
                                        Recordatorio
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-center font-semibold text-sm uppercase tracking-wide">
                                    <div class="flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        Acciones
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($citas as $index => $cita): ?>
                                <tr class="hover:bg-slate-50 transition-colors duration-200 <?= $index % 2 === 0 ? 'bg-white' : 'bg-slate-50' ?>">
                                    <!-- Expediente -->
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-primary text-sm">
                                            <?= htmlspecialchars($cita['titulo_expediente'] ?? 'Expediente #' . $cita['id_expediente']) ?>
                                        </div>
                                    </td>
                                    <!-- Fecha -->
                                    <td class="px-6 py-4">
                                        <div class="text-emerald-600 font-semibold text-sm">
                                            <?= htmlspecialchars($cita['fecha']) ?>
                                        </div>
                                    </td>
                                    <!-- Asunto -->
                                    <td class="px-6 py-4">
                                        <div class="text-slate-700 text-sm max-w-xs truncate" title="<?= htmlspecialchars($cita['asunto']) ?>">
                                            <?= htmlspecialchars($cita['asunto']) ?>
                                        </div>
                                    </td>
                                    <!-- Recordatorio -->
                                    <td class="px-6 py-4 text-center">
                                        <?php if ($cita['recordatorio_enviado']): ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                Enviado
                                            </span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Pendiente
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <!-- Acciones -->
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center space-x-2">
                                            <!-- Edit Button -->
                                            <a href="actualizarCita.php?id=<?= $cita['id'] ?>" 
                                               class="inline-flex items-center px-3 py-1.5 bg-slate-600 text-white text-xs font-medium rounded-md hover:bg-slate-700 transition-colors duration-200 shadow-sm hover:shadow-md">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Editar
                                            </a>
                                            <!-- Delete Button -->
                                            <a href="eliminarCita.php?id=<?= $cita['id'] ?>" 
                                               onclick="return confirm('¿Estás seguro de eliminar esta cita?')"
                                               class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-xs font-medium rounded-md hover:bg-red-700 transition-colors duration-200 shadow-sm hover:shadow-md">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Eliminar
                                            </a>
                                        </div>
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