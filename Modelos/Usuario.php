<?php
require_once __DIR__ . "/../Config/Conn.php";

class Usuario {

    public function __construct() {
        // Constructor vacío
    }

    public function buscar(int $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuarios";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar($username, $password, $nombres, $apellidos, $email, $tipo) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "INSERT INTO usuarios (username, password, nombres, apellidos, email, tipo)
                VALUES ('$username', '$password', '$nombres', '$apellidos', '$email', '$tipo')";

        try {
            $resultado = $conexion->exec($sql);
        } catch (PDOException $e) {
            $conn->cerrar();
            return 0;
        }

        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM usuarios WHERE id = $id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($username, $nombres, $apellidos, $tipo, $email, $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE usuarios SET 
                    username = '$username',
                    nombres = '$nombres',
                    apellidos = '$apellidos',
                    tipo = '$tipo',
                    email = '$email'
                WHERE id = $id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

   public function buscarPorUsername($username) {
    $conn = new Conn();
    $conexion = $conn->conectar();
    $sql = "SELECT * FROM usuarios WHERE username = '$username'";
    $resultado = $conexion->query($sql);
    $conn->cerrar();
    return $resultado;
    }

}
