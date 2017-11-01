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
        <input type="text" id="login_dni" name="dni" class="form-control form-control-sm" maxlength="9">
        <legend>Password:</legend>
        <input type="password" id="login_pass" name="pass" class="form-control form-control-sm" maxlength="20">
        <!-- párrafo en blanco para añadir posible mensaje de error -->
        <p id="error"></p>
        <input type='button' id="login_submit_button" name="submit_button" value="Login" class="btn btn-dark" onclick="checkLogin()">
        <input type='reset' id="login_reset_button" name="reset_button" value="Reset" class="btn btn-secondary">
    </form>
<?php
// cabecera de la pagina
include "includes/footer.php";
?>
