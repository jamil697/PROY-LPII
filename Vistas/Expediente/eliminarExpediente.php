<?php
require_once "../../controladores/ExpedienteController.php";
require_once "../../layouts/header.php";

$ec = new ExpedienteController();

if (!empty($_POST["id"])) {
    $id = $_POST["id"];
    echo $ec->eliminar($id);
    exit;
}

$id = $_GET["id"];
$expediente = $ec->buscar($id);

foreach ($expediente as $exp) {
    $titulo = $exp['titulo'];
    $descripcion = $exp['descripcion'];
    $fecha = $exp['fecha_apertura'];
    $estado = $exp['estado'];
    $nombreAbogado = $exp['nombre_abogado'];
    $nombreCliente = $exp['nombre_cliente'];
}
?>

<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="bg-red-50 border border-red-200 rounded-lg p-6 mb-6">
        <h2 class="text-2xl font-bold text-red-800 mb-4 text-center">¿Estás seguro que deseas eliminar este expediente?</h2>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="w-full">
                <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 bg-gray-100 w-1/3">Título</th>
                        <td class="px-6 py-3 text-sm text-gray-900"><?= $titulo ?></td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 bg-gray-100 w-1/3">Descripción</th>
                        <td class="px-6 py-3 text-sm text-gray-900"><?= $descripcion ?></td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 bg-gray-100 w-1/3">Fecha de Apertura</th>
                        <td class="px-6 py-3 text-sm text-gray-900"><?= $fecha ?></td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 bg-gray-100 w-1/3">Estado</th>
                        <td class="px-6 py-3 text-sm text-gray-900"><?= $estado ?></td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 bg-gray-100 w-1/3">Abogado</th>
                        <td class="px-6 py-3 text-sm text-gray-900"><?= $nombreAbogado ?></td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 bg-gray-100 w-1/3">Cliente</th>
                        <td class="px-6 py-3 text-sm text-gray-900"><?= $nombreCliente ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>" class="flex gap-4 justify-center">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-colors duration-200">
            Sí, eliminar
        </button>
        <a href="verExpediente.php" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-colors duration-200 text-center">
            Cancelar
        </a>
    </form>
</div>

<?php
require_once "../../layouts/footer.php";
?>