<?php
// cabecera de la pagina
include "includes/header.php";

    // se borran las variables de sesión
    $_SESSION = array();
    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
     }

    // Finally, destroy the session.
    session_destroy();
    // redirige a la página principal
    header("Location: index.php");
    exit();

// cabecera de la pagina
include "includes/footer.php";
?>
