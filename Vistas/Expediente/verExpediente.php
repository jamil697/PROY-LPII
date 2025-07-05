<?php
session_start();
require_once "../../controladores/ExpedienteController.php";
require_once "../../layouts/header.php";

// Verificar sesión
if (!isset($_SESSION['id'])) {
    header("Location: ../../login.php");
    exit;
}

$tipo_usuario = $_SESSION['tipo'];
$ec = new ExpedienteController();
$expedientes = $ec->mostrar();
?>

<div class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-200 py-10">
    <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-2xl p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-extrabold text-blue-700 flex items-center gap-2">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-6 4h6a2 2 0 002-2v-5a2 2 0 00-2-2h-2a2 2 0 00-2 2v5a2 2 0 002 2z" />
                </svg>
                Expedientes del Sistema
            </h1>
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
        </div>

        <div class="overflow-x-auto rounded-xl">
            <table class="min-w-full table-auto text-left shadow rounded-lg overflow-hidden">
                <thead class="bg-blue-100 text-blue-800 font-bold">
                    <tr>
                        <th class="px-4 py-3">Título</th>
                        <th class="px-4 py-3">Descripción</th>
                        <th class="px-4 py-3">Fecha de Apertura</th>
                        <th class="px-4 py-3">Abogado</th>
                        <th class="px-4 py-3">Cliente</th>
                        <th class="px-4 py-3">Estado</th>
                        <?php if ($tipo_usuario === 'admin' || $tipo_usuario === 'abogado'): ?>
                            <th class="px-4 py-3 text-center" colspan="2">Acciones</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($expedientes)): ?>
                        <?php foreach ($expedientes as $i => $exp): ?>
                            <tr class="<?= $i % 2 === 0 ? 'bg-blue-50' : 'bg-white' ?> border-t hover:bg-blue-100 transition">
                                <td class="px-4 py-3"><?= htmlspecialchars($exp['titulo']) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($exp['descripcion']) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($exp['fecha_apertura']) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($exp['nombre_abogado']) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($exp['nombre_cliente']) ?></td>
                                <td class="px-4 py-3">
                                    <span class="inline-block w-28 text-center px-3 py-1 rounded-full text-xs font-semibold
                                        <?= $exp['estado'] === 'abierto'
                                            ? 'bg-green-100 text-green-700'
                                            : ($exp['estado'] === 'en_proceso'
                                                ? 'bg-yellow-100 text-yellow-700'
                                                : 'bg-red-100 text-red-700') ?>">
                                        <?= ucfirst(htmlspecialchars($exp['estado'])) ?>
                                    </span>

                                </td>
                                <?php if ($tipo_usuario === 'admin' || $tipo_usuario === 'abogado'): ?>
                                    <td class="px-2 py-3 text-center">
                                        <a href="actualizarExpediente.php?id=<?= $exp['id'] ?>"
                                           class="inline-flex items-center justify-center text-yellow-500 hover:text-yellow-700 transition"
                                           title="Editar">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6M4 20h4l10-10a2 2 0 
                                                         00-2.828-2.828L5.172 17.172A2 2 0 
                                                         004 18.586V20z" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td class="px-2 py-3 text-center">
                                        <a href="eliminarExpediente.php?id=<?= $exp['id'] ?>"
                                           onclick="return confirm('¿Estás seguro de eliminar este expediente?')"
                                           class="inline-flex items-center justify-center text-red-600 hover:text-red-800 transition"
                                           title="Eliminar">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0
                                                         0116.138 21H7.862a2 2 0
                                                         01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1
                                                         1 0 00-1-1h-4a1 1 0 00-1 1v3h6z" />
                                            </svg>
                                        </a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center text-gray-500 py-8">No hay expedientes registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            
        </div>
        <div class="flex justify-center mt-6">
            <a href="registrarExpediente.php"
            class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-5 py-2 rounded-lg font-bold shadow-lg transition transform hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4" />
                </svg>
                Registrar nuevo expediente
            </a>
        </div>
    </div>
</div>

<?php require_once "../../layouts/footer.php"; ?>
