<?php
require_once "../../layouts/header.php";
require_once "../../config/Conn.php";   
?>

<h1>Registrar Cita</h1>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="id_expediente">Expediente:</label>
    <select name="id_expediente" id="id_expediente" required>
        <option value="">-- Seleccione un expediente --</option>
        <?php
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT id, titulo FROM expedientes";
        $expedientes = $conexion->query($sql);
        foreach ($expedientes as $exp) {
            echo "<option value='" . $exp['id'] . "'>" . $exp['titulo'] . "</option>";
        }
        ?>
    </select><br>

    <label for="fecha">Fecha y hora:</label>
    <input type="datetime-local" id="fecha" name="fecha" required><br>

    <label for="asunto">Asunto:</label>
    <input type="text" id="asunto" name="asunto" maxlength="255"><br>

    <label for="recordatorio_enviado">Recordatorio enviado:</label>
    <select name="recordatorio_enviado" id="recordatorio_enviado" required>
        <option value="0" selected>No</option>
        <option value="1">Sí</option>
    </select><br>

    <button type="submit">Registrar</button>
</form>

<?php
require_once "../../controladores/CitaController.php";
require_once "../../layouts/footer.php";

if (!empty($_POST)) {
    $cc = new CitaController();
    echo $cc->guardar($_POST);
    echo "<script>window.location.href='verCita.php';</script>";
}
?>
