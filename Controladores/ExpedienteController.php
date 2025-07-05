<?php

require_once "modelos/Expediente.php";

class ExpedienteController {
    private $expediente;

    public function __construct() {
        $this->expediente = new Expediente();
    }

    public function mostrarTodos() {
        return $this->expediente->mostrar();
    }

    public function mostrarPorCliente($id) {
        return $this->expediente->mostrarPorCliente($id);
    }

    public function buscar($id) {
        return $this->expediente->buscar($id);
    }

    public function guardar($titulo, $descripcion, $id_abogado, $id_cliente) {
        return $this->expediente->guardar($titulo, $descripcion, $id_abogado, $id_cliente);
    }

    public function eliminar($id) {
        return $this->expediente->eliminar($id);
    }

    public function actualizar($id, $titulo, $descripcion, $id_abogado, $id_cliente, $estado) {
        return $this->expediente->actualizar($id, $titulo, $descripcion, $id_abogado, $id_cliente, $estado);
    }
}
