<?php

require_once "Conn.php";

class Usuario{

    public function __construct(){
        // Constructor vacío
    }

    public function buscar(int $id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sqlSelect = "SELECT * FROM usuario WHERE id = $id";
        $resultado = $conexion->query($sqlSelect);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sqlSelect = "SELECT * FROM usuario";
        $resultado = $conexion->query($sqlSelect);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar($username, $password, $nombres, $apellidos, $tipo, $escuela, $email) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sqlInsert = "INSERT INTO usuario(username, password, nombres, apellidos, tipo, id_escuela, email) 
                      VALUES('$username', '$password', '$nombres', '$apellidos', '$tipo', '$escuela', '$email')";
        $resultado = $conexion->exec($sqlInsert);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sqlDelete = "DELETE FROM usuario WHERE id = $id";
        $resultado = $conexion->exec($sqlDelete);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($username, $nombres, $apellidos, $tipo, $id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sqlUpdate = "UPDATE usuario SET 
                        username = '$username',
                        nombres = '$nombres', 
                        apellidos = '$apellidos', 
                        tipo = '$tipo' 
                      WHERE id = $id";

        $resultado = $conexion->exec($sqlUpdate);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorUsername($username){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sqlSelect = "SELECT * FROM usuario WHERE username = '$username'";
        $resultado = $conexion->query($sqlSelect);
        $conn->cerrar();
        return $resultado;
    }
}