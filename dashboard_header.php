<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Bajo Mundo Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gasoek+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
        <link rel="icon" type="image/png" href="img/disc-1.png">
</head>

<body class="dashboard-body">

    <div class="dashboard-container">
        <div class="dashboard-main-section">
            <aside class="dashboard-sidebar">
                <div class="sidebar-header text-center">
                    <div class="sidebar-avatar-wrapper mx-auto">
                        <img src="<?php echo $usuario['avatar']; ?>" alt="Avatar" class="sidebar-avatar">
                    </div>
                    <h2 class="sidebar-username mt-3"><?php echo $usuario['usuario']; ?></h2>
                    <p class="sidebar-email"><?php echo $usuario['email']; ?></p>
                </div>
                
                <nav class="sidebar-nav mt-4">
                    <ul>
                        <li>
                            <a href="dashboard.php" class="<?php echo (isset($active_page) && $active_page === 'inicio') ? 'active-link' : ''; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 14.5v-3.507c0-.31.25-.56.56-.56h2c.31 0 .56.25.56.56v3.507c0 .31-.25.56-.56.56H7.06a.56.56 0 0 1-.56-.56"/>
                                    <path d="M.11 7.41a.5.5 0 0 1 .14-.708L7.083.82a1.5 1.5 0 0 1 .833 0l6.834 5.882a.5.5 0 0 1-.138.83L13 6.947V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 1 13.5V6.947L.11 7.41z"/>
                                </svg>
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="dashboard_perfil.php" class="<?php echo (isset($active_page) && $active_page === 'perfil') ? 'active-link' : ''; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                </svg>
                                Perfil
                            </a>
                        </li>
                        <li>
                            <a href="#" class="<?php echo (isset($active_page) && $active_page === 'mensajes') ? 'active-link' : ''; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-chat-text-fill" viewBox="0 0 16 16">
                                    <path d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.119-.28.03-.53-.138-.547-.406-.017-.268.14-.52.418-.57 1.637-.29 2.687-.875 3.29-1.482C1.58 13.39 0 11.08 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                </svg>
                                Mensajes
                            </a>
                        </li>
                        <li>
                            <a href="#" class="<?php echo (isset($active_page) && $active_page === 'notificaciones') ? 'active-link' : ''; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                                </svg>
                                Notificaciones
                            </a>
                        </li>
                        <li>
                            <a href="#" class="<?php echo (isset($active_page) && $active_page === 'ajustes') ? 'active-link' : ''; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.86"/>
                                </svg>
                                Ajustes
                            </a>
                        </li>
                        <li>
                            <a href="logout.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                                </svg>
                                Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </nav>
                
                <div class="sidebar-footer text-center">
                    <a href="index.php">
                        <img src="./img/logo.png" alt="Bajo Mundo" class="sidebar-logo img-fluid">
                    </a>
                </div>
            </aside>

