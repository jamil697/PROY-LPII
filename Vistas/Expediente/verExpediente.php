<?php

require_once "../../controladores/ExpedienteController.php";
require_once "../../layouts/header.php";

$ec = new ExpedienteController();
$expedientes = $ec->mostrar();
?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Expedientes del Sistema</h1>
    
    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table class="w-full bg-white border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Título</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Descripción</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Fecha de Apertura</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Abogado</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Cliente</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
        <?php
        foreach ($expedientes as $exp) {
            echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>
                    <td class='px-6 py-4 text-sm text-gray-900'>{$exp['titulo']}</td>
                    <td class='px-6 py-4 text-sm text-gray-900'>{$exp['descripcion']}</td>
                    <td class='px-6 py-4 text-sm text-gray-900'>{$exp['fecha_apertura']}</td>
                    <td class='px-6 py-4 text-sm text-gray-900'>{$exp['nombre_abogado']}</td>
                    <td class='px-6 py-4 text-sm text-gray-900'>{$exp['nombre_cliente']}</td>
                    <td class='px-6 py-4 text-sm text-gray-900'>{$exp['estado']}</td>
                    <td class='px-6 py-4 text-sm'>
                        <a href='eliminarExpediente.php?id={$exp['id']}' class='text-red-600 hover:text-red-800 font-medium transition-colors duration-200'>Eliminar</a>
                    </td>
                    <td class='px-6 py-4 text-sm'>
                        <a href='actualizarExpediente.php?id={$exp['id']}' class='text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200'>Actualizar</a>
                    </td>
                </tr>";
        }
        ?>
            </tbody>
        </table>
    </div>
    
    <div class="mt-8 text-center">
        <a href="registrarExpediente.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-colors duration-200">
            Registrar nuevo expediente
        </a>
    </div>
</div>

<?php
require_once "../../layouts/footer.php";
?>