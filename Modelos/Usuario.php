<?php

require_once __DIR__."../../Config/Coon.php";

class Usuario {

    public function __construct() {}

    public function buscar(int $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

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

    public function guardar($username, $password, $nombres, $apellidos, $tipo, $email) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "INSERT INTO usuarios (username, password, nombres, apellidos, tipo, email)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $resultado = $stmt->execute([
            $username,
            $password,
            $nombres,
            $apellidos,
            $tipo,
            $email
        ]);

        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $resultado = $stmt->execute([$id]);

        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($username, $nombres, $apellidos, $tipo, $email, $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "UPDATE usuarios SET 
                    username = ?, 
                    nombres = ?, 
                    apellidos = ?, 
                    tipo = ?, 
                    email = ?
                WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $resultado = $stmt->execute([
            $username,
            $nombres,
            $apellidos,
            $tipo,
            $email,
            $id
        ]);

        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorUsername($username) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "SELECT * FROM usuarios WHERE username = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$username]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        $conn->cerrar();
        return $resultado;
    }
}
