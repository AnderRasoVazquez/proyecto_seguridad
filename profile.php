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
<button class="button-profile" onclick="document.location.href='logout.php'">Log out</button>
<br>
<button class="button-profile" onclick="document.location.href='snippets_by_author.php?author=<?=$_SESSION["currentUser"]?>'">Your snippets</button>
<br>
<button class="button-profile" onclick="document.location.href='preferences.php'">Preferences</button>
<br>
<button class="button-profile" onclick="document.location.href='form_change_pass.php'">Change password</button>

<?php
// pie de pagina
include "includes/footer.php";
?>
