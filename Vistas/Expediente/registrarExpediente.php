<?php
require_once "../../layouts/header.php";
require_once "../../config/Conn.php";   
?>

<h1>Registrar Expediente</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" required><br>

    <label for="descripcion">Descripción:</label><br>
    <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br>

    <label for="id_abogado">Abogado:</label>
    <select name="id_abogado" id="id_abogado" required>
        <option value="">-- Seleccione un abogado --</option>
        <?php
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT id, nombres, apellidos FROM usuarios WHERE tipo = 'abogado'";
        $abogados = $conexion->query($sql);
        foreach ($abogados as $row) {
            echo "<option value='" . $row['id'] . "'>" . $row['nombres'] . " " . $row['apellidos'] . "</option>";
        }
        ?>
    </select><br>

    <label for="id_cliente">Cliente:</label>
    <select name="id_cliente" id="id_cliente" required>
        <option value="">-- Seleccione un cliente --</option>
        <?php
        $sql = "SELECT id, nombres, apellidos FROM usuarios WHERE tipo = 'cliente'";
        $clientes = $conexion->query($sql);
        foreach ($clientes as $row) {
            echo "<option value='" . $row['id'] . "'>" . $row['nombres'] . " " . $row['apellidos'] . "</option>";
        }
        $conn->cerrar();
        ?>
    </select><br>

    <button type="submit">Registrar</button>
</form>

<?php
require_once "../../controladores/ExpedienteController.php";
require_once "../../layouts/footer.php";

if (!empty($_POST)) {
    $ec = new ExpedienteController();
    echo $ec->guardar($_POST);
}
?>
