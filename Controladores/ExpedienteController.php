<?php

require_once __DIR__ . '/../modelos/Expediente.php';

class ExpedienteController {
    
    public function guardar(array $datos) {
        $expediente = new Expediente();
        $resultado = $expediente->guardar(
            $datos["titulo"],
            $datos["descripcion"],
            $datos["cliente_id"],
            $datos["abogado_id"]
        );

        if ($resultado != 0) {
            return "Expediente registrado";
        } else {
            return "Error: No se registró el expediente";
        }
    }

    public function mostrar() {
        $expediente = new Expediente();
        return $expediente->mostrar();
    }

    public function eliminar($id) {
        $expediente = new Expediente();
        $resultado = $expediente->eliminar($id);

        if ($resultado != 0) {
            header("location: verExpediente.php");
        } else {
            return "Error: No se eliminó el expediente";
        }
    }

    public function buscar(int $id) {
        $expediente = new Expediente();
        return $expediente->buscar($id);
    }

    public function actualizar(array $datos) {
        $expediente = new Expediente();
        $resultado = $expediente->actualizar(
            $datos["id"],
            $datos["titulo"],
            $datos["descripcion"],
            $datos["cliente_id"],
            $datos["abogado_id"]
        );

        if ($resultado != 0) {
            return "Expediente actualizado";
        } else {
            return "Error: No se pudo actualizar el expediente";
        }
    }
}
