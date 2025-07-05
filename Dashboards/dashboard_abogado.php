<?php 
require_once __DIR__ . "/../layouts/header.php"; 

// Obtener nombre del usuario logueado desde sesión
$nombreUsuario = $_SESSION['nombres'] ?? 'Abogado';
?>

<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-green-200">
    <!-- Encabezado -->
    <header class="flex items-center justify-between px-8 py-4 bg-green-700 shadow">
        <div class="flex items-center gap-3">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-xl font-semibold text-white tracking-wide">Panel del Abogado</span>
        </div>
        <a href="/PROY/PROY-LPII/logout.php"
            class="flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium shadow transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
            </svg>
            Cerrar sesión
        </a>
    </header>

    <!-- Contenido -->
    <main class="max-w-5xl mx-auto py-10 px-6 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-green-800 mb-10">
            👋 Bienvenido, <?= htmlspecialchars($nombreUsuario) ?>
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 justify-center">
            <!-- Opción: Expedientes -->
            <a href="/PROY/PROY-LPII/Vistas/Expediente/verExpediente.php"
               class="group bg-white shadow-md p-6 rounded-xl hover:bg-green-50 transition-all border border-transparent hover:border-green-300">
                <div class="flex flex-col items-center">
                    <div class="bg-green-100 rounded-full p-3 mb-3 group-hover:bg-green-200 transition">
                        <svg class="h-8 w-8 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-6 4h6a2 2 0 002-2v-5a2 2 0 
                                     00-2-2h-2a2 2 0 00-2 2v5a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-green-800 mb-1">Expedientes</h2>
                    <p class="text-gray-500 text-sm">Ver y gestionar los casos asignados.</p>
                </div>
            </a>

            <!-- Opción: Citas -->
            <a href="/PROY/PROY-LPII/Vistas/Cita/verCita.php"
               class="group bg-white shadow-md p-6 rounded-xl hover:bg-green-50 transition-all border border-transparent hover:border-green-300">
                <div class="flex flex-col items-center">
                    <div class="bg-green-100 rounded-full p-3 mb-3 group-hover:bg-green-200 transition">
                        <svg class="h-8 w-8 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 
                                     00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-green-800 mb-1">Citas</h2>
                    <p class="text-gray-500 text-sm">Historial de reuniones con clientes.</p>
                </div>
            </a>
        </div>
    </main>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
