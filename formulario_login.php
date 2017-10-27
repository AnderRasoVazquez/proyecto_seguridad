<?php
// cabecera de la pagina
include "includes/header.php";
if (isset($_SESSION["currentUser"])) {
    // si ya hay una sessión iniciada
    // la pagina de login redirige inmediatamente a index.php
    header("Location: index.php");
}
?>
    <h1>Log in to Snippedia</h1>
    <form action="login.php" method="post" id="loginForm">
        <legend>Nombre:</legend>
        <input class="form-control form-control-sm" type="text" name="name">
        <legend>Contraseña:</legend>
        <input class="form-control form-control-sm" type="password" name="pass">
        <!-- párrafo en blanco para añadir posible mensaje de error -->
        <p id="error"></p>
        <input type='button' class="btn btn-dark" onclick="checkLogin()" value='Login'>
        <input type='reset' class="btn btn-secondary" value='Reset'>
    </form>
<?php
// cabecera de la pagina
include "includes/footer.php";
?>
