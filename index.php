<?php
require_once 'init.php';
require_once 'db.php';

// Aquí hacemos las peticiones pertinentes para mostrar algunos datos de la base de datos en las secciones de la página de inicio. En primer lugar sacamos las dos primeras playlist para mostrar en ÚLTIMAS PLAYLIST. Luego consultamos la fecha del próximo evento para mostrar por el contador mediante el mecanismo diseñado en Javascript. Estos datos se van a inyectar mediante un atributo personalizado (data-fecha-evento). Así podemos coger el atributo en JS y operar con él.

try {
    $stmt = $pdo->query("SELECT * FROM playlists ORDER BY id ASC LIMIT 2");
    $playlists = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $playlists = [];
}

try {
    $stmt_prox = $pdo->query("SELECT fecha FROM proximos_eventos WHERE fecha >= CURDATE() ORDER BY fecha ASC LIMIT 1");
    $proximo_evento = $stmt_prox->fetch(PDO::FETCH_ASSOC);
    $fecha_contador = $proximo_evento ? $proximo_evento['fecha'] : null;
} catch (PDOException $e) {
    $fecha_contador = null;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bajo Mundo Hub</title>
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

<body>
    <?php include("header.php"); ?>
    
    <main id="home">

        <!-- SECCIÓN HERO -->
        <section id="hero">
            <div class="container-fluid">
                <img src="img/Banner-Logo.png" id="banner-logo" alt="" class="img-fluid mt-md-0">
            </div>
            <div id="cuerdas" class="container">
                <img src="img/cuerdas-banner.png" alt="" class="img-fluid">
            </div>
            <button id="play" class="CTA btn shadow mb-4 hover-scale">
                ¡Dale play!
            </button>
            <div id="platanos">
                <img src="img/fondo-platano.png" alt="" class="img-fluid">
            </div>
            <div id="bolsas">
                <img src="img/fondo-bolsa.png" alt="" class="img-fluid">
            </div>
        </section>

        <!-- SECCIÓN CONTADOR -->
        <section id="contador">
            <div class="container-fluid text-center mt-5 p-0">
                <div id="countdown" class="shadow d-inline-block" data-fecha-evento="<?php echo $fecha_contador ? $fecha_contador : '2026-07-09T00:00:00'; ?>">
                    <p>00:00:00</p>
                    <div id="marcador" class="row">
                        <div class="col-4">
                            <p>Días</p>
                        </div>
                        <div class="col-4">
                            <p>Horas</p>
                        </div>
                        <div class="col-4">
                            <p>Minutos</p>
                        </div>
                    </div>
                </div>
                <h2>¿Te vas a perder nuestro próximo evento?</h2>
                <div id="parrafo">
                    <p>Comprueba cómo de cerca estás de poder disfrutar de una experiencia única con nosotros.</p>
                </div>

                <button class="btn-bajomundo-simple" id="proximos-eventos">Próximos eventos<svg
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-right-short"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                    </svg></button>

                <!-- BARRA INFORMATIVA CON EL NAV ANIMADO-->
                <div class="warning-bar">
                    <div class="track">
                        <ul class="navbar-nav">
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
                        <ul class="navbar-nav">
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
                        <ul class="navbar-nav">
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
                    </div>

                </div>
            </div>
        </section>

        <!-- SECCIÓN DE ACCESOS DIRECTOS A PLAYLIST Y COMUNIDAD -->
        <section id="accesos" class="container">
            <div class="row">
                <div id="playlists" class="tarjeta-horizontal-xs col-md-6">

                    <div class="titulo">
                        <img src="img/ultimas-playlists.png" class="img-fluid" alt="">
                    </div>

                    <?php 
                    if (!empty($playlists)) {
                        foreach ($playlists as $playlist) {
                    ?>
                            <div class="card mb-3 w-75 hover-scale" onclick="window.open('<?php echo $playlist['spotify_url']; ?>', '_blank')" style="cursor: pointer;">
                                <div id="card" class="row g-0">
                                    <div class="col-4">
                                        <img src="<?php echo $playlist['imagen_portada']; ?>" class="img-fluid rounded-start" alt="<?php echo $playlist['nombre']; ?>">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $playlist['nombre']; ?></h5>
                                            <p class="card-text">Una playlist de @bajomund00</p>
                                            <p class="card-text-small"><?php echo $playlist['descripcion']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php 
                        }
                    } else {
                    ?>
                        <div class="card mb-3 w-75 hover-scale">
                            <div id="card" class="row g-0">
                                <div class="col-4">
                                    <img src="img/Portada-bandidaje.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Bandidaje intenso</h5>
                                        <p class="card-text">Una playlist de @bajomund00</p>
                                        <p class="card-text-small">Sonidos intensos y dembow duro, pensados para cuando la noche está en su peak.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                    } 
                    ?>

                    <a href="comunidad.php" id="mas" class="btn-bajomundo-simple mt-3 d-block">Descubre más <svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                        </svg></a>
                </div>
                <div id="galeria" class="col-md-6">
                    <div class="titulo">
                        <img src="img/nuestra-galeria.png" class="img-fluid" alt="">
                    </div>
                    <div id="carouselExampleSlidesOnly" class="carousel slide container-fluid" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/1.png" class="d-block img-fluid w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/2.png" class="d-block img-fluid w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/3.png" class="d-block img-fluid w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/4.png" class="d-block img-fluid w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/5.png" class="d-block img-fluid w-100" alt="...">
                            </div>
                        </div>
                    </div>
                    <button id="sube" class="btn-bajomundo-simple">Sube la tuya <svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                        </svg></button>
                </div>
            </div>
        </section>

        <!-- SECCIÓN DE BARRA DECORATIVA CON ELEMENTOS ANIMADOS-->
        <section id="barra-decorativa" class="conatiner-fluid mt-5">
            <div class="container-fluid">
            </div>
            <div id="botella" class="container">
                <img src="img/botella-1.png" alt="" class="img-fluid img img1">
                <img src="img/botella-2.png" alt="" class="img-fluid img img2">
            </div>
            <div id="cenicero" class="container">
                <img src="img/cenicero.png" alt="" class="img-fluid">
            </div>
        </section>

        <!-- SECCIÓN DE UNETE A NOSOTROS -->
        <section id="unete-a-nosotros" class="container-fluid mb-5 w-100">
            <div id="cuerda-unete" class="container">
                <img src="img/cuerdas.png" alt="" class="img-fluid">
            </div>
            <div id="cartel" class="container text-center">
                <h2>Únete a nosotros</h2>
                <h4>Conecta con el flow del Bajo Mundo</h4>
                <div id="texto" class="container">
                    <p>Esto no se mira, se vive. Disfruta de los innumerables beneficios de formar parte de Bajo Mundo
                        Hub.
                    </p>
                </div>

                <div id="beneficios" class="row m-auto">
                    <div class="col-md-4 my-3">
                        <div class="card shadow hover-scale">
                            <div class="card-body">
                                <div id="icono">
                                    <img src="img/descuentos.png" class="img-fluid" alt="">
                                </div>
                                <p class="card-text mt-3">Accede a descuentos exclusivos y recibe invitaciones
                                    especiales</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="card shadow hover-scale">
                            <div class="card-body">
                                <div id="icono">
                                    <img src="img/niveles.png" class="img-fluid" alt="">
                                </div>
                                <p class="card-text mt-3">Participa, gana visibilidad y desbloquea nuevos niveles</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="card shadow hover-scale">
                            <div class="card-body">
                                <div id="icono">
                                    <img src="img/conecta.png" class="img-fluid" alt="">
                                </div>
                                <p class="card-text mt-3">Conecta con artistas, DJs y gente de la escena que mueve la
                                    cultura
                                    actual</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn-bajomundo-simple-dark-red" onclick="window.location.href='registro.php'">Únete a nuestra comunidad <svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                    </svg></button>
            </div>

        </section>

    </main>

    <?php include("footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>
