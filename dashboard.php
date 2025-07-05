<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['tipo'])) {
    header("Location: login.php");
    exit;
}

switch ($_SESSION['tipo']) {
    case 'admin':
        include __DIR__ . '/Dashboards/dashboard_admin.php';
        break;
    case 'abogado':
        include __DIR__ . '/Dashboards/dashboard_abogado.php';
        break;
    case 'cliente':
        include __DIR__ . '/Dashboards/dashboard_cliente.php';
        break;
    case 'secretaria':
        include __DIR__ . '/Dashboards/dashboard_secretaria.php';
        break;
    default:
        echo "Rol desconocido.";
        session_destroy();
        exit;
}

?>