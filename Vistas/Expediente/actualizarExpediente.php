<?php
require_once "../../controladores/ExpedienteController.php";
require_once "../../layouts/header.php";

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

<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Actualizar Expediente</h1>
        
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" class="space-y-6">
            <div>
                <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?= $titulo ?>" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 resize-vertical"><?= $descripcion ?></textarea>
            </div>

            <div>
                <label for="id_abogado" class="block text-sm font-medium text-gray-700 mb-2">ID Abogado:</label>
                <input type="number" id="id_abogado" name="id_abogado" value="<?= $id_abogado ?>" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
            </div>

            <div>
                <label for="id_cliente" class="block text-sm font-medium text-gray-700 mb-2">ID Cliente:</label>
                <input type="number" id="id_cliente" name="id_cliente" value="<?= $id_cliente ?>" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
            </div>

            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700 mb-2">Estado:</label>
                <select name="estado" id="estado" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                    <option value="abierto" <?= $estado == 'abierto' ? 'selected' : '' ?>>Abierto</option>
                    <option value="en_proceso" <?= $estado == 'en_proceso' ? 'selected' : '' ?>>En Proceso</option>
                    <option value="cerrado" <?= $estado == 'cerrado' ? 'selected' : '' ?>>Cerrado</option>
                </select>
            </div>

            <input type="hidden" name="id" value="<?= $id ?>">
            
            <div class="pt-4">
                <button type="submit" 
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>

<?php
require_once "../../controladores/ExpedienteController.php";

if (!empty($_POST)) {
    $ec->actualizar($_POST);
}
?>