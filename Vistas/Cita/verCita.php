<?php

require_once "../../controladores/CitaController.php";
require_once "../../layouts/header.php";

$cc = new CitaController();
$citas = $cc->mostrar();

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

<h1>Citas Programadas</h1>

<table class="table">
    <thead>
        <tr>
            <th>Expediente</th>
            <th>Fecha y Hora</th>
            <th>Asunto</th>
            <th>Recordatorio</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>
   <tbody>
    <?php
    foreach ($citas as $cita) {
        echo "<tr>
                <td>" . ($cita['titulo_expediente'] ?? 'Expediente #' . $cita['id_expediente']) . "</td>
                <td>{$cita['fecha']}</td>
                <td>{$cita['asunto']}</td>
                <td>" . ($cita['recordatorio_enviado'] ? 'Sí' : 'No') . "</td>
                <td><a href='actualizarCita.php?id=" . $cita['id'] . "'>Actualizar</a></td>
                <td><a href='eliminarCita.php?id=" . $cita['id'] . "' onclick=\"return confirm('¿Estás seguro de eliminar esta cita?')\">Eliminar</a></td>
              </tr>";
    }
    ?>
</tbody>

</table>

<a href="registrarCita.php" style="margin-left: 5%; display: inline-block; margin-top: 20px;">Registrar nueva cita</a>

<?php
require_once "../../layouts/footer.php";
?>