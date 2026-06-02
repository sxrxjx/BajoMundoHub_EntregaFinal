<!-- ESTE ARCHIVO CONTIENE LA LÓGICA DE LA GALERÍA PRIVADA DE USUARIO. -->

<?php
require_once 'init.php';
require_once 'db.php';


// COMPROBAMOS QUE HAY USUARIO LOGGEADO. SI NO SE REDIRIGE A LA PÁGINA DE LOGIN.
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}


// OBTENEMOS LOS DATOS DEL USUARIO. Establecemos unos predeterminados si no existiesen.
try {
    $sentencia = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sentencia->execute(['email' => $_SESSION['email']]);
    $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $usuario = null;
}

if (!$usuario) {
    
    $usuario = [
        'id' => 1,
        'usuario' => 'sara_admin',
        'email' => 'saraj@gmail.com',
        'avatar' => 'img/perfil-10.png'
    ];
}

// VARIABLES PARA LOS ERRORES. Si hay error se muestra el mensaje y luego se elimina la variable.
$msg_error = isset($_SESSION['msg_error']) ? $_SESSION['msg_error'] : '';
$msg_exito = isset($_SESSION['msg_exito']) ? $_SESSION['msg_exito'] : '';
unset($_SESSION['msg_error']);
unset($_SESSION['msg_exito']);

// COMPROBAMOS SI SE HA PULSADO EL BOTÓN DE BORRAR DE ALGUNA FOTO. OBTENEMOS LA ACCIÓN Y EL ID DE LA URL QUE SE PASA POR EL GET. La siguiente consulta elimina la foto con el id recogido.
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    // Esto devuelve el número entero que se recoge del id del GET
    $id_foto = intval($_GET['id']);
    try {
        
        $sentencia_verificacion = $pdo->prepare("SELECT ruta_foto FROM galerias_privadas WHERE id = :id AND usuario_id = :usuario_id");
        $sentencia_verificacion->execute(['id' => $id_foto, 'usuario_id' => $usuario['id']]);
        $foto_a_eliminar = $sentencia_verificacion->fetch(PDO::FETCH_ASSOC);

        if ($foto_a_eliminar) {
            $ruta_fisica = $foto_a_eliminar['ruta_foto'];
            
            
            $sentencia_eliminacion = $pdo->prepare("DELETE FROM galerias_privadas WHERE id = :id");
            $sentencia_eliminacion->execute(['id' => $id_foto]);
            
            
            if (file_exists($ruta_fisica)) {
                if ($ruta_fisica !== 'img/1.png' && 
                    $ruta_fisica !== 'img/2.png' && 
                    $ruta_fisica !== 'img/3.png' && 
                    $ruta_fisica !== 'img/4.png' && 
                    $ruta_fisica !== 'img/5.png' && 
                    $ruta_fisica !== 'img/foto-1.png' && 
                    $ruta_fisica !== 'img/foto-2.png' && 
                    $ruta_fisica !== 'img/foto-3.png' && 
                    $ruta_fisica !== 'img/chief-artistas-set-1.gif' && 
                    $ruta_fisica !== 'img/chief-artistas-set-2.gif' && 
                    $ruta_fisica !== 'img/vicky-artistas-set-1.gif') {
                    unlink($ruta_fisica);
                }
            }
            $_SESSION['msg_exito'] = "¡Elemento eliminado con éxito!";
        } else {
            $_SESSION['msg_error'] = "No tienes permisos para eliminar este elemento.";
        }
    } catch (PDOException $e) {
        $_SESSION['msg_error'] = "Error al intentar eliminar el elemento.";
    }
    
    
    header("Location: dashboard_migaleria.php");
    exit;
}


// ESTA PARTE DEL CÓDIGO ES LA QUE SE ENCARGA DE SUBIR LAS FOTOS Y LOS VIDEOS. Se distinguen las extensiones para diferenciar entre video e imagen y a la vez restringir otro tipo de archivos no compatibles. También se controla el tamaño de los archivos. La ruta de guardado es img/ y el nombre del archivo empieza por upload_ seguido del id del usuario y el momento exacot en el que se sube, mas el nombre original del archivo.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['media_file'])) {
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $archivo = $_FILES['media_file'];

    $extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
    
    $es_imagen = ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png' || $extension === 'webp');
    $es_video = ($extension === 'mp4' || $extension === 'mov' || $extension === 'gif');

    if (!$es_imagen && !$es_video) {
        $_SESSION['msg_error'] = "Formato no permitido. Solo se permiten imágenes (JPG, PNG, WEBP) o vídeos/GIFs (MP4, MOV, GIF).";
    } else {
        
        $max_size = 15 * 1024 * 1024;
        if ($archivo['size'] > $max_size) {
            $_SESSION['msg_error'] = "El archivo supera el tamaño máximo permitido de 15MB.";
        } else {
            
            $nombre_limpio = basename($archivo['name']);
            $nuevo_nombre_archivo = 'upload_' . $usuario['id'] . '_' . time() . '_' . $nombre_limpio;
            $directorio_subida = 'img/';
            $destino = $directorio_subida . $nuevo_nombre_archivo;

            if (move_uploaded_file($archivo['tmp_name'], $destino)) {
                try {
                    $sentencia_insercion = $pdo->prepare("INSERT INTO galerias_privadas (usuario_id, ruta_foto, descripcion) VALUES (:usuario_id, :ruta_foto, :descripcion)");
                    $sentencia_insercion->execute([
                        'usuario_id' => $usuario['id'],
                        'ruta_foto' => $destino,
                        'descripcion' => $descripcion
                    ]);
                    $_SESSION['msg_exito'] = "¡Archivo subido con éxito y guardado en tu galería!";
                } catch (PDOException $e) {
                    $_SESSION['msg_error'] = "Error al guardar en la base de datos: " . $e->getMessage();
                    if (file_exists($destino)) {
                        unlink($destino);
                    }
                }
            } else {
                $_SESSION['msg_error'] = "No se pudo mover el archivo al directorio de destino.";
            }
        }
    }
    
    
    header("Location: dashboard_migaleria.php");
    exit;
}

// Esto va a recoger todas las fotos y videos que el usuario ha subido a su base de datos, para así poder mostrarlas en la galería.
try {
    $sentencia_gal = $pdo->prepare("SELECT * FROM galerias_privadas WHERE usuario_id = :id ORDER BY creado_en DESC");
    $sentencia_gal->execute(['id' => $usuario['id']]);
    $fotos_usuario_bd = $sentencia_gal->fetchAll();
} catch (PDOException $e) {
    $fotos_usuario_bd = [];
}

// guardamos las rutas en dos arrays, uno para fotos y otro para videos.
$fotos_galeria = [];
$videos_galeria = [];

foreach ($fotos_usuario_bd as $p) {
    $extension = strtolower(pathinfo($p['ruta_foto'], PATHINFO_EXTENSION));
    
    
    if ($extension === 'mp4' || $extension === 'mov' || $extension === 'gif') {
        $videos_galeria[] = $p;
    } else {
        $fotos_galeria[] = $p;
    }
}



// y aquí asignamos las posiciones según su posición en cada array. Es decir, si hay 4 fotos, la primera se guarda en $foto_grande, la segunda en $foto_peque1, etc. GUARDAMOS LOS ID DE CADA FOTO Y VIDEO PARA PODER USARLOS EN EL GET DEL BOTÓN DELETE EN LA GALERÍA.

$foto_grande = isset($fotos_galeria[0]) ? $fotos_galeria[0]['ruta_foto'] : null;
$id_foto_grande = isset($fotos_galeria[0]['id']) ? $fotos_galeria[0]['id'] : null;

$foto_peque1 = isset($fotos_galeria[1]) ? $fotos_galeria[1]['ruta_foto'] : null;
$id_foto_peque1 = isset($fotos_galeria[1]['id']) ? $fotos_galeria[1]['id'] : null;

$foto_peque2 = isset($fotos_galeria[2]) ? $fotos_galeria[2]['ruta_foto'] : null;
$id_foto_peque2 = isset($fotos_galeria[2]['id']) ? $fotos_galeria[2]['id'] : null;

$foto_banner = isset($fotos_galeria[3]) ? $fotos_galeria[3]['ruta_foto'] : null;
$id_foto_banner = isset($fotos_galeria[3]['id']) ? $fotos_galeria[3]['id'] : null;

$foto_alta = isset($fotos_galeria[4]) ? $fotos_galeria[4]['ruta_foto'] : null;
$id_foto_alta = isset($fotos_galeria[4]['id']) ? $fotos_galeria[4]['id'] : null;

$foto_abajo = isset($fotos_galeria[5]) ? $fotos_galeria[5]['ruta_foto'] : null;
$id_foto_abajo = isset($fotos_galeria[5]['id']) ? $fotos_galeria[5]['id'] : null;


$vid_alto1 = isset($videos_galeria[0]) ? $videos_galeria[0]['ruta_foto'] : null;
$id_vid_alto1 = isset($videos_galeria[0]['id']) ? $videos_galeria[0]['id'] : null;

$vid_alto2 = isset($videos_galeria[1]) ? $videos_galeria[1]['ruta_foto'] : null;
$id_vid_alto2 = isset($videos_galeria[1]['id']) ? $videos_galeria[1]['id'] : null;

$vid_ancho = isset($videos_galeria[2]) ? $videos_galeria[2]['ruta_foto'] : null;
$id_vid_ancho = isset($videos_galeria[2]['id']) ? $videos_galeria[2]['id'] : null;


// esta función se encarga de convertir las rutas anteriores en imágenes o videos según su extensión. Si no hay imagen o video, muestra un "slot" vacío con un signo de más para poder subir uno. Además, nos aseguramos de que solo se muestren los que pertenecen al usuario. 
function renderizarMedia($ruta, $clase = "") {
    if (!$ruta) {
        return "<div class='slot-vacio' data-bs-toggle='modal' data-bs-target='#uploadModal'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-plus-lg' viewBox='0 0 16 16'>
                        <path fill-rule='evenodd' d='M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2'/>
                    </svg>
                </div>";
    }
    
    if (strpos($ruta, '.mp4') !== false || strpos($ruta, '.mov') !== false) {
        return "<video class='$clase' autoplay loop muted playsinline><source src='$ruta' type='video/mp4'></video>";
    } else {
        
        return "<img class='$clase' src='$ruta' alt='Media'>";
    }
}
include 'dashboard_header.php';
?>
            
            
            <main id="dashboard" class="dashboard-content dashboard-content-galeria container-fluid py-4">
                
                
                <?php if (!empty($msg_exito)): ?>
                    <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                        <?php echo $msg_exito; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($msg_error)): ?>
                    <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                        <?php echo $msg_error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                
                <div class="galeria-orange-card">
                    
                    
                    <div class="galeria-header-top">
                        <h1>Mi Galería</h1>
                        <span class="icon-grid-top">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-grid-3x3-gap-fill" viewBox="0 0 16 16">
                                <path d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                            </svg>
                        </span>
                    </div>

                    <div class="row g-4">
                        
                        
                        <div class="col-lg-6">
                            <div class="panel-header d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h2 class="panel-main-title">Fotografías</h2>
                                    <h4 class="panel-subtitle">¡Te ves bien peluche!</h4>
                                    <p class="panel-desc">Comparte tus momentos fav con nosotros</p>
                                </div>
                                <button class="btn-add-media" data-bs-toggle="modal" data-bs-target="#uploadModal" title="Subir Imagen">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                                    </svg>
                                </button>
                            </div>

                            
                            <?php if (empty($fotos_galeria)): ?>
                                <div class="galeria-empty-state">
                                    <div class="empty-state-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                                            <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2M14 3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1z"/>
                                        </svg>
                                    </div>
                                    <p>No has subido imágenes todavía</p>
                                </div>
                            <?php else: ?>
                                <div class="grid-fotos-wireframe">
                                    
                                    <div class="foto-item foto-grande">
                                        <?php echo renderizarMedia($foto_grande); ?>
                                        <?php if ($id_foto_grande): ?>
                                            <a href="dashboard_migaleria.php?action=delete&id=<?php echo $id_foto_grande; ?>" class="btn-delete-wireframe" onclick="return confirm('¿Seguro que quieres eliminar esta foto?');">&times;</a>
                                        <?php endif; ?>
                                    </div>

                                    
                                    <div class="grid-inferior-wrapper">
                                        <div class="subgrid-izq">
                                            <div class="subgrid-peques">
                                                <div class="foto-item foto-peque">
                                                    <?php echo renderizarMedia($foto_peque1); ?>
                                                    <?php if ($id_foto_peque1): ?>
                                                        <a href="dashboard_migaleria.php?action=delete&id=<?php echo $id_foto_peque1; ?>" class="btn-delete-wireframe" onclick="return confirm('¿Seguro que quieres eliminar esta foto?');">&times;</a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="foto-item foto-peque">
                                                    <?php echo renderizarMedia($foto_peque2); ?>
                                                    <?php if ($id_foto_peque2): ?>
                                                        <a href="dashboard_migaleria.php?action=delete&id=<?php echo $id_foto_peque2; ?>" class="btn-delete-wireframe" onclick="return confirm('¿Seguro que quieres eliminar esta foto?');">&times;</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="foto-item foto-banner">
                                                <?php echo renderizarMedia($foto_banner); ?>
                                                <?php if ($id_foto_banner): ?>
                                                    <a href="dashboard_migaleria.php?action=delete&id=<?php echo $id_foto_banner; ?>" class="btn-delete-wireframe" onclick="return confirm('¿Seguro que quieres eliminar esta foto?');">&times;</a>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="foto-item foto-abajo">
                                                <?php echo renderizarMedia($foto_abajo); ?>
                                                <?php if ($id_foto_abajo): ?>
                                                    <a href="dashboard_migaleria.php?action=delete&id=<?php echo $id_foto_abajo; ?>" class="btn-delete-wireframe" onclick="return confirm('¿Seguro que quieres eliminar esta foto?');">&times;</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        
                                        <div class="foto-item foto-alta">
                                            <?php echo renderizarMedia($foto_alta); ?>
                                            <?php if ($id_foto_alta): ?>
                                                <a href="dashboard_migaleria.php?action=delete&id=<?php echo $id_foto_alta; ?>" class="btn-delete-wireframe" onclick="return confirm('¿Seguro que quieres eliminar esta foto?');">&times;</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        
                        <div class="col-lg-6">
                            <div class="panel-header d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h2 class="panel-main-title">Clips y Videos</h2>
                                    <h4 class="panel-subtitle">El chuckiteo que nos gusta</h4>
                                    <p class="panel-desc">Tus videos merecen ser recordados</p>
                                </div>
                                <button class="btn-add-media" data-bs-toggle="modal" data-bs-target="#uploadModal" title="Subir Video">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                                    </svg>
                                </button>
                            </div>

                            
                            <?php if (empty($videos_galeria)): ?>
                                <div class="galeria-empty-state">
                                    <div class="empty-state-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1v2h-2V1zm-2 3h2v2h-2zm2 3v2h-2V7zm-2 3h2v2h-2zm2 3v2h-2v-2z"/>
                                        </svg>
                                    </div>
                                    <p>No has subido vídeos todavía</p>
                                </div>
                            <?php else: ?>
                                <div class="grid-videos-wireframe">
                                    <div class="videos-superiores">
                                        <div class="foto-item video-alto">
                                            <?php echo renderizarMedia($vid_alto1); ?>
                                            <?php if ($id_vid_alto1): ?>
                                                <a href="dashboard_migaleria.php?action=delete&id=<?php echo $id_vid_alto1; ?>" class="btn-delete-wireframe" onclick="return confirm('¿Seguro que quieres eliminar este clip?');">&times;</a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="foto-item video-alto">
                                            <?php echo renderizarMedia($vid_alto2); ?>
                                            <?php if ($id_vid_alto2): ?>
                                                <a href="dashboard_migaleria.php?action=delete&id=<?php echo $id_vid_alto2; ?>" class="btn-delete-wireframe" onclick="return confirm('¿Seguro que quieres eliminar este clip?');">&times;</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="foto-item video-ancho">
                                        <?php echo renderizarMedia($vid_ancho); ?>
                                        <?php if ($id_vid_ancho): ?>
                                            <a href="dashboard_migaleria.php?action=delete&id=<?php echo $id_vid_ancho; ?>" class="btn-delete-wireframe" onclick="return confirm('¿Seguro que quieres eliminar este clip?');">&times;</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                
                <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content modal-content-custom">
                            <div class="modal-header modal-header-custom">
                                <h5 class="modal-title" id="uploadModalLabel">Subir contenido a mi galería</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="dashboard_migaleria.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <p class="small text-muted mb-3">Puedes subir imágenes (JPG, PNG, GIF, WEBP) o clips de vídeo cortos (MP4, WEBM). Máximo 15MB.</p>
                                    <div class="mb-3">
                                        <label for="media_file" class="form-label fw-bold">Seleccionar archivo</label>
                                        <input type="file" class="form-control form-control-custom" id="media_file" name="media_file" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="descripcion" class="form-label fw-bold">Descripción (opcional)</label>
                                        <textarea class="form-control form-control-custom" id="descripcion" name="descripcion" rows="3" placeholder="Añade un comentario sobre este momento..."></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary rounded-4 px-4 py-2" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn-modal-submit w-auto px-5 py-2">Subir Elemento ➔</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            
        </div>

<?php
include 'dashboard_footer.php';
?>
