<!-- ESTE ARCHIVO SE ENCARGA DEL DASHBOARD DE USUARIO. En este dashboard vamos a encontrar 5 secciones principales, a parte de header y footer: Una calendario (idéntico al de eventos), el nivel que tiene de asistencia a las fiestas, un apartado de nerworking, un apartado de recompensas y otro para la galería de fotos personales.-->

<?php
require_once 'init.php';
require_once 'db.php';

// LA COMPROBACIÓN PRINCIPAL PARA ENTRA A ESTA PÁGINA ES SI EXISTE LA VARIABLE DE SESIÓN EMAIL, SI NO, REDIRIGIMOS AL LOGIN.
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// CON ESTA CONSULTA COGEMOS DE LA BASE DE DATOS LOS DATOS DEL USUARIO QUE ESTÁ LOGGEADO. Y por si acaso, establecemos unos datos predeterminados si no encontramos algún dato del usuario.
try {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $_SESSION['email']]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $usuario = null;
}

if (!$usuario) {
    
    $usuario = [
        'id' => 1,
        'usuario' => 'sara_admin',
        'email' => 'saraj@gmail.com',
        'avatar' => 'img/perfil-3.png'
    ];
}


// EN ESTA CONSULTA OBTENEMOS LOS DATOS DE LOS PRÓXIMOS EVENTOS DE IGUAL MANERA QUE EN LA PAGINA DE EVENTOS, PARA USARLOS EN EL CALENDARIO. POR SI NO HAY EVENTOS, HEMOS PREDETERMINADO UN ARRAY VACÍO.
try {
    $stmt_ev = $pdo->query("SELECT * FROM proximos_eventos ORDER BY fecha ASC");
    $proximos_eventos = $stmt_ev->fetchAll();
} catch (PDOException $e) {
    $proximos_eventos = [];
}


// EN ESTA CONSULTA OBTENEMOS LOS DATOS DE LOS USUARIOS PARA EL APARTADO DE NETWORKING. LIMITAMOS A 2 PARA QUE SOLO MUESTRE 2 USUARIOS. Aparte, si hay menos de dos usuarios hemos establecido unos datos de relleno.
try {
    $stmt_net = $pdo->prepare("SELECT usuario, rol, avatar FROM usuarios WHERE id != :id LIMIT 2");
    $stmt_net->execute(['id' => $usuario['id']]);
    $network_users = $stmt_net->fetchAll();
} catch (PDOException $e) {
    $network_users = [];
}


if (count($network_users) < 2) {
    $network_users = [
        ['usuario' => 'OLIVIA', 'rol' => 'artista', 'avatar' => 'img/perfil-3.png'],
        ['usuario' => 'WESO', 'rol' => 'promotor', 'avatar' => 'img/perfil-2.png']
    ];
}


// EN ESTA CONSULTA OBTENEMOS LAS FOTOS DEL USUARIO PARA EL APARTADO DE FOTOS. LIMITAMOS A 6 PARA QUE SOLO MUESTRE 6 FOTOS. Aparte, si no hay fotos hemos establecido unas fotos de relleno.
try {
    $stmt_gal = $pdo->prepare("SELECT ruta_foto FROM galerias_privadas WHERE usuario_id = :id LIMIT 6");
    $stmt_gal->execute(['id' => $usuario['id']]);
    $user_photos = $stmt_gal->fetchAll();
} catch (PDOException $e) {
    $user_photos = [];
}


if (count($user_photos) === 0) {
    $user_photos = [
        // ['ruta_foto' => 'img/1.png'],
        // ['ruta_foto' => 'img/2.png'],
        // ['ruta_foto' => 'img/3.png'],
        // ['ruta_foto' => 'img/4.png'],
        // ['ruta_foto' => 'img/5.png'],
        // ['ruta_foto' => 'img/chief-artistas.png']
    ];
}

$active_page='inicio';

include 'dashboard_header.php';
?>

        
        <main id="dashboard" class="dashboard-content container-fluid py-3">
            <div class="row ">
                
                
                <div class="col-lg-4 dashboard-col-left d-flex flex-column gap-3">
                    
                    <!-- Este es el calendario, con las mismas funcionalidades que el calendario de eventos, solo cambiamos el estilo. -->
                    <div class="dashboard-card calendar-box dashboard-calendar-card p-4 d-flex flex-column align-items-center justify-content-around">
                        <div class="cabecera-calendario d-flex justify-content-between align-items-center w-100 mb-3">
                            <button id="prevMonth" class="btn-bajomundo-simple-black-left"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                </svg></button>
                            <h5 id="currentMonthYear">Junio 2026</h5>
                            <button id="nextMonth" class="btn-bajomundo-simple-black"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                </svg></button>
                        </div>
                        <div class="calendar-grid" id="calendarGrid">
                            <!-- Y aquí se pinta con JS -->
                        </div>
                    </div>
                    
                    <!-- Esta es la sección para el Networking. -->
                    <div class="dashboard-card card-beige p-4">
                        <div class="card-header-custom d-flex justify-content-between align-items-center mb-2">
                            <h3>NETWORKING</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4 0 1 1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                            </svg>
                        </div>
                        <p class="subtitle-text">¡CONECTA CON EL BAJO MUNDO!<br><span class="opacity-75">Participa en la comunidad y descubre nuevos artistas</span></p>
                        
                        <div class="networking-list d-flex flex-column gap-3 mt-3">
                            <?php 
                            if (!empty($network_users)) {
                                foreach ($network_users as $net_user) {
                            ?>
                                    <div class="networking-item d-flex align-items-center justify-content-between p-3 rounded-4 bg-white shadow-sm">
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="<?php echo $net_user['avatar']; ?>" alt="User Avatar" class="net-avatar rounded-circle">
                                            <div>
                                                <h4 class="net-name mb-0"><?php echo $net_user['usuario']; ?></h4>
                                                <p class="net-role mb-0 text-capitalize text-muted"><?php echo $net_user['rol']; ?></p>
                                            </div>
                                        </div>
                                        <button class="btn-connect-add" aria-label="Conectar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                                            </svg>
                                        </button>
                                    </div>
                            <?php 
                                }
                            }
                            ?>
                        </div>
                        <div class="text-end mt-3">
                            <a href="comunidad.php" class="dashboard-link">DESCUBRE MÁS <svg
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-right-short"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                    </svg></a>
                        </div>
                    </div>
                    
                </div>
                
                
                <div class="col-lg-8 dashboard-col-right d-flex flex-column gap-3">
                    <!-- Apartado para la asistencia -->
                    <div class="dashboard-card card-beige p-4">
                        <div class="card-header-custom d-flex justify-content-between align-items-center mb-3">
                            <h3>ASISTENCIA</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-ticket-perforated" viewBox="0 0 16 16">
                                <path d="M4 4.85v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9zm-7 1.8v.9h1v-.9zm7 0v.9h1v-.9z"/>
                                <path d="M1.5 3a.5.5 0 0 0-.5.5V6a.5.5 0 0 1-.5.5.5.5 0 0 0 0 1 .5.5 0 0 1 .5.5v2.5a.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5.5.5 0 0 0 0 1 .5.5 0 0 1-.5.5v1.5a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.5a.5.5 0 0 1-.5-.5.5.5 0 0 0 0-1 .5.5 0 0 1 .5-.5V8.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 0-1 .5.5 0 0 1-.5-.5V3.5a.5.5 0 0 0-.5-.5zM2 4h12v2.049a1.5 1.5 0 0 0 0 2.902V12H2V8.951a1.5 1.5 0 0 0 0-2.902zm0 0"/>
                            </svg>
                        </div>
                        
                        
                        <div class="attendance-tracker position-relative py-1 d-flex align-items-center justify-content-center">
                            <div class="progress-custom-bar w-100 d-flex">
                                <div class="progress-block red-block"></div>
                                <div class="progress-block red-block"></div>
                                <div class="progress-block red-block"></div>
                                <div class="progress-block red-block flex-grow-1"></div>
                                <div class="level-badge-container">
                                    <div class="level-star-badge">
                                        <span>Lv</span>
                                        <strong>10</strong>
                                    </div>
                                </div>
                                <div class="progress-block yellow-block"></div>
                                <div class="progress-block yellow-block"></div>
                                <div class="progress-block yellow-block"></div>
                                <div class="progress-block yellow-block"></div>
                                <div class="progress-block yellow-block"></div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-1">
                            <h4 class="attendance-status">¡ESO ESTÁ PELUCHE!</h4>
                            <p class="attendance-desc text-muted">Estás on fire, no te pierdes ni una, ¡qué bacano!</p>
                            <a href="#" class="dashboard-link">FORMULARIO DE ASISTENCIA ➔</a>
                        </div>
                    </div>
                    
                    <!-- Apartado para las recompensas -->
                    <div class="dashboard-card card-beige p-4">
                        <div class="card-header-custom d-flex justify-content-between align-items-center mb-3">
                            <h3>RECOMPENSAS</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16">
                                <path d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.18.18 0 0 0 .134.098l1.42.206c.145.021.204.2.098.302L9.42 6.994a.18.18 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.18.18 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.18.18 0 0 0-.05-.158L5.19 6.994a.178.178 0 0 1 .099-.302l1.42-.206a.18.18 0 0 0 .134-.098z"/>
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                            </svg>
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="reward-subcard p-3 rounded-4 d-flex align-items-center gap-3">
                                    <img src="img/past-event-1.png" alt="Reward 1" class="reward-img rounded-3">
                                    <div class="reward-content">
                                        <h4 class="reward-title">PASE GRATIS</h4>
                                        <p class="reward-desc text-muted mb-2">Pasa gratis hasta las 1:00</p>
                                        <a href="#" class="reward-btn-link">DESCARGAR INVITACIÓN ➔</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="reward-subcard p-3 rounded-4 d-flex align-items-center gap-3">
                                    <img src="img/past-event-2.png" alt="Reward 2" class="reward-img rounded-3">
                                    <div class="reward-content">
                                        <h4 class="reward-title">CÓDIGO DE DESCUENTO</h4>
                                        <p class="reward-desc text-muted mb-2">Canjea este código con tu próxima entrada</p>
                                        <a href="#" class="reward-btn-link">CANJEAR CÓDIGO ➔</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-end mt-1">
                            <a href="#" class="dashboard-link">TODAS LAS RECOMPENSAS ➔</a>
                        </div>
                    </div>
                    
                    <!-- Apartado para mi galería. Ofrece una vista previa de las imágenes y videos que hay dentro. -->
                    <div class="dashboard-card card-orange p-4">
                        <div class="card-header-custom d-flex justify-content-between align-items-center mb-3">
                            <h3>MI GALERÍA</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-grid-3x3-gap-fill" viewBox="0 0 16 16">
                                <path d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                            </svg>
                        </div>
                        
                        
                        <div class="dashboard-gallery-grid">
                            <?php 
                            if (!empty($user_photos)) {
                                foreach ($user_photos as $photo) {
                            ?>
                                    <div class="gallery-grid-item">
                                        <img src="<?php echo $photo['ruta_foto']; ?>" alt="Foto Galería" class="img-fluid rounded-3">
                                    </div>
                            <?php 
                                }
                            } else{
                                ?>
                                <div class="text-center w-100">
                                    <p>No has subido imágenes todavía</p>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        
                        <div class="text-end mt-1">
                            <a href="dashboard_migaleria.php" class="dashboard-link-white">MI CONTENIDO ➔</a>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </main>
        
        </div>
   
    </div>


    <!-- AQUÍ INYECTAMOS DATOS PARA USAR CON JAVASCRIPT EN EL CALENDARIO. -->
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
    <div>

    
<?php
include 'dashboard_footer.php';
?>
