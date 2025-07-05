<?php
require_once "../../controladores/ExpedienteController.php";
require_once "../../layouts/header.php";

$ec = new ExpedienteController();

// Si ya se confirmó el formulario (POST), eliminar
if (!empty($_POST["id"])) {
    $id = $_POST["id"];
    echo $ec->eliminar($id);
    exit;
}

// Si es por GET, mostrar la información
$id = $_GET["id"];
$expediente = $ec->buscar($id);

// Asumimos que solo se devuelve un expediente
foreach ($expediente as $exp) {
    $titulo = $exp['titulo'];
    $descripcion = $exp['descripcion'];
    $fecha = $exp['fecha_apertura'];
    $estado = $exp['estado'];
    $nombreAbogado = $exp['nombre_abogado'];
    $nombreCliente = $exp['nombre_cliente'];
}
?>

<h2>¿Estás seguro que deseas eliminar este expediente?</h2>

<table border="1" cellpadding="10" style="margin-bottom: 20px;">
    <tr><th>Título</th><td><?= $titulo ?></td></tr>
    <tr><th>Descripción</th><td><?= $descripcion ?></td></tr>
    <tr><th>Fecha de Apertura</th><td><?= $fecha ?></td></tr>
    <tr><th>Estado</th><td><?= $estado ?></td></tr>
    <tr><th>Abogado</th><td><?= $nombreAbogado ?></td></tr>
    <tr><th>Cliente</th><td><?= $nombreCliente ?></td></tr>
</table>

<form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
    <input type="hidden" name="id" value="<?= $id ?>">
    <button type="submit">Sí, eliminar</button>
    <a href="verExpediente.php">Cancelar</a>
</form>

<?php
require_once "../../layouts/footer.php";
?>
