<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-green-200">
    <!-- Barra superior -->
    <header class="flex items-center justify-between px-10 py-5 bg-green-700 shadow-lg">
        <div class="flex items-center gap-4">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-2xl font-bold text-white tracking-wide">Panel del Abogado</span>
        </div>
        <nav class="flex gap-6">
            <a href="/PROY/PROY-LPII/Vistas/Expediente/verExpediente.php" class="flex items-center gap-2 text-white hover:text-green-200 transition font-medium">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-6 4h6a2 2 0 002-2v-5a2 2 0 00-2-2h-2a2 2 0 00-2 2v5a2 2 0 002 2z" />
                </svg>
                Expedientes
            </a>
            <a href="verCitas.php" class="flex items-center gap-2 text-white hover:text-green-200 transition font-medium">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Citas
            </a>
            <a href="actualizarExpediente.php" class="flex items-center gap-2 text-white hover:text-green-200 transition font-medium">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.5 3.5a2.121 2.121 0 013 3L7 19.5 3 21l1.5-4L16.5 3.5z" />
                </svg>
                Actualizar
            </a>
        </nav>
        <a href="logout.php" class="flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg font-semibold shadow transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
            </svg>
            Cerrar sesión
        </a>
    </header>

    <!-- Contenido principal -->
    <main class="max-w-5xl mx-auto py-12 px-4">
        <h1 class="text-3xl font-extrabold text-green-800 mb-10 text-center flex items-center justify-center gap-3">
            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Bienvenido Abogado
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <a href="/PROY/PROY-LPII/Vistas/Expediente/verExpediente.php" class="group bg-white shadow-lg p-8 rounded-xl hover:bg-green-50 transition flex flex-col items-center text-center border border-transparent hover:border-green-200">
                <div class="bg-green-100 rounded-full p-4 mb-4 group-hover:bg-green-200 transition">
                    <svg class="h-10 w-10 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-6 4h6a2 2 0 002-2v-5a2 2 0 00-2-2h-2a2 2 0 00-2 2v5a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-green-800 mb-1">Expedientes Asignados</h2>
                <p class="text-gray-500">Revisa y gestiona los casos asignados.</p>
            </a>
            <a href="verCitas.php" class="group bg-white shadow-lg p-8 rounded-xl hover:bg-green-50 transition flex flex-col items-center text-center border border-transparent hover:border-green-200">
                <div class="bg-green-100 rounded-full p-4 mb-4 group-hover:bg-green-200 transition">
                    <svg class="h-10 w-10 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-green-800 mb-1">Historial de Citas</h2>
                <p class="text-gray-500">Consulta el historial de citas con clientes.</p>
            </a>
            <a href="actualizarExpediente.php" class="group bg-white shadow-lg p-8 rounded-xl hover:bg-green-50 transition flex flex-col items-center text-center border border-transparent hover:border-green-200">
                <div class="bg-green-100 rounded-full p-4 mb-4 group-hover:bg-green-200 transition">
                    <svg class="h-10 w-10 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.5 3.5a2.121 2.121 0 013 3L7 19.5 3 21l1.5-4L16.5 3.5z" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-green-800 mb-1">Actualizar Expedientes</h2>
                <p class="text-gray-500">Modifica el estado de los expedientes.</p>
            </a>
        </div>
    </main>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
