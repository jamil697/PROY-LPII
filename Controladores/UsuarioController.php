<?php

require_once __DIR__ . '/../modelos/Usuario.php';


class UsuarioController{
    public function guardar(array $datos){
        $usuario = new Usuario();
        $resultado = $usuario->guardar(
                                    $datos["username"],
                                    password_hash(
                                        $datos["password"], 
                                        PASSWORD_DEFAULT
                                    ),
                                    $datos["nombres"],
                                    $datos["apellidos"],
                                    $datos["tipo"],
                                    $datos["escuela"],
                                    $datos["email"],
                                );
        if ($resultado != 0) {
            return "Usuario registrado";
        } else {
            return "Error: No se registro el usuario";
        }
    }

    public function mostrar(){
        $usuario = new Usuario();
        return $usuario->mostrar();
    }

    public function eliminar($id){
        $usuario = new Usuario();
        $resultado = $usuario->eliminar($id);
        if ($resultado != 0) {
            header("location: verUsuario.php");
        } else {
            return "Error: No se elimino al usuario";
        }
    }

    public function buscar(int $id) {
        $usuario = new Usuario();
        return $usuario->buscar($id);
    }

    public function actualizar(array $datos){
        $usuario = new Usuario();
        $resultado = $usuario->actualizar(
                                    $datos["username"],
                                    $datos["nombres"],
                                    $datos["apellidos"],
                                    $datos["tipo"],
                                    $datos["id"],
                                );
        if ($resultado != 0) {
            return "Usuario actualizado";
        } else {
            return "Error: No se pudo actualizar el usuario";
        }
    }

    public function login($username, $password){
        $usuario = new Usuario();
        $resultado = $usuario->buscarPorUsername($username);
        
        $nombres = "";
        $id = "";
        $passwordBD = "";
        $contador = 0;
        foreach ($resultado as $userLogin) {
            $nombres = $userLogin["nombres"];
            $id = $userLogin["id"];
            $passwordBD = $userLogin["password"];
            $contador++;
        }
        if ($contador != 0) {
            if (password_verify($password, $passwordBD)) {
                session_start();
                $_SESSION["nombres"] = $nombres;
                $_SESSION["id"] = $id;
                header("location: verUsuario.php");
            } else {
                return "Error: Usuario o contraseña incorrectos";
            }
        } else {
            return "Error: Usuario o contraseña incorrectos";
        }
    }
}