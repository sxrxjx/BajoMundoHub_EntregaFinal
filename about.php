<?php
require_once 'init.php';
require_once 'db.php';

// HACEMOS UNA CONSULTA PARA RECOGER LOS TÉRMINOS DE LA BASE DE DATOS QUE HAY PARA LA TABLA GLOSARIO.
// Ordenamos por término ASC para que salgan en orden alfabético.
try {
    $stmt_glo = $pdo->query("SELECT * FROM glosario ORDER BY termino ASC");
    $terminos_glosario = $stmt_glo->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $terminos_glosario = [];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About - Bajo Mundo Hub</title>
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

    <main id="about">
        <section id="hero-about"
            class="container-fluid d-flex flex-column align-items-center justify-content-center gap-4">
            <div id="about-logo" class="container-fluid">
                <div class="row align-items-center">

                    <div class="container col-md-8">
                        <img src="img/about.png" alt="" class="pegatina img-fluid mt-md-0">
                    </div>
                    <button onclick="window.location.href='registro.php'" class="CTA hover-scale my-3">Forma parte de nosotros</button>
                </div>
            </div>
        </section>

        <section class="manifiesto-section container-fluid">

            <img src="img/botella_pick.png" alt="" class="manifiesto-decor-left">
            <img src="img/silla_pick.png" alt="" class="manifiesto-decor-right">
            <img src="img/bolsas_pick.png" alt="" class="manifiesto-decor-center">

            <div class="manifiesto-container">
                <div class="manifiesto-title text-center mb-5">
                    <img src="img/manifiesto.png" alt="" class="img-fluid">
                </div>

                <div class="manifiesto-text row g-md-5 py-3">
                    <div class="col-md-6 mb-4 mb-md-0 text-justify">
                        <p class="mb-4">
                            Bajo Mundo nace de la calle, del pulso urbano y de la música que conecta a la gente más allá
                            de la pista. Cada noche que organizamos es un espacio de libertad, creatividad y encuentro,
                            donde el ritmo del dembow, el reggaetón y los sonidos urbanos se mezclan con historias,
                            actitudes y energía genuina. No es solo una fiesta: es un lugar donde se construye
                            comunidad, se celebra la identidad y se respeta la autenticidad de quienes vienen a vivir la
                            experiencia. Cada evento es una oportunidad de romper la rutina, de sentir la música en cada
                            latido y de experimentar la cultura urbana en su forma más pura.
                        </p>
                        <p class="mb-4">
                            Creemos en la música como lenguaje, como puente entre generaciones y como medio para
                            compartir lo que somos. Nuestro espacio es inclusivo, abierto a todos los que respeten el
                            flow, la cultura y la actitud que nos define. Aquí se aprende a moverse con el ritmo, a
                            conectar con los demás y a vivir la noche con intensidad, sin artificios y sin perder la
                            esencia de la calle. Las noches de Bajo Mundo no tienen guion: son impredecibles,
                            espontáneas y auténticas, porque cada persona que pisa la pista aporta algo único que se
                            mezcla con los beats y crea la energía colectiva de la experiencia.
                        </p>
                        <p class="mb-0">
                            Bajo Mundo es también un archivo vivo de la cultura urbana dominicana: los beats, la jerga,
                            los movimientos, la moda, la actitud y la manera de expresarse. Cada evento se convierte en
                            un espacio donde la cultura se siente, se aprende y se transmite, donde los nuevos talentos
                            tienen la oportunidad de mostrarse y donde cada DJ, cada performer y cada visitante se
                            vuelve parte de un mismo pulso. Nuestra filosofía no se limita a la música: también se
                            refleja en la comunidad, en la manera de cuidarnos entre todos y en la forma de respetar y
                            valorar la creatividad que circula en cada esquina de la pista.
                        </p>
                    </div>
                    <div class="col-md-6 text-justify">
                        <p class="mb-4">
                            Nuestra misión es que cada persona que entra a Bajo Mundo sientan que forma parte de algo más
                            grande, que lo que ocurre en la pista trascienda la noche y se convierta en recuerdo,
                            inspiración y referencia cultural. No buscamos ser una fiesta más: buscamos un lugar donde
                            la identidad, la música y la gente se mezclen y generen momentos memorables. Queremos que la
                            experiencia sea tanto emocional como física, que cada beat golpee con intención y que cada
                            interacción refuerce la sensación de pertenencia.
                        </p>
                        <p class="mb-4">
                            En Bajo Mundo, cada sonido, cada scratch, cada drop y cada transición cuentan una historia.
                            Aquí se respeta la tradición y se celebra la innovación, combinando la esencia del reggaetón
                            y el dembow con nuevas propuestas, talentos emergentes y colaboraciones inesperadas. La
                            cabina es un laboratorio de energía, los artistas son narradores del ritmo y los asistentes
                            son parte de la narrativa que construye cada noche. La cultura urbana no es solo música: es
                            identidad, actitud, lenguaje y movimiento, y Bajo Mundo busca amplificar todo eso, siempre
                            con respeto por sus raíces y con mirada puesta en el futuro.
                        </p>
                        <p class="mb-0">
                            Este manifiesto es un llamado a quienes quieran vivir la música desde adentro, a quienes
                            buscan comunidad más allá del entretenimiento y a quienes entienden que Bajo Mundo es más
                            que un nombre: es un movimiento, un estilo de vida y una declaración de intenciones. Aquí se
                            mezcla la calle con el escenario, la tradición con la innovación, y la experiencia con la
                            memoria. Cada edición reafirma que Bajo Mundo es espacio de encuentro, espacio de respeto,
                            espacio de creación y espacio para sentirse vivo, conectado y parte de algo que trasciende
                            más allá del club.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="concepto-section container-fluid">
            <div class="container py-3">
                <div class="row g-md-5 align-items-center">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <h2 class="section-title">CONCEPTO</h2>
                        <h4 class="section-subtitle">EL CORITO SANO</h4>
                        <p class="mb-4 text-justify">
                            Bajo Mundo es más que una fiesta: es un espacio donde la música, la cultura y la comunidad
                            se encuentran para crear algo único. Cada evento nace de la necesidad de conectar personas a
                            través de ritmos urbanos, dembow, reggaetón y sonidos que reflejan la identidad de nuestra
                            generación. La pista no es solo un lugar para bailar, sino un escenario donde se construye
                            historia, se comparten experiencias y se siente la energía de quienes forman parte de este
                            movimiento. Nuestro concepto busca fusionar tradición y modernidad, respetando las raíces de
                            la música urbana dominicana mientras exploramos nuevas formas de expresión y creatividad
                            sonora.
                        </p>
                        <p class="mb-4 text-justify">
                            Cada edición de Bajo Mundo se concibe como un laboratorio cultural. Desde la selección
                            musical hasta la producción visual, todo está pensado para transmitir un lenguaje propio,
                            donde la comunidad juega un papel activo. No es solo consumir un evento, sino vivirlo desde
                            adentro, con interacción, conexión y respeto por la cultura que nos inspira. La experiencia
                            se extiende más allá de la pista: cada beat, cada iluminación, cada detalle busca generar
                            sensaciones y recuerdos que trascienden la noche. La filosofía de Bajo Mundo se centra en la
                            autenticidad, la inclusividad y la energía compartida, donde todos los asistentes se sienten
                            parte de algo más grande que ellos mismos.
                        </p>
                        <p class="mb-0 text-justify">
                            Nuestro proyecto se alimenta de la calle, de los barrios, de la música que nace en los
                            lugares donde la creatividad surge de manera natural. La jerga, los gestos, la actitud y los
                            códigos de la cultura urbana dominicana forman parte del ADN de Bajo Mundo.
                        </p>
                    </div>
                    <div class="col-md-6 text-justify">
                        <p class="mb-4">
                            Por eso no solo celebramos música: celebramos identidad, raíces y un estilo de vida que se
                            transmite de generación en generación. Cada artista, DJ o performer que sube a la cabina
                            suma su visión, reforzando un ecosistema cultural donde la experimentación y la tradición
                            coexisten.
                        </p>
                        <p class="mb-4">
                            En Bajo Mundo entendemos que la comunidad es el corazón de todo. La experiencia de la noche
                            no sería lo mismo sin quienes aportan energía, creatividad y autenticidad. Nuestra filosofía
                            busca que cada asistente se sientan reconocido, que cada interacción sea parte de un tejido
                            cultural vivo y que el espacio sea un reflejo de quienes somos y hacia dónde queremos ir.
                            Aquí no se trata solo de música o entretenimiento: se trata de construir un movimiento, un
                            punto de encuentro y un archivo cultural que documenta y celebra lo urbano, lo auténtico y
                            lo que nos hace vibrar juntos.
                        </p>
                        <p class="mb-0">
                            Cada detalle cuenta, desde la selección musical hasta los visuales y la manera en que la
                            noche se estructura. Todo tiene un propósito: mantener el flow, cuidar la energía y
                            amplificar la experiencia colectiva. Bajo Mundo es ritmo, actitud, respeto y creatividad; es
                            música que se siente en el cuerpo, cultura que se entiende en la mente y comunidad que se
                            percibe en cada mirada y cada gesto. Es un lugar donde la identidad urbana se celebra, se
                            transmite y se comparte, y donde cada visitante puede reconocer su propio reflejo dentro del
                            movimiento.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="estetica-section container-fluid">
            <div class="container py-3">
                <div class="row g-md-5 align-items-center">
                    <div class="col-md-6 mb-4 mb-md-0 text-justify">
                        <h2 class="section-title">CÓDIGOS ESTÉTICOS</h2>
                        <h4 class="section-subtitle">ROPA, BAILE Y PELUCHE</h4>
                        <p class="mb-4">
                            En Bajo Mundo, la estética es parte de la experiencia. No se trata solo de vestir ropa
                            bonita: es expresar quién eres, tu actitud y tu conexión con la música. Cada elección —desde
                            sneakers y gorras hasta accesorios y colores— refleja la energía que traes a la pista. Nos
                            gusta ver creatividad, autenticidad y ese flow callejero que define la cultura urbana y el
                            espíritu de la noche. La pista se convierte en un espacio donde todos los estilos se mezclan
                            y se complementan, creando un mosaico visual que habla tanto como la música.
                        </p>
                        <p class="mb-0">
                            Más allá de la ropa, los códigos estéticos incluyen actitud y movement. La manera en que
                            te expresas, cómo te relacionas con otros y cómo te mueves al ritmo de los beats forma parte
                            del lenguaje de Bajo Mundo. Queremos que cada asistente se sienta libre de mostrar su
                            identidad, pero también consciente del respeto por la comunidad y la cultura que
                            compartimos. Vestir con intención y actitud es celebrar la música, la creatividad y la
                            conexión que hace que cada noche sea única.
                        </p>
                    </div>
                    <div class="col-md-6 estetica-image-container">
                        <div id="esteticaCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#esteticaCarousel" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#esteticaCarousel" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#esteticaCarousel" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#esteticaCarousel" data-bs-slide-to="3"
                                    aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#esteticaCarousel" data-bs-slide-to="4"
                                    aria-label="Slide 5"></button>
                            </div>
                            <div class="carousel-inner rounded-4 shadow">
                                <div class="carousel-item active">
                                    <img src="img/3.png" class="d-block w-100" alt="Códigos estéticos 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/1.png" class="d-block w-100" alt="Códigos estéticos 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/2.png" class="d-block w-100" alt="Códigos estéticos 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/4.png" class="d-block w-100" alt="Códigos estéticos 4">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/5.png" class="d-block w-100" alt="Códigos estéticos 5">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#esteticaCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#esteticaCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="glosario-section container-fluid">
            <div class="container py-3">
                <h2 class="section-title text-center">GLOSARIO</h2>
                <h4 class="section-subtitle text-center">NUESTRA JERGA</h4>
                <div class="alphabet-filter">
                    <button class="btn-letter" data-letter="all">ALL</button>
                    <button class="btn-letter active" data-letter="a">A</button>
                    <button class="btn-letter" data-letter="b">B</button>
                    <button class="btn-letter" data-letter="c">C</button>
                    <button class="btn-letter" data-letter="d">D</button>
                    <button class="btn-letter" data-letter="e">E</button>
                    <button class="btn-letter" data-letter="f">F</button>
                    <button class="btn-letter" data-letter="g">G</button>
                    <button class="btn-letter" data-letter="h">H</button>
                    <button class="btn-letter" data-letter="i">I</button>
                    <button class="btn-letter" data-letter="j">J</button>
                    <button class="btn-letter" data-letter="k">K</button>
                    <button class="btn-letter" data-letter="l">L</button>
                    <button class="btn-letter" data-letter="m">M</button>
                    <button class="btn-letter" data-letter="n">N</button>
                    <button class="btn-letter" data-letter="o">O</button>
                    <button class="btn-letter" data-letter="p">P</button>
                    <button class="btn-letter" data-letter="q">Q</button>
                    <button class="btn-letter" data-letter="r">R</button>
                    <button class="btn-letter" data-letter="s">S</button>
                    <button class="btn-letter" data-letter="t">T</button>
                    <button class="btn-letter" data-letter="u">U</button>
                    <button class="btn-letter" data-letter="v">V</button>
                    <button class="btn-letter" data-letter="w">W</button>
                    <button class="btn-letter" data-letter="x">X</button>
                    <button class="btn-letter" data-letter="y">Y</button>
                    <button class="btn-letter" data-letter="z">Z</button>
                </div>


                <div class="glossary-grid">
                    <?php if (!empty($terminos_glosario)): ?>
                        <?php foreach ($terminos_glosario as $term): ?>
                            <div class="glossary-card" data-letter="<?php echo $term['letra']; ?>">
                                <div class="glossary-card-letter"><?php echo strtoupper($term['letra']); ?></div>
                                <h3 class="glossary-card-title"><?php echo $term['termino']; ?></h3>
                                <p class="glossary-card-desc"><?php echo $term['definicion']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                
                <div id="glossary-empty-state" class="text-center py-5">
                    <div class="card bg-dark border-secondary p-5 m-auto">
                        <h4 class="text-warning mb-3">No hay términos con "<span class="empty-letter">A</span>"</h4>
                        <p class="text-secondary">Esta letra todavía no tiene palabras añadidas. ¿Tienes alguna
                            sugerencia urbana que encaje con el corito? ¡Mándanosla en redes!</p>
                    </div>
                </div>
            </div>
        </section>
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
    </main>

    <?php include("footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>

</html>
