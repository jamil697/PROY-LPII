<?php

require_once "Conn.php";

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
                VALUES ($id_usuario, $colegiatura, $especialidad, $experiencia)";

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
                    colegiatura = $colegiatura, 
                    especialidad = $especialidad, 
                    experiencia = $experiencia,
                WHERE id_usuario = $id_usuario";

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

    public function eliminar(){
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "DELETE FROM abogados WHERE id_usuario = ?";
        $stmt = $conexion->prepare($sql);
        $resultado = $stmt->execute([$this->id_usuario]);

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

        $sql = "SELECT * FROM abogados WHERE id_usuario = $id_usuario";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$this->id_usuario]);
        $resultado = $stmt->fetch();

        $conn->cerrar();
        return $resultado;
    }
}
