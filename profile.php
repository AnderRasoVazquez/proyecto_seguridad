<?php
// cabecera de la pagina
include "includes/header.php";

if (!isset($_SESSION["currentUser"])) {
    // si no hay sesión iniciada redirigimos a index
    header("Location: index.php");
    exit();
}
?>

<input type="button" class="btn" value="Log out" onclick="document.location.href='logout.php'">

<?php
// cabecera de la pagina
include "includes/footer.php";
?>
