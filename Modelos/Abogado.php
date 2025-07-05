<?php

require_once __DIR__."../../Config/Coon.php";

class Abogado {

    public $id_usuario;
    public $colegiatura;
    public $especialidad;
    public $experiencia;

    public function __construct($id_usuario = null, $colegiatura = "", $especialidad = "", $experiencia = 0){
        $this->id_usuario   = $id_usuario;
        $this->colegiatura  = $colegiatura;
        $this->especialidad = $especialidad;
        $this->experiencia  = $experiencia;
    }

    public function guardar(){
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "INSERT INTO abogados (id_usuario, colegiatura, especialidad, experiencia) 
                VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $resultado = $stmt->execute([
            $this->id_usuario,
            $this->colegiatura,
            $this->especialidad,
            $this->experiencia
        ]);

        $conn->cerrar();
        return $resultado;
    }

    public function actualizar(){
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "UPDATE abogados SET 
                    colegiatura = ?, 
                    especialidad = ?, 
                    experiencia = ? 
                WHERE id_usuario = ?";
        $stmt = $conexion->prepare($sql);
        $resultado = $stmt->execute([
            $this->colegiatura,
            $this->especialidad,
            $this->experiencia,
            $this->id_usuario
        ]);

        $conn->cerrar();
        return $resultado;
    }

   public function eliminar() {
    $conn = new Conn();
    $conexion = $conn->conectar();

    // 1. Eliminar de la tabla abogados
    $sql1 = "DELETE FROM abogados WHERE id_usuario = ?";
    $stmt1 = $conexion->prepare($sql1);
    $stmt1->execute([$this->id_usuario]);

    // 2. Eliminar de la tabla usuarios
    $sql2 = "DELETE FROM usuarios WHERE id = ?";
    $stmt2 = $conexion->prepare($sql2);
    $resultado = $stmt2->execute([$this->id_usuario]);

    $conn->cerrar();
    return $resultado;
}

    public function mostrar(){
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "SELECT a.*, u.nombres, u.apellidos, u.username 
                FROM abogados a 
                JOIN usuarios u ON a.id_usuario = u.id";
        $resultado = $conexion->query($sql);

        $conn->cerrar();
        return $resultado;
    }

   public function buscar(){
    $conn = new Conn();
    $conexion = $conn->conectar();

    $sql = "SELECT a.*, u.username, u.nombres, u.apellidos, u.email 
            FROM abogados a
            JOIN usuarios u ON a.id_usuario = u.id
            WHERE a.id_usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$this->id_usuario]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);  // 👈 importante

    $conn->cerrar();
    return $resultado;
}

}
