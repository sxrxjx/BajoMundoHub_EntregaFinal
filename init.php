<!-- Si hay cookie activa la sesión se inicia directamente. Si no, se crea una nueva. -->

<?php
if (isset($_COOKIE['session_id_activa'])) {
    $sessionId = $_COOKIE['session_id_activa'];
    session_id($sessionId);
}

session_start();
?>
