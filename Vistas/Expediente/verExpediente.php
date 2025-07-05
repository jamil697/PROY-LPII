<?php

require_once "../../controladores/ExpedienteController.php";
require_once "../../layouts/header.php";

$ec = new ExpedienteController();
$expedientes = $ec->mostrar();
?>

<style>
table {
    border-collapse: collapse;
    margin: 40px auto;
    width: 90%;
}
th, td {
    padding: 16px 24px;
    text-align: left;
}
thead {
    background-color: #f2f2f2;
}
</style>

<h1>Expedientes del Sistema</h1>
<table class="table">
    <thead>
    <tr>
        <th>Título</th>
        <th>Descripción</th>
        <th>Fecha de Apertura</th>
        <th>Abogado</th>
        <th>Cliente</th>
        <th>Estado</th>
        <th colspan="2">Acciones</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach ($expedientes as $exp) {
    echo "<tr>
            <td>{$exp['titulo']}</td>
            <td>{$exp['descripcion']}</td>
            <td>{$exp['fecha_apertura']}</td>
            <td>{$exp['nombre_abogado']}</td>
            <td>{$exp['nombre_cliente']}</td>
            <td>{$exp['estado']}</td>
            <td><a href='eliminarExpediente.php?id={$exp['id']}'>Eliminar</a></td>
            <td><a href='actualizarExpediente.php?id={$exp['id']}'>Actualizar</a></td>
        </tr>";
}
?>
</tbody>
</table>

<a href="registrarExpediente.php">Registrar nuevo expediente</a>

<?php
require_once "../../layouts/footer.php";
?>