<?php
require_once __DIR__ . "/../layouts/header.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$nombreUsuario = $_SESSION['nombres'] ?? 'Administrador';
?>

<div class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-200">
    <!-- Barra superior -->
    <header class="flex items-center justify-between px-8 py-4 bg-blue-800 shadow-md">
        <div class="flex items-center gap-3">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 11c0-1.104.896-2 2-2s2 .896 2 2-.896 2-2 2-2-.896-2-2zm0 0V7m0 4v4m0 0c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z" />
            </svg>
            <span class="text-xl font-semibold text-white tracking-wide">Panel Administrador</span>
        </div>

        <a href="/PROY/PROY-LPII/logout.php"
            class="flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-4 py-1.5 rounded-md font-semibold shadow transition text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7" />
            </svg>
            Cerrar sesión
        </a>
    </header>

    <!-- Contenido principal -->
    <main class="max-w-6xl mx-auto py-12 px-4">
        <h1 class="text-3xl font-bold text-blue-800 mb-10 text-center flex items-center justify-center gap-2">
            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 11c0-1.104.896-2 2-2s2 .896 2 2-.896 2-2 2-2-.896-2-2zm0 0V7m0 4v4m0 0c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z" />
            </svg>
            Bienvenido, <?= htmlspecialchars($nombreUsuario) ?> (Administrador)
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="/PROY/PROY-LPII/Vistas/Usuario/verUsuario.php"
                class="group bg-white shadow-md p-6 rounded-lg hover:bg-blue-50 transition flex flex-col items-center text-center border border-transparent hover:border-blue-200">
                <div class="bg-blue-100 rounded-full p-3 mb-3 group-hover:bg-blue-200 transition">
                    <svg class="h-8 w-8 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-blue-800 mb-1">Gestión de Usuarios</h2>
                <p class="text-sm text-gray-500">Crear, editar o eliminar usuarios.</p>
            </a>

            <a href="/PROY/PROY-LPII/Vistas/Expediente/verExpediente.php"
                class="group bg-white shadow-md p-6 rounded-lg hover:bg-blue-50 transition flex flex-col items-center text-center border border-transparent hover:border-blue-200">
                <div class="bg-blue-100 rounded-full p-3 mb-3 group-hover:bg-blue-200 transition">
                    <svg class="h-8 w-8 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-6 4h6a2 2 0 002-2v-5a2 2 0 00-2-2h-2a2 2 0 00-2 2v5a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-blue-800 mb-1">Gestión de Expedientes</h2>
                <p class="text-sm text-gray-500">Asignar casos y ver estado de expedientes.</p>
            </a>

            <a href="/PROY/PROY-LPII/Vistas/Cita/verCita.php"
                class="group bg-white shadow-md p-6 rounded-lg hover:bg-blue-50 transition flex flex-col items-center text-center border border-transparent hover:border-blue-200">
                <div class="bg-blue-100 rounded-full p-3 mb-3 group-hover:bg-blue-200 transition">
                    <svg class="h-8 w-8 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-blue-800 mb-1">Citas y Recordatorios</h2>
                <p class="text-sm text-gray-500">Programar citas y ver recordatorios.</p>
            </a>
        </div>
    </main>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
