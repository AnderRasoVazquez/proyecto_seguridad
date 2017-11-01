<?php
// cabecera de la pagina
include "includes/header.php";
if (isset($_SESSION["currentUser"])) {
    // si ya hay una sessión iniciada
    // la pagina de login redirige inmediatamente a index.php
    header("Location: profile.php");
}
?>
    <h1>Login to Snippedia</h1>
    <form action="login.php" method="post" id="login_form">
        <legend>DNI:</legend>
        <input name="dni" id="login_dni" type="text" maxlength="9" class="form-control form-control-sm">
        <legend>Password:</legend>
        <input name="pass" id="login_pass" type="password" maxlength="20" class="form-control form-control-sm">
        <!-- párrafo en blanco para añadir posible mensaje de error -->
        <p id="error"></p>
        <input name="submit_button" id="login_submit_button" type='button' value="Login" class="btn btn-dark" onclick="checkLogin()">
        <input name="reset_button" id="login_reset_button" type='reset' value="Reset" class="btn btn-secondary">
    </form>
<?php
// cabecera de la pagina
include "includes/footer.php";
?>
