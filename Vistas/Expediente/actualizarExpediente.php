<?php
require_once "../../controladores/ExpedienteController.php";

if (!empty($_GET['id'])) {
    $id = (int) $_GET['id'];
} elseif (!empty($_POST['id'])) {
    $id = (int) $_POST['id'];
}

$ec = new ExpedienteController();
$expediente = $ec->buscar($id);

foreach ($expediente as $exp) {
    $titulo = $exp['titulo'];
    $descripcion = $exp['descripcion'];
    $id_abogado = $exp['id_abogado'];
    $id_cliente = $exp['id_cliente'];
    $estado = $exp['estado'];
}
?>


<h1>Actualizar Expediente</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" value="<?= $titulo ?>"><br>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion"><?= $descripcion ?></textarea><br>

    <label for="id_abogado">ID Abogado:</label>
    <input type="number" id="id_abogado" name="id_abogado" value="<?= $id_abogado ?>"><br>

    <label for="id_cliente">ID Cliente:</label>
    <input type="number" id="id_cliente" name="id_cliente" value="<?= $id_cliente ?>"><br>

    <label for="estado">Estado:</label>
    <select name="estado" id="estado">
        <option value="abierto" <?= $estado == 'abierto' ? 'selected' : '' ?>>Abierto</option>
        <option value="en_proceso" <?= $estado == 'en_proceso' ? 'selected' : '' ?>>En Proceso</option>
        <option value="cerrado" <?= $estado == 'cerrado' ? 'selected' : '' ?>>Cerrado</option>
    </select><br>

    <input type="hidden" name="id" value="<?= $id ?>">
    <button type="submit">Actualizar</button>
</form>

<?php
require_once "../../controladores/ExpedienteController.php";

if (!empty($_POST)) {
    $ec->actualizar($_POST);
}
?>
