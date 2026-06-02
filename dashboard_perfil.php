<!-- Este archivo controla la sección del perifl privado del usuario. Básicamente es un formulario con un botón de guardar que actualiza los datos del usuario en la base de datos y en el frontend si se le pulsa.-->

<?php
require_once 'init.php';
require_once 'db.php';

// SE COMPRUEBA SI EXISTE LA VARIABLE DE SESIÓN EMAIL, LO QUE SIGNIFICA QUE HAY ALGUIEN LOGGEADO, SI NO NOS VAMOS AL LOGIN.
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// EN ESTA CONSULTA OBTENEMOS LOS DATOS DEL USUARIO QUE ESTÁ LOGGEADO. POR SI ACASO, ESTABLECEMOS UNOS DATOS PREDETERMINADOS SI NO ENCONTRAMOS ALGÚN DATO DEL USUARIO.
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
        'email' => 'admin@bajomundo.com',
        'avatar' => 'img/perfil-pred.png',
        'ciudad' => '',
        'visibilidad' => 'Público, usuario, visible.',
        'biografia' => '',
        'preferencias_musicales' => '',
        'telefono' => ''
    ];
} 

// VARIABLES PARA LOS ERRORES. Si hay error se muestra el mensaje y luego se elimina la variable. Al recargar la página ya deja de salir.
$msg_error = isset($_SESSION['msg_error']) ? $_SESSION['msg_error'] : '';
$msg_exito = isset($_SESSION['msg_exito']) ? $_SESSION['msg_exito'] : '';
unset($_SESSION['msg_error']);
unset($_SESSION['msg_exito']);


// COMPROBAMOS SI SE HA INTRODUCIDO ALGÚN DATO EN EL FORMULARIO Y SE LES ASIGNA A VARIABLES.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevo_usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $nuevo_email = isset($_POST['email']) ? $_POST['email'] : '';
    $nueva_ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : '';
    $nueva_visibilidad = isset($_POST['visibilidad']) ? $_POST['visibilidad'] : '';
    $nueva_biografia = isset($_POST['biografia']) ? $_POST['biografia'] : '';
    $nuevo_telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $prefs_array = isset($_POST['prefs']) ? $_POST['prefs'] : [];
    $nuevas_prefs = implode(', ', $prefs_array);

    $ruta_avatar = $usuario['avatar'];

    // COMPROBAMOS SI SE HA SUBIDO UN ARCHIVO Y SI ES UNA IMAGEN Y SE GUARDA EN LA CARPETA IMG/ CON UN NOMBRE QUE EMPIEZA POR AVATAR_ Y RECOGE EL ID DE USUARIO Y LA FECHA ACTUAL PARA QUE NO SE REPITA.
    if (isset($_FILES['avatar_file'])) {
        $archivo = $_FILES['avatar_file'];
        $extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
        
        $es_imagen = ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png' || $extension === 'webp');
        if ($es_imagen) {
            $nuevo_nombre_archivo = 'avatar_' . $usuario['id'] . '_' . time() . '.' . $extension;
            $destino = 'img/' . $nuevo_nombre_archivo;
            if (move_uploaded_file($archivo['tmp_name'], $destino)) {
                $ruta_avatar = $destino;
                $_SESSION['avatar'] = $ruta_avatar;
            }
        }
    }

    // AQUÍ SE ACTUALIZAN LOS DATOS EN LA BASE DE DATOS. Además actualizamos las variables de sesión para que todo esté al día.
    try {
        $sentencia_upd = $pdo->prepare("
            UPDATE usuarios 
            SET usuario = :usuario, email = :email, ciudad = :ciudad, visibilidad = :visibilidad, biografia = :biografia, preferencias_musicales = :pref, avatar = :avatar, telefono = :telefono
            WHERE id = :id
        ");
        
        $sentencia_upd->execute([
            'usuario' => $nuevo_usuario,
            'email' => $nuevo_email,
            'ciudad' => $nueva_ciudad,
            'visibilidad' => $nueva_visibilidad,
            'biografia' => $nueva_biografia,
            'pref' => $nuevas_prefs,
            'avatar' => $ruta_avatar,
            'telefono' => $nuevo_telefono,
            'id' => $usuario['id']
        ]);

        $_SESSION['usuario'] = $nuevo_usuario;
        $_SESSION['email'] = $nuevo_email;
        $_SESSION['msg_exito'] = "¡Perfil actualizado con éxito!";
        
        header("Location: dashboard_perfil.php");
        exit;
    } catch (PDOException $e) {
        $_SESSION['msg_error'] = "Error al actualizar los datos en la base de datos.";
        header("Location: dashboard_perfil.php");
        exit;
    }
}

$active_page='perfil';

include 'dashboard_header.php';
?>
        <main id="dashboard" class="dashboard-content container-fluid py-3">
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

                <form action="dashboard_perfil.php" method="POST" enctype="multipart/form-data" class="perfil-form-wrapper">
                    
                    <div class="perfil-header-container d-flex justify-content-between align-items-center mb-4">
                        <div class="perfil-header-info d-flex flex-column align-items-center mx-auto text-center">
                            <div class="perfil-avatar-preview-wrapper position-relative" title="Haz clic para cambiar tu foto de perfil">
                                <img id="avatar-img-preview" src="<?php echo $usuario['avatar']; ?>" alt="Avatar" class="perfil-header-avatar">
                                <div class="perfil-avatar-hover-overlay">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                        <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="file" id="avatar-file-input" name="avatar_file" class="perfil-avatar-file-input">
                            <h1 class="perfil-full-name mt-3"><?php echo $usuario['usuario']; ?></h1>
                        </div>
                        <button type="submit" class="btn-perfil-editar text-uppercase">Guardar</button>
                    </div>
                    <div class="row g-4 perfil-fields-row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="usuario" class="perfil-field-label">Nombre de usuario</label>
                                <input type="text" class="form-control perfil-input-field" id="usuario" name="usuario" value="<?php echo $usuario['usuario']; ?>" required>
                            </div>
                            

                            <div class="mb-3">
                                <label for="email" class="perfil-field-label">Correo Electrónico</label>
                                <input type="email" class="form-control perfil-input-field" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="perfil-field-label">Teléfono</label>
                                <input type="text" class="form-control perfil-input-field" id="telefono" name="telefono" value="<?php echo $usuario['telefono']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="ciudad" class="perfil-field-label">Ciudad</label>
                                <input type="text" class="form-control perfil-input-field" id="ciudad" name="ciudad" value="<?php echo $usuario['ciudad']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="visibilidad" class="perfil-field-label">Visibilidad de perfil</label>
                                <input type="text" class="form-control perfil-input-field" id="visibilidad" name="visibilidad" value="<?php echo $usuario['visibilidad']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="biografia" class="perfil-field-label">Descripción</label>
                                <textarea class="form-control perfil-input-field" id="biografia" name="biografia" rows="2"><?php echo $usuario['biografia']; ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="perfil-field-label">Asistencia</label>
                                <input type="text" class="form-control perfil-input-field perfil-input-readonly" value="Nivel 10" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="perfil-right-title mb-2">Preferencias musicales</h3>
                            
                            <div class="perfil-preferencias-box p-3">
                                <div class="preferencias-tags-wrapper d-flex flex-wrap gap-3">
                                    <?php 
                                    $opciones_musicales = ['Dembow', 'Reggaetón', 'R&B', 'Trap', 'Hip Hop'];
                                    foreach ($opciones_musicales as $opcion) {
                                        $marcado = strpos($usuario['preferencias_musicales'] ?? '', $opcion) !== false;
                                    ?>
                                        <div class="pref-tag-item">
                                            <input type="checkbox" id="pref_<?php echo $opcion; ?>" name="prefs[]" value="<?php echo $opcion; ?>" class="btn-check" <?php echo $marcado ? 'checked' : ''; ?>>
                                            <label class="btn btn-outline-pref-tag" for="pref_<?php echo $opcion; ?>"><?php echo $opcion; ?></label>
                                        </div>
                                    <?php 
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

            </main>
            
        </div>

<?php
include 'dashboard_footer.php';
?>
