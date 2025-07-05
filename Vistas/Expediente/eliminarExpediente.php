<?php

require_once "../../controladores/ExpedienteController.php";

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $ec = new ExpedienteController();
    $ec->eliminar($id);
}
