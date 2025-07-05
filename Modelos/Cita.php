<?php


require_once __DIR__ . '/../Config/Conn.php';


class Cita {
    private $id;
    private $id_expediente;
    private $fecha;
    private $asunto;
    private $recordatorio_enviado;

    public function __construct() {
        // Constructor vacío
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "SELECT c.id, c.fecha, c.asunto, c.recordatorio_enviado, 
                       e.titulo AS titulo_expediente 
                FROM citas c
                JOIN expedientes e ON c.id_expediente = e.id
                ORDER BY c.fecha DESC";

        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscar(int $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "SELECT * FROM citas WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar($id_expediente, $fecha, $asunto, $recordatorio_enviado) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "INSERT INTO citas (id_expediente, fecha, asunto, recordatorio_enviado)
                VALUES ($id_expediente, '$fecha', '$asunto', $recordatorio_enviado)";

        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "DELETE FROM citas WHERE id = $id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($id, $id_expediente, $fecha, $asunto, $recordatorio_enviado) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "UPDATE citas 
                SET id_expediente = $id_expediente,
                    fecha = '$fecha',
                    asunto = '$asunto',
                    recordatorio_enviado = $recordatorio_enviado
                WHERE id = $id";

        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function listar_por_expediente($id_expediente) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "SELECT * FROM citas WHERE id_expediente = $id_expediente ORDER BY fecha ASC";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
