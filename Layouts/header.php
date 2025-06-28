 <html>
<head>
    <meta charset="utf-8">
    <title>Prueba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php
    if(!empty($_SESSION)){ 
?>
<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
    <div class='container-fluid'>
        <a class='navbar-brand ms-3' href='#'>
            <i class='fas fa-balance-scale me-2'></i>LegalSoft Pro
        </a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent'
                aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                <li class='nav-item'>
                    <a class='nav-link' href='index.php'>
                        <i class='fas fa-home me-1'></i>Inicio
                    </a>
                </li>
                <?php
                $tipo = $_SESSION["tipo"];
                switch ($tipo) {
                    case "abogado":
                        echo "<li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownAbogado' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-user-tie me-1'></i>Abogados
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdownAbogado'>
                                <li><a class='dropdown-item' href='AbogadoController.php?action=listar'><i class='fas fa-list me-1'></i>Ver Abogados</a></li>
                                <li><a class='dropdown-item' href='AbogadoController.php?action=crear'><i class='fas fa-plus me-1'></i>Nuevo Abogado</a></li>
                            </ul>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownCitas' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-calendar-alt me-1'></i>Citas
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdownCitas'>
                                <li><a class='dropdown-item' href='CitaController.php?action=listar'><i class='fas fa-list me-1'></i>Ver Citas</a></li>
                                <li><a class='dropdown-item' href='CitaController.php?action=crear'><i class='fas fa-plus me-1'></i>Nueva Cita</a></li>
                            </ul>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownExpedientes' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-folder-open me-1'></i>Expedientes
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdownExpedientes'>
                                <li><a class='dropdown-item' href='ExpedienteController.php?action=listar'><i class='fas fa-list me-1'></i>Ver Expedientes</a></li>
                                <li><a class='dropdown-item' href='ExpedienteController.php?action=crear'><i class='fas fa-plus me-1'></i>Nuevo Expediente</a></li>
                            </ul>
                        </li>";
                        break;
                    case "asistente":
                        echo "<li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownCitasAsist' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-calendar-alt me-1'></i>Citas
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdownCitasAsist'>
                                <li><a class='dropdown-item' href='CitaController.php?action=listar'><i class='fas fa-list me-1'></i>Ver Citas</a></li>
                                <li><a class='dropdown-item' href='CitaController.php?action=crear'><i class='fas fa-plus me-1'></i>Agendar Cita</a></li>
                            </ul>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='ExpedienteController.php?action=listar'>
                                <i class='fas fa-folder me-1'></i>Expedientes
                            </a>
                        </li>";
                        break;
                    case "administrador":
                        echo "<li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownUsuarios' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-users-cog me-1'></i>Usuarios
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdownUsuarios'>
                                <li><a class='dropdown-item' href='UsuarioController.php?action=listar'><i class='fas fa-list me-1'></i>Ver Usuarios</a></li>
                                <li><a class='dropdown-item' href='UsuarioController.php?action=crear'><i class='fas fa-user-plus me-1'></i>Nuevo Usuario</a></li>
                            </ul>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownAbogadosAdmin' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-user-tie me-1'></i>Abogados
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdownAbogadosAdmin'>
                                <li><a class='dropdown-item' href='AbogadoController.php?action=listar'><i class='fas fa-list me-1'></i>Ver Abogados</a></li>
                                <li><a class='dropdown-item' href='AbogadoController.php?action=crear'><i class='fas fa-plus me-1'></i>Nuevo Abogado</a></li>
                            </ul>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownCitasAdmin' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-calendar-alt me-1'></i>Citas
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdownCitasAdmin'>
                                <li><a class='dropdown-item' href='CitaController.php?action=listar'><i class='fas fa-list me-1'></i>Todas las Citas</a></li>
                                <li><a class='dropdown-item' href='CitaController.php?action=crear'><i class='fas fa-plus me-1'></i>Nueva Cita</a></li>
                            </ul>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownExpedientesAdmin' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-folder-open me-1'></i>Expedientes
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdownExpedientesAdmin'>
                                <li><a class='dropdown-item' href='ExpedienteController.php?action=listar'><i class='fas fa-list me-1'></i>Todos los Expedientes</a></li>
                                <li><a class='dropdown-item' href='ExpedienteController.php?action=crear'><i class='fas fa-plus me-1'></i>Nuevo Expediente</a></li>
                            </ul>
                        </li>";
                        break;
                }
                ?>
            </ul>
            <div class='d-flex align-items-center'>
                <span class='text-light me-3'>
                    <i class='fas fa-user-circle me-1'></i>
                    <?php echo $_SESSION["nombre"] ?? $_SESSION["usuario"]; ?>
                    <small class='text-muted'>(<?php echo ucfirst($_SESSION["tipo"]); ?>)</small>
                </span>
                <a class="btn btn-outline-light btn-sm" href='logout.php'>
                    <i class='fas fa-sign-out-alt me-1'></i>Cerrar Sesión
                </a>
            </div>
        </div>
    </div>
</nav>
<?php
    }
?>
<div class="container-fluid mt-3">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>