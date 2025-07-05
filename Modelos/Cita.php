<?php

require_once "config/conn.php";

class cita {

    public function __construct() {
        // constructor vacío
    }

    public function buscar(int $id) {
        $conn = new conn();
        $conexion = $conn->conectar();
        $sql = "select * from citas where id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new conn();
        $conexion = $conn->conectar();
        $sql = "select * from citas";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar($id_expediente, $fecha, $asunto) {
        $conn = new conn();
        $conexion = $conn->conectar();
        $sql = "insert into citas (id_expediente, fecha, asunto) 
                values ('$id_expediente', '$fecha', '$asunto')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new conn();
        $conexion = $conn->conectar();
        $sql = "delete from citas where id = $id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($id, $id_expediente, $fecha, $asunto, $recordatorio_enviado) {
        $conn = new conn();
        $conexion = $conn->conectar();
        $sql = "update citas set 
                    id_expediente = '$id_expediente',
                    fecha = '$fecha',
                    asunto = '$asunto',
                    recordatorio_enviado = '$recordatorio_enviado'
                where id = $id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function listar_por_expediente($id_expediente) {
        $conn = new conn();
        $conexion = $conn->conectar();
        $sql = "select * from citas where id_expediente = $id_expediente order by fecha asc";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}