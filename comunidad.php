<?php
require_once 'init.php';
require_once 'db.php';


// HACEMOS UNA CONSULTA PARA RECOGER LAS PLAYLIST QUE TENEMOS EN LA BASE DE DATOS. LUEGO MÁS ABAJO LAS MOSTRAREMOS CON SU RESPECTIVA IMAGEN.
try {
    $stmt = $pdo->query("SELECT * FROM playlists ORDER BY id ASC");
    $playlists = $stmt->fetchAll();
} catch (PDOException $e) {
    $playlists = [];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comunidad - Bajo Mundo Hub</title>
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

    <main id="comunidad">
        <section id="hero-comunidad"
            class="container-fluid d-flex flex-column align-items-center justify-content-center">
            <div class="container col-md-8">
                <img src="img/comunidad.png" alt="" class="pegatina img-fluid mt-md-0">
            </div>
            <button onclick="window.location.href='registro.php'" class="CTA hover-scale">ÚNETE A NOSOTROS</button>
        </section>

        <section class="djs-emergentes-section py-5">
            <div class="container py-4">
                <div class="row align-items-center g-5">
                    <div class="col-lg-5 col-md-6">
                        <h2 class="section-main-title mb-4">RANKING DE DJS EMERGENTES</h2>
                        <div class="dj-ranking-list d-flex flex-column gap-3">
                            <div
                                class="dj-ranking-item d-flex align-items-center justify-content-between p-3 rounded-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="img/perfil-2.png" alt="Yuni" class="dj-avatar rounded-circle">
                                    <div>
                                        <h4 class="dj-name mb-0">YUNI</h4>
                                        <p class="dj-genre mb-0">Reggaetonero clásico</p>
                                    </div>
                                </div>
                                <button class="btn-follow" aria-label="Seguir a Yuni">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                        class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                        <path fill-rule="evenodd"
                                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </button>
                            </div>
                            <div
                                class="dj-ranking-item d-flex align-items-center justify-content-between p-3 rounded-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="img/perfil-3.png" alt="Gigi284" class="dj-avatar rounded-circle">
                                    <div>
                                        <h4 class="dj-name mb-0">GIGI284</h4>
                                        <p class="dj-genre mb-0">La tía del Dembow pesado</p>
                                    </div>
                                </div>
                                <button class="btn-follow" aria-label="Seguir a Gigi284">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                        class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                        <path fill-rule="evenodd"
                                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </button>
                            </div>
                            <div
                                class="dj-ranking-item d-flex align-items-center justify-content-between p-3 rounded-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="img/perfil-4.png" alt="Olivia" class="dj-avatar rounded-circle">
                                    <div>
                                        <h4 class="dj-name mb-0">OLIVIA</h4>
                                        <p class="dj-genre mb-0">La gata de Madrid</p>
                                    </div>
                                </div>
                                <button class="btn-follow" aria-label="Seguir a Olivia">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                        class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                        <path fill-rule="evenodd"
                                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6 d-flex flex-column align-items-center">
                        <div class="podium-header mb-4 text-center">
                            <img src="img/top_3.png" alt="">
                        </div>
                        <div class="podium-stickers-container w-100 d-flex flex-column gap-3">
                            <div class="podium-card gold-border hover-rotate">
                                <div class="podium-badge gold-bg"><img src="img/primero.png" alt=""></div>
                                <div class="podium-badge-2 gold-bg"><img src="img/corona.png" alt=""></div>
                                <div class="row align-items-center g-3">
                                    <div class="col-sm-3 text-center">
                                        <img src="img/perfil-1.png" alt="Lucky Vicky" class="podium-avatar primero">
                                    </div>
                                    <div class="info col-sm-9">
                                        <h3 class="podium-name">LUCKY VICKY</h3>
                                        <p class="podium-desc mb-0">Cuero poderoso al mando. Define el sonido de casa
                                            con sesiones intensas y una selección de Dembow siempre a la última.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="podium-card silver-border hover-rotate">
                                <div class="podium-badge silver-bg"><img src="img/segundo.png" alt=""></div>
                                <div class="row align-items-center g-3">
                                    <div class="col-sm-3 text-center">
                                        <img src="img/perfil-5.png" alt="DJ Chief" class="podium-avatar segundo">
                                    </div>
                                    <div class="info col-sm-9">
                                        <h3 class="podium-name">DJ CHIEF</h3>
                                        <p class="podium-desc mb-0">El Dembow que no descansa. Cierres apasionantes a
                                            altas horas de la madrugada. Lleva el Dembow por bandera.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="podium-card bronze-border hover-rotate">
                                <div class="podium-badge bronze-bg"><img src="img/tercero.png" alt=""></div>
                                <div class="row align-items-center g-3">
                                    <div class="col-sm-3 text-center">
                                        <img src="img/perfil-6.png" alt="Dani BM" class="podium-avatar tercero">
                                    </div>
                                    <div class="info col-sm-9">
                                        <h3 class="podium-name">DANI BM</h3>
                                        <p class="podium-desc mb-0">Nueva cara, aporte fresco. Experimental, agrega a
                                            nuestros sets el toque de variedad que todo el mundo quiere escuchar.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button onclick="window.location.href='registro.php'" class="btn-bajomundo-simple-red mt-4">¿QUIERES SER EL SIGUIENTE?
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-right-short"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                            </svg></button>
                    </div>
                </div>
            </div>
        </section>

        <section class="galeria-multimedia-section py-5">
            <div class="container py-4">
                <div class="text-center mb-5 galeria-header">
                    <img src="img/galeria-multimedia.png" class="img-fluid" alt="">
                    <p class="galeria-subtitle mx-auto mt-4">Explora lo que pasa detrás y delante de la pista. Fotos,
                        vídeos
                        y momentos que capturan la energía y el ritmo de cada edición de Bajo Mundo.</p>
                </div>
                <div class="row g-4 align-items-stretch">
                    <div class="col-lg-4 col-md-5 d-flex flex-column justify-content-between gap-4">
                        <div class="gallery-mini-block p-4 d-flex flex-column justify-content-between">
                            <div>
                                <h3 class="mini-block-title mb-3">AFTERMOVIES</h3>
                                <div id="carouselAftermovies" class="carousel slide carousel-fade gallery-carousel mb-3"
                                    data-bs-ride="carousel" data-bs-interval="4000">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselAftermovies" data-bs-slide-to="0"
                                            class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselAftermovies" data-bs-slide-to="1"
                                            aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselAftermovies" data-bs-slide-to="2"
                                            aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner rounded-3">
                                        <div class="carousel-item active">
                                            <div class="gallery-card-item">
                                                <img src="img/past-event-1.png" alt="Aftermovie Vol 1"
                                                    class="img-fluid">
                                                <div class="gallery-card-overlay">
                                                    <span class="gallery-card-badge">LIVE</span>
                                                    <h4 class="gallery-card-title">Bajo Mundo Vol. 1</h4>
                                                    <p class="gallery-card-subtitle">Opening Season</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="gallery-card-item">
                                                <img src="img/past-event-2.png" alt="Aftermovie Vol 2"
                                                    class="img-fluid">
                                                <div class="gallery-card-overlay">
                                                    <span class="gallery-card-badge">REC</span>
                                                    <h4 class="gallery-card-title">Bajo Mundo Vol. 2</h4>
                                                    <p class="gallery-card-subtitle">El Templo del Ritmo</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="gallery-card-item">
                                                <img src="img/past-event-3.png" alt="Aftermovie Vol 3"
                                                    class="img-fluid">
                                                <div class="gallery-card-overlay">
                                                    <span class="gallery-card-badge">LIVE</span>
                                                    <h4 class="gallery-card-title">Bajo Mundo Vol. 3</h4>
                                                    <p class="gallery-card-subtitle">Cierre de Temporada</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselAftermovies" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Anterior</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselAftermovies" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Siguiente</span>
                                    </button>
                                </div>
                            </div>
                            <a href="#" class="btn-bajomundo-simple-white">VER MÁS <svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                </svg></a>
                        </div>
                        <div class="gallery-mini-block p-4 d-flex flex-column justify-content-between">
                            <div>
                                <h3 class="mini-block-title mb-3">DJ SETS</h3>
                                <div id="carouselDjSets" class="carousel slide carousel-fade gallery-carousel mb-3"
                                    data-bs-ride="carousel" data-bs-interval="4500">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselDjSets" data-bs-slide-to="0"
                                            class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselDjSets" data-bs-slide-to="1"
                                            aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselDjSets" data-bs-slide-to="2"
                                            aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner rounded-3">
                                        <div class="carousel-item active">
                                            <div class="gallery-card-item">
                                                <img src="img/chief-artistas-set-1.gif" alt="DJ Chief Live Set"
                                                    class="img-fluid">
                                                <div class="gallery-card-overlay">
                                                    <span class="gallery-card-badge">SET</span>
                                                    <h4 class="gallery-card-title">DJ CHIEF</h4>
                                                    <p class="gallery-card-subtitle">Especial Dembow Mix</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="gallery-card-item">
                                                <img src="img/vicky-artistas-set-1.gif" alt="Lucky Vicky Session"
                                                    class="img-fluid">
                                                <div class="gallery-card-overlay">
                                                    <span class="gallery-card-badge">SET</span>
                                                    <h4 class="gallery-card-title">LUCKY VICKY</h4>
                                                    <p class="gallery-card-subtitle">Perreo Pesado Session</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="gallery-card-item">
                                                <img src="img/chief-artistas-set-2.gif" alt="DJ Chief Closing"
                                                    class="img-fluid">
                                                <div class="gallery-card-overlay">
                                                    <span class="gallery-card-badge">LIVE</span>
                                                    <h4 class="gallery-card-title">DJ CHIEF</h4>
                                                    <p class="gallery-card-subtitle">Closing Set 2026</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDjSets"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Anterior</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselDjSets"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Siguiente</span>
                                    </button>
                                </div>
                            </div>
                            <a href="#" class="btn-bajomundo-simple-white">ESCUCHAR <svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                </svg></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="gallery-main-block p-4 h-100 d-flex flex-column justify-content-between">
                            <h3 class="main-block-title mb-3">FOTOGRAFÍAS</h3>
                            <div id="carouselFotografias"
                                class="carousel slide carousel-fade gallery-carousel mb-3 flex-grow-1"
                                data-bs-ride="carousel" data-bs-interval="5000">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselFotografias" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselFotografias" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselFotografias" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselFotografias" data-bs-slide-to="3"
                                        aria-label="Slide 4"></button>
                                    <button type="button" data-bs-target="#carouselFotografias" data-bs-slide-to="4"
                                        aria-label="Slide 5"></button>
                                </div>
                                <div class="carousel-inner rounded-4">
                                    <div class="carousel-item active">
                                        <div class="gallery-card-item main-gallery-card">
                                            <img src="img/1.png" alt="Fotografía 1" class="img-fluid main-gallery-img">
                                            <div class="gallery-card-overlay">
                                                <span class="gallery-card-badge">FOTO</span>
                                                <h4 class="gallery-card-title">La energía de la pista</h4>
                                                <p class="gallery-card-subtitle">Bajo Mundo Clubbing</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="gallery-card-item main-gallery-card">
                                            <img src="img/2.png" alt="Fotografía 2" class="img-fluid main-gallery-img">
                                            <div class="gallery-card-overlay">
                                                <span class="gallery-card-badge">FOTO</span>
                                                <h4 class="gallery-card-title">Luces en cabina</h4>
                                                <p class="gallery-card-subtitle">Set nocturno intenso</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="gallery-card-item main-gallery-card">
                                            <img src="img/3.png" alt="Fotografía 3" class="img-fluid main-gallery-img">
                                            <div class="gallery-card-overlay">
                                                <span class="gallery-card-badge">FOTO</span>
                                                <h4 class="gallery-card-title">Dembow Vibes</h4>
                                                <p class="gallery-card-subtitle">Ritmo sin límites</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="gallery-card-item main-gallery-card">
                                            <img src="img/4.png" alt="Fotografía 4" class="img-fluid main-gallery-img">
                                            <div class="gallery-card-overlay">
                                                <span class="gallery-card-badge">FOTO</span>
                                                <h4 class="gallery-card-title">Público encendido</h4>
                                                <p class="gallery-card-subtitle">Momentos que definen el Hub</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="gallery-card-item main-gallery-card">
                                            <img src="img/5.png" alt="Fotografía 5" class="img-fluid main-gallery-img">
                                            <div class="gallery-card-overlay">
                                                <span class="gallery-card-badge">FOTO</span>
                                                <h4 class="gallery-card-title">Experiencia Inmersiva</h4>
                                                <p class="gallery-card-subtitle">Sonido y potencia</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselFotografias" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselFotografias" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Siguiente</span>
                                </button>
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn-bajomundo-simple-white">VER TODO <svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="playlists-section py-5">
            <div class="container py-4 text-center">
                <h2 class="playlists-title mb-2">NUESTRAS PLAYLISTS</h2>
                <p class="playlists-subtitle mb-5 mx-auto">Dembow, Reggaetón y energía directa a tus oídos. Nuestras
                    playlists reúnen lo mejor del Bajo Mundo para que la fiesta nunca pare.</p>

                <div class="row justify-content-center mb-5 mx-auto playlists-row">
                    <?php 
                    if (!empty($playlists)) {
                        foreach ($playlists as $playlist) {
                    ?>
                            <div class="col-lg-4 col-md-6 col-sm-10">
                                <div class="playlist-card d-flex flex-column justify-content-between h-100">
                                    <div>
                                        <div class="playlist-img-wrapper mb-4 position-relative">
                                            <img src="<?php echo $playlist['imagen_portada']; ?>" alt="<?php echo $playlist['nombre']; ?>"
                                                class="img-fluid w-100 playlist-cover position-relative z-3">
                                            <img src="<?php echo $playlist['imagen_disco']; ?>" alt="Disco" class="playlist-disc img-fluid">
                                        </div>
                                        <h3 class="playlist-name mb-3"><?php echo $playlist['nombre']; ?></h3>
                                        <p class="playlist-desc mb-4"><?php echo $playlist['descripcion']; ?></p>
                                    </div>
                                    <a href="<?php echo $playlist['spotify_url']; ?>" target="_blank" class="btn-bajomundo-simple-red">ESCUCHAR AHORA <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                        </svg></a>
                                </div>
                            </div>
                    <?php 
                        }
                    } else {
                    ?>
                        <p class="text-muted text-center w-100">No hay playlists disponibles en este momento.</p>
                    <?php 
                    } 
                    ?>
                </div>

                <a href="#" class="btn-descubre-mas">DESCUBRE MÁS</a>
            </div>
        </section>

        

        <div class="warning-bar-izq mt-5 mb-5">
                <div class="track">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Accede a contenido exclusivo</a>
                        </li>
                        <li class="nav-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">No te pierdas lo nuevo</a>
                        </li>
                        <li class="nav-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Networking</a>
                        </li>
                        <li class="nav-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Accede a contenido exclusivo</a>
                        </li>
                        <li class="nav-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">No te pierdas lo nuevo</a>
                        </li>
                        <li class="nav-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Networking</a>
                        </li>
                        <li class="nav-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Accede a contenido exclusivo</a>
                        </li>
                        <li class="nav-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">No te pierdas lo nuevo</a>
                        </li>
                        <li class="nav-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Networking</a>
                        </li>
                        <li class="nav-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </li>

                    </ul>
                </div>

            </div>
    </main>

    <?php include("footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>
