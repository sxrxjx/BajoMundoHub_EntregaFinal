<?php
require_once 'init.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artistas - Bajo Mundo Hub</title>
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

    <main id="artistas">
        <section id="hero-artistas"
            class="container-fluid d-flex flex-column align-items-center justify-content-center gap-4">
            <div id="artistas-logo" class="container-fluid">
                <div class="row align-items-center">
                    
                    <div class="container col-md-8 order-md-2 ">
                        <img src="img/artistas.png" alt="" class="pegatina img-fluid mt-md-0">
                    </div>
                    <div id="caja-CTA" class="container order-md-4">
                        <p>Conece a nuestras personalidades</p>
                    </div>
                    <button id="CTA-siguiente" class="CTA order-md-1 col-md-2 btn shadow mb-4 hover-scale">
                        Elige al siguiente
                    </button>
                    <button id="CTA-vota" class="CTA order-md-3 col-md-2 btn shadow mb-4 hover-scale">
                        Vota al tuyo
                    </button>
                </div>
            </div>
        </section>

        <section id="intro-artistas" class="container-fluid intro-section-red py-5">
            <div class="caja m-auto">
                <div class="cabecera">
                    <h2 class="titulo-artistas">LOS NUESTROS PERSONALES</h2>
                    <h4 class="subtitulo">Nuestros DJs Residentes</h4>
                </div>

                <div class="intro-text row">
                    <p class="col-md-6">
                        Aquí está la gente que siempre ha estado. Los que suman desde dentro, empujan el proyecto y le
                        dan forma a cada noche con su sonido, su actitud y su manera de hacer las cosas.
                    </p>
                    <p class="col-md-6">
                        No es solo talento, es lealtad y recorrido compartido. Personas que entienden el movimiento, lo
                        cuidan y lo representan en la pista y fuera de ella. Nuestros DJs residentes, los nuestros
                        personales.
                    </p>
                </div>
            </div>
        </section>

        <section id="artistas-indv" class="artists-section">
            
            <div class="artist-section-black">
                <div class="artist-red row align-items-center g-5">
                    <div class="img-art col-md-6 mt-1">
                        <img src="img/vicky-artistas.png" class="img-fluid rounded-4 shadow mt-5" alt="Vicky">
                    </div>
                    <div class="cabecera-indv col-md-6 ">
                        <h3 class="artist-name">Vicky</h3>
                        <p class="artist-role">Dj Residente</p>
                        <div class="cuerpo">
                            <p class="pretexto">
                                Cuero poderoso al mando
                            </p>
                            <p class="texto-inv">Define el sonido de casa con sesiones intensas y una selección
                                de Dembow siempre a la última. Vicky es una de las piezas clave del sonido de Bajo
                                Mundo. Desde la
                                cabina marca el pulso de cada noche con sesiones firmes, directas y sin concesiones.</p>
                            <a href="#" class="btn-bajomundo-simple-red mt-4">Descubre más<svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                </svg></a>

                            <div id="carouselExampleInterval" class="carousel slide mt-4" data-bs-ride="carousel">
                                <div class="carousel-inner rounded-4 shadow">
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <img src="img/vicky-artistas-set-1.gif" class="d-block w-100 object-fit-cover"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <img src="img/vicky-artistas-set-2.gif"
                                            class="d-block w-100 h-100 object-fit-cover" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/vicky-artistas-set-1.gif" class="d-block w-100 object-fit-cover"
                                            alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="artist-section-red">
                <div class="artist-black row align-items-center flex-md-row-reverse g-5">
                    <div class="img-art col-md-6 mt-1">
                        <img src="img/chief-artistas.png" class="img-fluid rounded-4 shadow mt-5" alt="Chief">
                    </div>
                    <div class="cabecera-indv col-md-6 ">
                        <h3 class="artist-name">DJ Chief</h3>
                        <p class="artist-role">Dj Residente</p>
                        <div class="cuerpo">
                            <p class="pretexto">
                                El Dembow que no descansa
                            </p>
                            <p class="texto-inv">Cierres impresionantes a altas horas de la madrugada. Lleva el Dembow
                                por bandera. Sus sets se construyen con presión constante y transiciones precisas,
                                creando una experiencia sólida que sostiene la noche de principio a fin. Cuando Chief
                                está al mando, el flow no se rompe.</p>
                            <a href="#" class="btn-bajomundo-simple-black mt-4">Descubre más<svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                </svg></a>

                            <div id="carouselExampleInterval2" class="carousel slide mt-4" data-bs-ride="carousel">
                                <div class="carousel-inner rounded-4 shadow">
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <img src="img/chief-artistas-set-1.gif" class="d-block w-100 object-fit-cover"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <img src="img/chief-artistas-set-2.gif"
                                            class="d-block w-100 h-100 object-fit-cover" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleInterval2" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleInterval2" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="artist-section-black">
                <div class="artist-red row align-items-center g-5">
                    <div class="img-art col-md-6 mt-1">
                        <img src="img/yuni-artistas.png" class="img-fluid rounded-4 shadow mt-5" alt="Yuni">
                    </div>
                    <div class="cabecera-indv col-md-6 ">
                        <h3 class="artist-name">Yuni</h3>
                        <p class="artist-role">Dj Residente</p>
                        <div class="cuerpo">
                            <p class="pretexto">
                                Reggaetonero de los clásicos
                            </p>
                            <p class="texto-inv">Yuni aporta la raíz al sonido de Bajo Mundo. Reggaetonero de los
                                clásicos, su selección conecta generaciones y mantiene viva la esencia del género en
                                cada sesión. Sus sets combinan nostalgia y energía, creando momentos reconocibles en
                                pista sin perder intensidad. Cuando Yuni suena, el público responde desde el primer
                                coro.</p>
                            <a href="#" class="btn-bajomundo-simple-red mt-4">Descubre más<svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                </svg></a>

                            <div id="carouselExampleInterval3" class="carousel slide mt-4" data-bs-ride="carousel">
                                <div class="carousel-inner rounded-4 shadow">
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <img src="img/chief-artistas-set-1.gif" class="d-block w-100 object-fit-cover"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <img src="img/chief-artistas-set-2.gif"
                                            class="d-block w-100 h-100 object-fit-cover" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleInterval3" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleInterval3" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="artist-section-red">
                <div class="artist-black row align-items-center flex-md-row-reverse g-5">
                    <div class="img-art col-md-6 mt-1">
                        <img src="img/yilavi-artistas.png" class="img-fluid rounded-4 shadow mt-5" alt="Yilavi">
                    </div>
                    <div class="cabecera-indv col-md-6">
                        <h3 class="artist-name">Yilavi</h3>
                        <p class="artist-role">Dj Residente</p>
                        <div class="cuerpo">
                            <p class="pretexto">
                                El de cora
                            </p>
                            <p class="texto-inv">Yilavi aporta sensibilidad y equilibrio al sonido de Bajo Mundo. Sus
                                sets se mueven entre lo rítmico y lo atmosférico, cuidando cada transición y creando un
                                flow constante en la pista. Su selección destaca por la coherencia y la capacidad de
                                construir una sesión que evoluciona sin romper la energía del momento.</p>
                            <a href="#" class="btn-bajomundo-simple-black mt-4">Descubre más<svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                </svg></a>

                            <div id="carouselExampleInterval4" class="carousel slide mt-4" data-bs-ride="carousel">
                                <div class="carousel-inner rounded-4 shadow">
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <img src="img/yilavi-artistas-set-1.gif" class="d-block w-100 object-fit-cover"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <img src="img/yilavi-artistas-set-1.gif"
                                            class="d-block w-100 h-100 object-fit-cover" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleInterval4" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleInterval4" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="banners">
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
                <div class="track-img justify-content-center gap-4">
                    <div class="">
                        <img src="img/perfil-1.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Vicky">
                    </div>
                    <div class="">
                        <img src="img/perfil-2.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Chief">
                    </div>
                    <div class="">
                        <img src="img/perfil-3.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yuni">
                    </div>
                    <div class="">
                        <img src="img/perfil-4.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>


                    <div class="">
                        <img src="img/perfil-1.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>
                    <div class="">
                        <img src="img/perfil-2.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>
                    <div class="">
                        <img src="img/perfil-3.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>
                    <div class="">
                        <img src="img/perfil-4.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>


                    <div class="">
                        <img src="img/perfil-1.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>
                    <div class="">
                        <img src="img/perfil-2.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>
                    <div class="">
                        <img src="img/perfil-3.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>
                    <div class="">
                        <img src="img/perfil-4.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>




                </div>
            </div>

            <div class="warning-bar-black mt-5 mb-5">
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
                <div class="track-img justify-content-center gap-4">
                    <div class="">
                        <img src="img/perfil-5.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Vicky">
                    </div>
                    <div class="">
                        <img src="img/perfil-6.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Chief">
                    </div>
                    <div class="">
                        <img src="img/perfil-7.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yuni">
                    </div>
                    <div class="">
                        <img src="img/perfil-8.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>


                    <div class="">
                        <img src="img/perfil-5.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>
                    <div class="">
                        <img src="img/perfil-6.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>
                    <div class="">
                        <img src="img/perfil-7.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>
                    <div class="">
                        <img src="img/perfil-8.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>


                    <div class="">
                        <img src="img/perfil-5.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>
                    <div class="">
                        <img src="img/perfil-6.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>
                    <div class="">
                        <img src="img/perfil-7.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>
                    <div class="">
                        <img src="img/perfil-8.png" class="hover-scale rounded-circle img-fluid vote-img" alt="Yilavi">
                    </div>

                </div>
            </div>

            <div class="warning-bar mt-5 mb-5">
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

        </section>
    </main>

    <?php include("footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>
