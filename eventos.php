<?php
require_once 'init.php';
require_once 'db.php';

// HACEMOS UNA PETICIÓN A LA BASE DE DATOS PARA COGER LOS DATOS DE LOS PRÓXIMOS EVENTOS. Estos datos se van a inyectar de forma invisible para poder manejarlos en script.js. Se van a usar en el mecanismo que se ha implementado para controlar el calendario de eventos, donde se marca el día del evento. En su hover aparece una card con una miniatura del cartel del evento, su título y una descripción corta.
try {
    $stmt = $pdo->query("SELECT * FROM proximos_eventos ORDER BY fecha ASC");
    $proximos_eventos = $stmt->fetchAll();
} catch (PDOException $e) {
    $proximos_eventos = [];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventos - Bajo Mundo Hub</title>
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
    
    <!-- AQUÍ SE INYECTAN LOS DATOS MEDIANTE ATRIBUTOS PERSONALIZADOS QUE SE LEEN EN JAVASCRIPT. -->
    <div id="upcoming-events-data" style="display: none;">
        <?php if (!empty($proximos_eventos)) { ?>
            <?php foreach ($proximos_eventos as $evento) { ?>
                <div class="event-item" 
                     data-fecha="<?php echo $evento['fecha']; ?>" 
                     data-titulo="<?php echo $evento['titulo']; ?>" 
                     data-descripcion="<?php echo $evento['descripcion_corta']; ?>" 
                     data-miniatura="<?php echo $evento['miniatura']; ?>">
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</head>

<body>
    <?php include("header.php"); ?>

    <main id="eventos">

        <!-- SECCIÓN HERO DE EVENTOS -->
        <section id="hero-eventos"
            class="container-fluid d-flex flex-column align-items-center justify-content-center gap-4">
            <div id="eventos-logo" class="container-fluid">
                <div class="row">
                    <div class="texto-izq col-md-2">
                        <p>Desde 2023</p>
                    </div>
                    <div class="container col-md-8">
                        <img src="img/eventos.png" alt="" class="pegatina img-fluid mt-md-0">
                    </div>
                    <div class="texto-der col-md-2">
                        <p>Y mucho más</p>
                    </div>
                </div>
            </div>
            <div id="caja-CTA" class="container">
                <p>Explora los próximos eventos y revive ediciones anteriores. No te dejes llevar por la melancolía y
                    apúntate la siguiente.</p>

                <button id="CTA-eventos" class="CTA btn shadow mb-4 hover-scale mt-3">
                    ¡Me apunto!
                </button>
            </div>
        </section>

        <!-- SECCIÓN PARA PRÓXIMOS EVENTOS Y CALENDARIO INTERACTIVO. -->
        <section id="proximas-fechas" class="container py-5 text-center">
            <div class="row">

                <div class="titulo col-12 mb-5">
                    <img src="img/proximas-fechas.png" class="img-fluid" alt="">
                </div>

                <div class="tarjeta-horizontal col-md-6">
                    <?php 
                    if (!empty($proximos_eventos)) {
                        foreach ($proximos_eventos as $evento) {
                    ?>
                            <div class="card mb-3 hover-scale">
                                <div id="card" class="row g-0">
                                    <div class="col-4">
                                        <img src="<?php echo $evento['miniatura']; ?>" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $evento['titulo']; ?></h5>
                                            <p class="card-text"><?php echo $evento['descripcion_corta']; ?></p>
                                            <p class="card-text-small">Fecha: <?php echo date('d/m/Y', strtotime($evento['fecha'])); ?></p>
                                            <button class="btn-bajomundo-simple ms-auto mt-2 fs-5">Descubre los detalles<svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                                </svg></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php 
                        }
                    } else {
                    ?>
                        <p class="text-muted">No hay próximos eventos programados.</p>
                    <?php 
                    } 
                    ?>
                </div>

                <div class="calendar-box col-md-6 p-4 d-flex flex-column align-items-center justify-content-around">
                    <div class="cabecera-calendario d-flex justify-content-between align-items-center w-100">
                        <button id="prevMonth" class="btn-bajomundo-simple-black-left"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                            </svg></button>
                        <h5 id="currentMonthYear">Mayo 2026</h5>
                        <button id="nextMonth" class="btn-bajomundo-simple-black"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                            </svg></button>
                    </div>

                    <div class="calendar-grid" id="calendarGrid">
                        <!-- AQUÍ SE PINTA EL CALENDARIO MEDIANTE EL CÓDIGO DISEÑADO EN JAVASCRIPT. -->
                    </div>
                </div>

            </div>
        </section>

        <!-- SECCIÓN PARA EVENTOS PASADOS. -->
        <section id="eventos-pasados" class="text-center">
            <div class="titulo col-12 text-center mt-5">
                <img src="img/eventos-pasados.png" class="img-fluid" alt="">
            </div>

            <div class="years d-flex justify-content-center align-items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-circle-fill" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8" />
                </svg>
                <a class="btn-submenu year-btn" data-year="2023">2023</a>
                <a class="btn-active year-btn" data-year="2024">2024</a>
                <a class="btn-submenu year-btn" data-year="2025">2025</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-circle-fill" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8" />
                </svg>
            </div>

            <div class="grid-card" id="past-events-container">
                <div class="info row g-3">
                    <div class="col-6 col-md-3">
                        <div class="past-event-right-red rounded-4">
                            <div class="daynum">30</div>
                            <div class="day">VIERNES</div>
                            <div class="month">MARZO</div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="past-event-left-black rounded-4">
                            <div class="daynum">09</div>
                            <div class="day">SÁBADO</div>
                            <div class="month">ABRIL</div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="past-event-right-red rounded-4">
                            <div class="daynum">14</div>
                            <div class="day">JUEVES</div>
                            <div class="month">ENERO</div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="past-event-left-black rounded-4">
                            <div class="daynum">27</div>
                            <div class="day">VIERNES</div>
                            <div class="month">MAYO</div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="past-event-left-black rounded-4">
                            <div class="daynum">30</div>
                            <div class="day">VIERNES</div>
                            <div class="month">MARZO</div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="past-event-right-red rounded-4">
                            <div class="daynum">09</div>
                            <div class="day">SÁBADO</div>
                            <div class="month">ABRIL</div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="past-event-left-black rounded-4">
                            <div class="daynum">14</div>
                            <div class="day">JUEVES</div>
                            <div class="month">ENERO</div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="past-event-right-red rounded-4">
                            <div class="daynum">14</div>
                            <div class="day">JUEVES</div>
                            <div class="month">ENERO</div>
                        </div>
                    </div>
                </div>
                <div class="photo row g-3">
                    <div class="col-6 col-md-3 ">
                        <div class="past-event-1 rounded-4"></div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="past-event-2 rounded-4"></div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="past-event-3 rounded-4"></div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="past-event-4 rounded-4"></div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="past-event-1 rounded-4"></div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="past-event-2 rounded-4"></div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="past-event-3 rounded-4"></div>
                    </div>

                    <div class="col-6 col-md-3 ">
                        <div class="past-event-4 rounded-4"></div>
                    </div>
                </div>
            </div>

            <button class="CTA btn hover-scale mt-5">2026</button>
        </section>

        <!-- BARRA INFORMATIVA DECORATIVA. -->
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
