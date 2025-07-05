<?php
require_once("../../controladores/UsuarioController.php");

$id = $_GET["id"];
$uc = new UsuarioController();
$uc->eliminar($id);