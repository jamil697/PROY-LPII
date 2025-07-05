<?php

require_once "../../controladores/AbogadoController.php";
require_once "../../Layouts/header.php";

$abogado = new AbogadoController();
$datos = $abogado->mostrar();
?>

<h2 class="text-2xl font-bold mb-6 text-center">Lista de Abogados</h2>
<table class="min-w-full bg-white border border-gray-200">
    <tr>
        <th class="px-4 py-3 text-left">ID</th>
        <th class="px-4 py-3 text-left">Nombre</th>
        <th class="px-4 py-3 text-left">Usuario</th>
        <th class="px-4 py-3 text-left">Colegiatura</th>
        <th class="px-4 py-3 text-left">Especialidad</th>
        <th class="px-4 py-3 text-left">Experiencia</th>
        <th class="px-4 py-3 text-left">Acciones</th>
    </tr>
    <?php foreach ($datos as $row): ?>
    <tr class="bg-white border-b hover:bg-gray-50">
        <td class="px-4 py-3"><?= $row['id_usuario'] ?></td>
        <td class="px-4 py-3"><?= $row['nombres'] . ' ' . $row['apellidos'] ?></td>
        <td class="px-4 py-3"><?= $row['username'] ?></td>
        <td class="px-4 py-3"><?= $row['colegiatura'] ?></td>
        <td class="px-4 py-3"><?= $row['especialidad'] ?></td>
        <td class="px-4 py-3"><?= $row['experiencia'] ?> años</td>
        <td>
            <a href="actualizarAbogado.php?id=<?= $row['id_usuario'] ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Editar</a> |
            <a href="eliminarAbogado.php?id=<?= $row['id_usuario'] ?>" onclick="return confirm('¿Eliminar este abogado?')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>