<?php
require_once "../../layouts/header.php";
require_once "../../config/Conn.php";   
?>

<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Registrar Expediente</h1>
        
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="space-y-6">
            <div>
                <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título:</label>
                <input type="text" id="titulo" name="titulo" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 resize-vertical"></textarea>
            </div>

            <div>
                <label for="id_abogado" class="block text-sm font-medium text-gray-700 mb-2">Abogado:</label>
                <select name="id_abogado" id="id_abogado" required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
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
                </select>
            </div>

            <div>
                <label for="id_cliente" class="block text-sm font-medium text-gray-700 mb-2">Cliente:</label>
                <select name="id_cliente" id="id_cliente" required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                    <option value="">-- Seleccione un cliente --</option>
                    <?php
                    $sql = "SELECT id, nombres, apellidos FROM usuarios WHERE tipo = 'cliente'";
                    $clientes = $conexion->query($sql);
                    foreach ($clientes as $row) {
                        echo "<option value='" . $row['id'] . "'>" . $row['nombres'] . " " . $row['apellidos'] . "</option>";
                    }
                    $conn->cerrar();
                    ?>
                </select>
            </div>

            <div class="pt-4">
                <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Registrar
                </button>
            </div>
        </form>
    </div>
</div>

<?php
require_once "../../controladores/ExpedienteController.php";
require_once "../../layouts/footer.php";

if (!empty($_POST)) {
    $ec = new ExpedienteController();
    echo $ec->guardar($_POST);
}
?>