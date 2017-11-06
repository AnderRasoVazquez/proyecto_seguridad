<?php
// cabecera de la pagina
include "includes/header.php";
include "includes/utilidades.php";

if (!isset($_SESSION["currentUser"])) {
    // si no hay sesión iniciada redirigimos a index
    header("Location: formulario_login.php");
    exit();
}
$full_name = getFullNameOf($_SESSION["currentUser"]);
?>

<h1>Welcome <?=$full_name?></h1>
<input type="button" class="btn" value="Log out" onclick="document.location.href='logout.php'"><br>
<input type="button" class="btn" value="Your snippets" onclick="document.location.href='snippets_by_author.php?author=<?=$_SESSION["currentUser"]?>'"><br>
<input type="button" class="btn" value="Preferences" onclick="document.location.href='preferences.php'"><br>
<input type="button" class="btn" value="Change password" onclick="document.location.href='form_change_pass.php'"><br>

<?php
// pie de pagina
include "includes/footer.php";
?>
