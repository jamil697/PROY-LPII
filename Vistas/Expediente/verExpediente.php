<?php
session_start();
if (!isset($_SESSION["id"]) || $_SESSION["tipo"] !== "cliente") {
    header("location: ../../login.php");
    exit;
}

require_once "../../controladores/ExpedienteController.php";
require_once "../../layouts/header.php";

$controller = new ExpedienteController();
$expedientes = $controller->mostrarPorCliente($_SESSION["id"]);
?>

<div class="max-w-6xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Mis Expedientes</h1>

    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-blue-100 text-blue-700">
            <tr>
                <th class="py-3 px-5 text-left">Título</th>
                <th class="py-3 px-5 text-left">Descripción</th>
                <th class="py-3 px-5 text-left">Abogado</th>
                <th class="py-3 px-5 text-left">Fecha</th>
                <th class="py-3 px-5 text-left">Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($expedientes && is_object($expedientes)): ?>
                <?php while ($exp = $expedientes->fetch_assoc()): ?>
                <tr class="border-b hover:bg-blue-50 transition">
                    <td class="py-3 px-5"><?php echo htmlspecialchars($exp["titulo"]); ?></td>
                    <td class="py-3 px-5"><?php echo htmlspecialchars($exp["descripcion"]); ?></td>
                    <td class="py-3 px-5"><?php echo htmlspecialchars($exp["nombre_abogado"]); ?></td>
                    <td class="py-3 px-5"><?php echo htmlspecialchars($exp["fecha_apertura"]); ?></td>
                    <td class="py-3 px-5">
                        <span class="inline-block px-3 py-1 text-sm rounded-full 
                            <?php echo $exp["estado"] === "abierto" ? 'bg-green-100 text-green-800' : 
                                       ($exp["estado"] === "en_proceso" ? 'bg-yellow-100 text-yellow-800' : 
                                       'bg-red-100 text-red-800'); ?>">
                            <?php echo ucfirst($exp["estado"]); ?>
                        </span>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5" class="text-center text-red-600 py-4">No hay expedientes.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php
    if (!$expedientes || !is_object($expedientes)) {
        echo "<div class='text-red-600'>Error: No se pudo obtener la lista de expedientes.</div>";
    }
    ?>
</div>

<?php require_once "../../layouts/footer.php"; ?>

