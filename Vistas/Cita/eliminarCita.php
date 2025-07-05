<?php
require_once "../../controladores/CitaController.php";

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $cc = new CitaController();
    $cc->eliminar($id);

    // Redirige de vuelta a la lista
    header("Location: verCita.php");
    exit;
} else {
    echo "Error: ID no proporcionado.";
}