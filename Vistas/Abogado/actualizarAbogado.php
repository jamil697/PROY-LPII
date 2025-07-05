<?php
require_once "../../Controladores/AbogadoController.php";
require_once "../../Controladores/UsuarioController.php";
require_once "../../layouts/header.php";

$usuario = new Usuario();
$abogado = new Abogado();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $datosUsuario = $usuario->buscar($id);
    $datosAbogado = $abogado->buscar($id);
} elseif (isset($_POST['id'])) {
    // Actualizar
    $id          = $_POST['id'];
    $username    = $_POST['username'];
    $nombres     = $_POST['nombres'];
    $apellidos   = $_POST['apellidos'];
    $email       = $_POST['email'];
    $tipo        = 'abogado';

    $colegiatura = $_POST['colegiatura'];
    $especialidad= $_POST['especialidad'];
    $experiencia = $_POST['experiencia'];

    $usuario->actualizar($username, $nombres, $apellidos, $tipo, $email, $id);
    $abogado->actualizar($id, $colegiatura, $especialidad, $experiencia);

    header("Location: ../../verAbogado.php");
    exit;
}
?>

<?php if (isset($datosUsuario)): ?>
  <div class="max-w-2xl mx-auto mt-10 bg-white shadow-md rounded-lg p-8">
<form method="POST" action="../Abogado/actualizarAbogado.php">
  <h2 class="text-2xl font-bold mb-6 text-gray-800">Actualizar Abogado</h2>


  <input type="hidden" name="id" value="<?= $datosUsuario['id'] ?>">

<div>
  <label class="block text-sm font-medium text-gray-700">Username</label>
  <input type="text" name="username" value="<?= $datosUsuario['username'] ?>" required class="w-full mt-1 border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
</div>

  <input type="text" name="nombres" value="<?= $datosUsuario['nombres'] ?>" required class="w-full mt-1 border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
  <input type="text" name="apellidos" value="<?= $datosUsuario['apellidos'] ?>" required class="w-full mt-1 border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
  <input type="text" name="email" value="<?= $datosUsuario['email'] ?>" required class="w-full mt-1 border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
  <input type="text" name="colegiatura" value="<?= $datosAbogado['colegiatura'] ?>" required class="w-full mt-1 border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
  <input type="text" name="especialidad" value="<?= $datosAbogado['especialidad'] ?>" required class="w-full mt-1 border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
  <input type="number" name="experiencia" value="<?= $datosAbogado['experiencia'] ?>" required class="w-full mt-1 border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
  <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Actualizar</button>
</form>
<?php endif;
require_once "../../layouts/footer.php";
 ?>