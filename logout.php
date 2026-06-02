<!-- CERRAMOS LA SESIÓN DE LAS VARIABLES D ESESIÓN QUE HEMOS UTILIZADO. SI HAY COOKIE, LA ELIMINAMOS Y DESTRUIMOS LA SESIÓN PARA SALIR AL LOGIN. -->

<?php
require_once 'init.php';

unset($_SESSION['usuario']);
unset($_SESSION['rol']);
unset($_SESSION['email']);

if (isset($_COOKIE['session_id_activa'])) {
    setcookie('session_id_activa', '', time() - 3600, '/');
}

session_destroy();

header("Location: login.php");
?>
