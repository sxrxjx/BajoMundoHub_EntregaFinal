<?php
require_once 'init.php';
require_once 'db.php';

$error = "";



// COMPROBAMOS SI HAY ALGÚN POST, GUARDAMOS LOS VALORES DE LOS INPUTS Y COMPROBAMOS QUE EL EMAIL ESTÁ EN NUESTRA BASE DE DATOS. SI ESTÁ, NOS GUARDAMOS LOS DATOS QUE NOS DEVUELVE LA TABLA PARA COMPROBAR QUE LA CLAVE COINCIDE CON LA INTRODUCIDA POR EL USUARIO. SI COINCIDE, GUARDAMOS EN VARIABLES DE SESIÓN LOS DATOS QUE VAMOS A NECESITAR (EMAIL, ROL, NOMBRE Y AVATAR) Y COMPROBAMOS SI SE HA MARCADO LA CASILLA DE LA COOKIE. FINALIZADO EL PROCESO NOS DIRIGE A DASHBOARD.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($email) || empty($password)) {
        $error = "Por favor, introduce tu email y contraseña.";
    } else {
        try {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->execute(['email' => $email]);


            if($stmt->rowcount() > 0){
                $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                $hash = $fila['clave'];
                $rol = $fila['rol'];
                $usuario = $fila['usuario'];

                if(password_verify($password,$hash)){

                $_SESSION['email'] = $email;
                $_SESSION['rol'] = $rol;
                $_SESSION['usuario'] = $usuario;
                $_SESSION['avatar'] = $fila['avatar'];

                
                if (isset($_POST['remember'])) {
                    setcookie('session_id_activa', session_id(), time() + (30 * 24 * 60 * 60), '/');
                }

                header("Location: dashboard.php");
            } else {
                $error = "Credenciales incorrectas. Inténtalo de nuevo.";
            }
        }
        } catch (PDOException $e) {
            $error = "Error al conectar con la tabla de usuarios: " . $e->getMessage() . ". Asegúrate de importar la base de datos local.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In - Bajo Mundo Hub</title>
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
                        <h2 class="text-uppercase">Log in</h2>
                        <h4 class="text-uppercase">¡Hola! Soy...</h4>
                        
                        <!-- MOSTRAMOS EL ERROR SI ESTÁ LLENO AL USUARIO. DATOS INCORRECTOS O ERROR EN LA CONEXION CON LA BASE DE DATOS. -->
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="loginEmail" placeholder="Email" required>
                            </div>
                            <div class="mb-4">
                                <label for="loginPassword" class="form-label">Contraseña</label>
                                <input type="password" name="password" class="form-control" id="loginPassword"
                                    placeholder="................" required>
                            </div>
                            <div class="mb-4 form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
                                <label class="form-check-label text-white" for="rememberMe">Recuérdame</label>
                            </div>
                            <button type="submit" class="btn-login">LOG IN</button>
                            <a href="#" class="forgot-password">He olvidado mi contraseña</a>
                            <div class="register-prompt text-center mt-4">
                                <span class="d-block mb-2">¿Aún no tienes cuenta?</span>
                                <a href="registro.php" class="btn-register">REGÍSTRATE</a>
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