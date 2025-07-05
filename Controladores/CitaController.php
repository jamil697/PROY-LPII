<?php

require_once __DIR__ . '/../Modelos/Cita.php';
require_once __DIR__ . '/../Config/Conn.php';


class CitaController {

    public function guardar(array $datos) {
        $cita = new Cita();
        $resultado = $cita->guardar(
            $datos["id_expediente"],
            $datos["fecha"],
            $datos["asunto"],
            $datos["recordatorio_enviado"] ?? 0
        );

        if ($resultado != 0) {
            return "Cita registrada correctamente.";
        } else {
            return "Error: No se registró la cita.";
        }
    }

    public function mostrar() {
        $cita = new Cita();
        return $cita->mostrar();
    }

    public function eliminar($id) {
    $cita = new Cita();
    $resultado = $cita->eliminar($id);

    if ($resultado != 0) {
        return true;
    } else {
        return false;
    }
}



    public function buscar(int $id) {
        $cita = new Cita();
        return $cita->buscar($id);
    }

    public function actualizar(array $datos) {
        $cita = new Cita();
        $resultado = $cita->actualizar(
            $datos["id"],
            $datos["id_expediente"],
            $datos["fecha"],
            $datos["asunto"],
            $datos["recordatorio_enviado"]
        );

        if ($resultado != 0) {
            header("Location: verCita.php");
        } else {
            return "Error: No se pudo actualizar la cita.";
        }
    }

    public function listarPorExpediente($id_expediente) {
        $cita = new Cita();
        return $cita->listar_por_expediente($id_expediente);
    }
}
