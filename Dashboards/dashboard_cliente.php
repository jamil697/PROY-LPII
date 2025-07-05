<?php
require_once __DIR__ . "/../layouts/header.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$nombreUsuario = $_SESSION['nombres'] ?? 'Cliente';
?>

<div class="min-h-screen bg-gradient-to-br from-purple-100 via-white to-purple-200">
    <!-- Barra superior -->
    <header class="flex items-center justify-between px-8 py-4 bg-purple-700 shadow-md">
        <div class="flex items-center gap-3">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="text-xl font-semibold text-white tracking-wide">Panel del Cliente</span>
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
    <main class="max-w-5xl mx-auto py-12 px-4">
        <h1 class="text-3xl font-bold text-purple-800 mb-10 text-center flex items-center justify-center gap-2">
            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Bienvenido, <?= htmlspecialchars($nombreUsuario) ?> (Cliente)
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Mis Expedientes -->
            <a href="/PROY/PROY-LPII/Vistas/Expediente/verExpediente.php"
               class="group bg-white shadow-md p-6 rounded-lg hover:bg-purple-50 transition flex flex-col items-center text-center border border-transparent hover:border-purple-200">
                <div class="bg-purple-100 rounded-full p-3 mb-3 group-hover:bg-purple-200 transition">
                    <svg class="h-8 w-8 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-6 4h6a2 2 0 002-2v-5a2 2 0 00-2-2h-2a2 2 0 00-2 2v5a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-purple-800 mb-1">Mis Expedientes</h2>
                <p class="text-sm text-gray-500">Consulta el estado de tus procesos.</p>
            </a>

            <!-- Mis Citas -->
            <a href="/PROY/PROY-LPII/Vistas/Cita/verCita.php"
               class="group bg-white shadow-md p-6 rounded-lg hover:bg-purple-50 transition flex flex-col items-center text-center border border-transparent hover:border-purple-200">
                <div class="bg-purple-100 rounded-full p-3 mb-3 group-hover:bg-purple-200 transition">
                    <svg class="h-8 w-8 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-purple-800 mb-1">Mis Citas</h2>
                <p class="text-sm text-gray-500">Revisa tus citas agendadas con abogados.</p>
            </a>

            <!-- Notificaciones -->
            <a href="notificaciones.php"
               class="group bg-white shadow-md p-6 rounded-lg hover:bg-purple-50 transition flex flex-col items-center text-center border border-transparent hover:border-purple-200">
                <div class="bg-purple-100 rounded-full p-3 mb-3 group-hover:bg-purple-200 transition">
                    <svg class="h-8 w-8 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 7.165 6 9.388 6 12v2.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-purple-800 mb-1">Notificaciones</h2>
                <p class="text-sm text-gray-500">Recibe novedades importantes de tu caso.</p>
            </a>
        </div>
    </main>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
