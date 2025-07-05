<?php
session_start();
require_once __DIR__ . "/../../controladores/UsuarioController.php";
require_once(__DIR__ . "/../../layouts/header.php");

if (!isset($_SESSION["id"]) || $_SESSION["tipo"] !== "admin") {
    header("location: ../../login.php");
    exit;
}

$uc = new UsuarioController();
$usuarios = $uc->mostrar();
?>

<div class="min-h-screen flex flex-col items-center justify-start bg-gradient-to-br from-blue-100 via-white to-blue-200 py-10">
    <div class="w-full max-w-5xl bg-white rounded-2xl shadow-2xl p-8">
        <div class="mb-8">
            <h1 class="text-4xl font-extrabold text-blue-800 flex items-center gap-3">
                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Gestión de Usuarios
            </h1>
            <p class="text-gray-600 mt-1">Bienvenido, <span class="font-semibold text-blue-700"><?= htmlspecialchars($_SESSION['username']) ?></span></p>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto text-left rounded-xl overflow-hidden">
                <thead class="bg-gradient-to-r from-blue-400 to-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nombres</th>
                        <th class="px-4 py-3">Apellidos</th>
                        <th class="px-4 py-3">Tipo</th>
                        <th class="px-4 py-3 text-center" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $i => $usuario): ?>
                        <tr class="<?= $i % 2 === 0 ? 'bg-blue-50' : 'bg-white' ?> border-t hover:bg-blue-100 transition">
                            <td class="px-4 py-3 font-semibold"><?= htmlspecialchars($usuario['id']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($usuario['nombres']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($usuario['apellidos']) ?></td>
                            <td class="px-4 py-3">
                                <?php
                                    $tipo = $usuario['tipo'];
                                    $color = 'bg-blue-200 text-blue-800 border-blue-400';
                                    if ($tipo === 'abogado') $color = 'bg-yellow-100 text-yellow-700 border-yellow-400';
                                    if ($tipo === 'cliente') $color = 'bg-green-100 text-green-700 border-green-400';
                                    if ($tipo === 'secretaria') $color = 'bg-pink-100 text-pink-700 border-pink-400';
                                ?>
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full border font-semibold text-sm <?= $color ?>" style="min-width:120px; justify-content:center;">
                                    <?php if ($tipo === 'admin'): ?>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17a4 4 0 004-4V7a4 4 0 10-8 0v6a4 4 0 004 4z" /></svg>
                                    <?php elseif ($tipo === 'abogado'): ?>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 0a2 2 0 01-2 2H9a2 2 0 01-2-2m2-2a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                    <?php elseif ($tipo === 'cliente'): ?>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    <?php else: ?>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" /></svg>
                                    <?php endif; ?>
                                    <?= ucfirst(htmlspecialchars($tipo)) ?>
                                </span>
                            </td>
                            <td class="px-2 py-3 text-center">
                                <a href="actualizarUsuario.php?id=<?= $usuario['id'] ?>" class="inline-flex items-center justify-center text-yellow-500 hover:text-yellow-700 transition" title="Editar">
                                    <!-- Icono lápiz -->
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6M4 20h4l10-10a2 2 0 00-2.828-2.828L5.172 17.172A2 2 0 004 18.586V20z" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-2 py-3 text-center">
                                <a href="eliminarUsuario.php?id=<?= $usuario['id'] ?>" onclick="return confirm('¿Estás seguro de eliminar este usuario?')" class="inline-flex items-center justify-center text-red-600 hover:text-red-800 transition" title="Eliminar">
                                    <!-- Icono tacho de basura -->
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- Botón Registrar Usuario y Retroceder al final -->
        <div class="flex justify-center gap-4 mt-8">
            <a href="registrarUsuario.php" class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-5 py-2 rounded-lg font-bold shadow-lg text-base transition transform hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Registrar Usuario
            </a>
            <a href="../../Dashboards/dashboard_admin.php" class="inline-flex items-center gap-2 bg-gradient-to-r from-cyan-400 to-blue-500 hover:from-blue-500 hover:to-cyan-400 text-white px-5 py-2 rounded-lg font-bold shadow-lg text-base transition transform hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Retroceder
            </a>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/../../layouts/footer.php");