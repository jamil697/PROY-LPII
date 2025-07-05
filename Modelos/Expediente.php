<?php

require_once "../../Config/Conn.php";

class Expediente {
    private $id;
    private $titulo;
    private $descripcion;
    private $fecha_apertura;
    private $id_abogado;
    private $id_cliente;
    private $estado;

    public function __construct() {
        // Constructor vacío compatible con tu estructura
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "SELECT e.id, e.titulo, e.descripcion, e.fecha_apertura, e.estado, 
                       a.nombres AS nombre_abogado, c.nombres AS nombre_cliente
                FROM expedientes e
                JOIN usuarios a ON e.id_abogado = a.id
                JOIN usuarios c ON e.id_cliente = c.id
                ORDER BY e.fecha_apertura DESC";

        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscar(int $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "SELECT * FROM expedientes WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar($titulo, $descripcion, $id_abogado, $id_cliente) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $fecha = date("Y-m-d"); // Fecha actual
        $sql = "INSERT INTO expedientes (titulo, descripcion, fecha_apertura, id_abogado, id_cliente, estado) 
                VALUES ('$titulo', '$descripcion', '$fecha', $id_abogado, $id_cliente, 'abierto')";

        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "DELETE FROM expedientes WHERE id = $id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($id, $titulo, $descripcion, $id_abogado, $id_cliente, $estado) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "UPDATE expedientes 
                SET titulo = '$titulo',
                    descripcion = '$descripcion',
                    id_abogado = $id_abogado,
                    id_cliente = $id_cliente,
                    estado = '$estado'
                WHERE id = $id";

        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
}
