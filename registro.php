<?php
require_once 'init.php';
require_once 'db.php';

$error = "";


// COMPROBACIÓN DE DATOS DE USUARIO. Comprobamos si hay algún POST. Comprobamos también que ningún dato está vacío. Comprobamos si el correo electrónico ya se ha registrado anteriormente y si no finalmente insertamos los datos en la tabla usuarios.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rol = strtolower($_POST['rol'] ?? 'artista');
    $usuario = $_POST['usuario'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['clave'] ?? '';

    if (empty($usuario) || empty($email) || empty($password)) {
        $error = "Todos los campos son obligatorios.";
    } else {
        try {

            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
            $stmt->execute(['email' => $email]);
            if ($stmt->fetch()) {
                $error = "El correo electrónico ya está registrado.";
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, email, clave, rol) VALUES (:usuario, :email, :clave, :rol)");
                $stmt->execute([
                    'usuario' => $usuario,
                    'email' => $email,
                    'clave' => $hash,
                    'rol' => $rol
                ]);

                header("Location: login.php");
            }
        } catch (PDOException $e) {
            $error = "Error al conectar con la base de datos: " . $e->getMessage() . ". Asegúrate de importar la base de datos local.";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - Bajo Mundo Hub</title>
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

    <main id="login-page">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-6 left-col mb-5 mb-md-0">
                    <h2 class="main-title">Únete a nosotros</h2>
                    <h4 class="sub-title">Conecta con el flow del Bajo Mundo</h4>

                    <div class="info-text">
                        <h5>¿Conoces nuestras ventajas?</h5>
                        <p>Al registrarte, accedes a una comunidad que vibra al ritmo de la música urbana. Disfruta de
                            descuentos e invitaciones exclusivas, sube de nivel y desbloquea oportunidades dentro del
                            movimiento, y conecta con artistas, DJs y gente de la escena para hacer networking real.</p>
                    </div>

                </div>


                <div class="col-md-5 offset-md-1">
                    <div class="login-panel">
                        <h2>REGISTRO</h2>
                        <h4>CREA TU CUENTA</h4>

                        <!-- MOSTRAMOS EL MENSAJE DE ERROR EN EL CASO DE QUE SEA DISTINTO A VACÍO (CAMPO SIN RELLENAR, CORREO EN USO O ERROR DE CONEXIÓN CON BASE DE DATOS) -->
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <!-- FORMULARIO DE REGISTRO. EJERCUTAMOS EL REGISTRO.PHP PARA QUE SE PONGAN EN MARCHA LAS COMPROBACIONES Y PETICIONES A LA BASE DE DATOS. -->
                        <form action="registro.php" method="POST">
                            <div class="mb-3">
                                <label for="registerRole" class="form-label">TIPO DE USUARIO</label>
                                <select class="form-select form-control" id="registerRole" name="rol" aria-label="Tipo de usuario">
                                    <option value="artista" selected>ARTISTA</option>
                                    <option value="usuario">USUARIO</option>
                                    <option value="promotor">PROMOTOR</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="registerName" class="form-label">Nombre de usuario</label>
                                <input type="text" name="usuario" class="form-control" id="registerName" placeholder="Nombre o alias" required>
                            </div>
                            <div class="mb-3">
                                <label for="registerEmail" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="registerEmail" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="registerPassword" class="form-label">Contraseña</label>
                                <input type="password" name="clave" class="form-control" id="registerPassword"
                                    placeholder="................" required>
                            </div>
                            <button type="submit" class="btn-login">REGÍSTRATE</button>
                            <div class="register-prompt text-center mt-4">
                                <span class="d-block mb-2">¿Ya tienes cuenta?</span>
                                <a href="login.php" class="btn-register">LOG IN</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

 <?php
include 'dashboard_footer.php';
?>
