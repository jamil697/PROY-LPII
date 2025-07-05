<?php

require_once "Modelos/Expediente.php";

class ExpedienteController {

    public function guardar(array $datos) {
        $expediente = new Expediente();
        $resultado = $expediente->guardar(
            $datos["titulo"],
            $datos["descripcion"],
            $datos["id_abogado"],
            $datos["id_cliente"]
        );

        if ($resultado != 0) {
            return "Expediente registrado correctamente";
        } else {
            return "Error: No se registró el expediente";
        }
    }

    public function mostrar() {
        $expediente = new Expediente();
        return $expediente->mostrar();
    }

    public function buscar($id) {
        $expediente = new Expediente();
        return $expediente->buscar($id);
    }

    public function eliminar($id) {
        $expediente = new Expediente();
        $resultado = $expediente->eliminar($id);

        if ($resultado != 0) {
            header("location: verExpedientes.php");
        } else {
            return "Error: No se eliminó el expediente";
        }
    }

    public function actualizar(array $datos) {
        $expediente = new Expediente();
        $resultado = $expediente->actualizar(
            $datos["id"],
            $datos["titulo"],
            $datos["descripcion"],
            $datos["id_abogado"],
            $datos["id_cliente"],
            $datos["estado"]
        );

        if ($resultado != 0) {
            return "Expediente actualizado correctamente";
        } else {
            return "Error: No se pudo actualizar el expediente";
        }
    }
}
