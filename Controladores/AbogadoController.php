<?php

require_once __DIR__ . '../../modelos/Abogado.php';

class AbogadoController {

    public function guardar(array $datos) {
        $abogado = new Abogado();
        $resultado = $abogado->guardar(
            $datos["id_usuario"],
            $datos["colegiatura"],
            $datos["especialidad"],
            $datos["experiencia"]
        );

        if ($resultado != 0) {
            return "Abogado registrado correctamente";
        } else {
            return "Error: No se registró al abogado";
        }
    }

    public function mostrar() {
        $abogado = new Abogado();
        return $abogado->mostrar();
    }

    public function buscar($id_usuario) {
        $abogado = new Abogado();
        return $abogado->buscar($id_usuario);
    }

    public function eliminar($id_usuario) {
        $abogado = new Abogado();
        $resultado = $abogado->eliminar($id_usuario);

        if ($resultado != 0) {
            header("location: verAbogados.php");
        } else {
            return "Error: No se eliminó al abogado";
        }
    }

    public function actualizar(array $datos) {
        $abogado = new Abogado();
        $resultado = $abogado->actualizar(
            $datos["id_usuario"],
            $datos["colegiatura"],
            $datos["especialidad"],
            $datos["experiencia"]
        );

        if ($resultado != 0) {
            return "Abogado actualizado correctamente";
        } else {
            return "Error: No se pudo actualizar al abogado";
        }
    }
}
