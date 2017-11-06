<?php
// cabecera de la pagina
include "includes/header.php";

if (!isset($_SESSION["currentUser"])) {
    // si no hay sesión iniciada redirigimos a index
    header("Location: formulario_login.php");
    exit();
}
?>

<h1>Change Password</h1>

<form action="change_password.php" method="post" id="form_change_pass">
    <legend>Current password:</legend>
    <input type="password" id="pass_old" name="pass_old" class="form-control form-control-sm" maxlength="20">
    <legend>New password:</legend>
    <input type="password" id="pass_new" name="pass_new" class="form-control form-control-sm" maxlength="20">
    <legend>Repeat password:</legend>
    <input type="password" id="pass_new2" name="pass_new2" class="form-control form-control-sm" maxlength="20">
    <p></p>
    <input type='button' value='Back' class="btn btn-dark" onclick="discardAndLeave()">
    <input type='button' value='Save changes' class="btn btn-dark" onclick="checkChangePass()">
    <input type='reset' value='Discard changes'class="btn btn-secondary">
</form>


<?php
// pie de pagina
include "includes/footer.php";
?>
