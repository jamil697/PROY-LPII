<?php
require_once __DIR__ . '/../modelos/Usuario.php';
echo "<script>console.log('Redirigiendo a dashboard...');</script>";

class UsuarioController {
    public function guardar(array $datos) {
        $usuario = new Usuario();

        $resultado = $usuario->guardar(
            $datos["username"],
            password_hash($datos["password"], PASSWORD_DEFAULT),
            $datos["nombres"],
            $datos["apellidos"],
            $datos["email"],
            $datos["tipo"]
        );
        return $resultado != 0;
    }

    public function mostrar() {
        $usuario = new Usuario();
        return $usuario->mostrar();
    }

    public function eliminar($id) {
        $usuario = new Usuario();
        $resultado = $usuario->eliminar($id);
        if ($resultado != 0) {
            header("location: verUsuario.php");
        } else {
            return "Error: No se eliminó al usuario";
        }
    }

    public function buscar(int $id) {
        $usuario = new Usuario();
        return $usuario->buscar($id);
    }

    public function actualizar(array $datos) {
        $usuario = new Usuario();
        $resultado = $usuario->actualizar(
            $datos["username"],
            $datos["nombres"],
            $datos["apellidos"],
            $datos["tipo"],
            $datos["email"],
            $datos["id"]
        );

        if ($resultado != 0) {
            return "Usuario actualizado";
        } else {
            return "Error: No se pudo actualizar el usuario";
        }
    }

    public function login($username, $password) {
    $usuario = new Usuario();
    $resultado = $usuario->buscarPorUsername($username);

    if ($resultado && $resultado->rowCount() > 0) {
        $userLogin = $resultado->fetch(PDO::FETCH_ASSOC);
        $passwordBD = $userLogin["password"];

        if (password_verify($password, $passwordBD)) {
            session_start();
            $_SESSION['id'] = $userLogin['id'];
            $_SESSION['username'] = $userLogin['username'];
            $_SESSION['tipo'] = $userLogin['tipo'];

            header("Location: dashboard.php");
            exit;
            } else {
            return "❌ Contraseña incorrecta.";
            }
        } else {
        return "❌ Usuario no encontrado.";
        }
    }

}