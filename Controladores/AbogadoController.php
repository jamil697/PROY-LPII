<?php

require_once(__DIR__ . '/../Modelos/Usuario.php');
require_once(__DIR__ . '/../Modelos/Abogado.php');

class AbogadoController {

    public function guardar(array $datos) {
        $usuario = new Usuario();

        // 1. Registrar al usuario (tipo abogado)
        $resultadoUsuario = $usuario->guardar(
            $datos['username'],
            password_hash($datos['password'], PASSWORD_DEFAULT),
            $datos['nombres'],
            $datos['apellidos'],
            'abogado',
            $datos['email']
        );

        if ($resultadoUsuario) {
            // 2. Obtener ID del nuevo usuario
            $buscado = $usuario->buscarPorUsername($datos['username']);
            $fila = $buscado;

            if ($fila) {
                // 3. Crear y guardar el abogado
                $abogado = new Abogado(
                    $fila['id'],
                    $datos['colegiatura'],
                    $datos['especialidad'],
                    $datos['experiencia']
                );

                $resultadoAbogado = $abogado->guardar();

                if ($resultadoAbogado) {
                    return "✅ Abogado registrado correctamente.";
                } else {
                    return "❌ Error al registrar abogado.";
                }
            } else {
                return "❌ No se pudo obtener ID del usuario.";
            }
        } else {
            return "❌ Error al registrar usuario.";
        }
    }

    public function mostrar() {
        $abogado = new Abogado();
        return $abogado->mostrar();
    }

    public function buscar($id_usuario) {
        $abogado = new Abogado($id_usuario);
        return $abogado->buscar();
    }

    public function eliminar($id_usuario) {
        $abogado = new Abogado($id_usuario);
        $resultado = $abogado->eliminar();

        if ($resultado != 0) {
            header("Location: verAbogados.php");
            exit();
        } else {
            return "❌ Error: No se eliminó al abogado";
        }
    }

    public function actualizar(array $datos) {
        $abogado = new Abogado(
            $datos["id_usuario"],
            $datos["colegiatura"],
            $datos["especialidad"],
            $datos["experiencia"]
        );

        $resultado = $abogado->actualizar();

        if ($resultado != 0) {
            return "✅ Abogado actualizado correctamente.";
        } else {
            return "❌ Error al actualizar.";
        }
    }
}