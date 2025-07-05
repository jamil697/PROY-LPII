<?php

require_once __DIR__. "../../Config/Conn.php";

class Abogado {

    public function __construct(){
    }

    public function guardar($id_usuario, $colegiatura, $especialidad, $experiencia){
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sqlInsert = "INSERT INTO abogados (id_usuario, colegiatura, especialidad, experiencia) 
                      VALUES ('$id_usuario', '$colegiatura', '$especialidad', '$experiencia')";

        $resultado = $conexion->exec($sqlInsert);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar(){
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sqlSelect = "SELECT a.*, u.nombres, u.apellidos, u.username 
                      FROM abogados a 
                      JOIN usuarios u ON a.id_usuario = u.id";

        $resultado = $conexion->query($sqlSelect);
        $conn->cerrar();
        return $resultado;
    }

    public function buscar($id_usuario){
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sqlSelect = "SELECT * FROM abogados WHERE id_usuario = '$id_usuario'";
        $resultado = $conexion->query($sqlSelect);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id_usuario){
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sqlDelete = "DELETE FROM abogados WHERE id_usuario = '$id_usuario'";
        $resultado = $conexion->exec($sqlDelete);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($id_usuario, $colegiatura, $especialidad, $experiencia){
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sqlUpdate = "UPDATE abogados SET 
                        colegiatura = '$colegiatura',
                        especialidad = '$especialidad',
                        experiencia = '$experiencia' 
                      WHERE id_usuario = '$id_usuario'";

        $resultado = $conexion->exec($sqlUpdate);
        $conn->cerrar();
        return $resultado;
    }
}