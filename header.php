<header id="header">
        <nav class="navbar navbar-expand-lg fixed-top" data-bs-theme="dark">
            <div class="container-fluid w-100">
                <a id="logo" class="navbar-brand m-3 m-md-4 hover-scale" href="index.php"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="eventos.php">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="comunidad.php">Comunidad</a>
                        </li>
                        <li class="nav-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="artistas.php">Artistas</a>
                        </li>
                        <li class="nav-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Colabs</a>
                        </li>
                    </ul>
                    <!-- Mediante este código identificamos si la variable de sesión email está activa, o sea que hay un usuario loggeado, para mostrar, en lugar del botón de log in su foto de avatar y su nombre de usuario. -->
                    <?php 
                    if (isset($_SESSION['email'])) {
                        $user_avatar = isset($_SESSION['avatar']) ? $_SESSION['avatar'] : 'img/perfil-pred.png';
                        $user_name = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Mi Panel';
                    ?>
                        <div class="nav-item d-flex align-items-center gap-2 ms-lg-3 header-user-badge">
                            <a class="nav-link active d-flex align-items-center gap-2" href="dashboard.php">
                                <img src="<?php echo $user_avatar; ?>" alt="Avatar" class="header-avatar rounded-circle">
                                <span class="header-username"><?php echo $user_name; ?></span>
                            </a>
                        </div>
                    <?php 
                    } else {
                    ?>
                        <button class="nav-item">
                            <a class="nav-link active" href="login.php">Log in<svg xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg></a>
                        </button>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </nav>
    </header>
