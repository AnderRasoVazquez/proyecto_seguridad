<title>Login - Snippedia</title>
<?php
// cabecera de la pagina
include "includes/header.php";
?>
    <h1>Log in to Snippedia</h1>
    <form action="login.php" method="post" id="loginForm">
        <legend>Nombre:</legend>
        <input class="form-control" type="text" name="name">
        <legend>Contraseña:</legend>
        <input class="form-control" type="password" name="pass">
        <!-- párrafo en blanco para añadir posible mensaje de error -->
        <p id="error"></p>
        <input type='button' onclick="checkLogin()" value='Login'>
        <input type='reset' value='Reset'>
    </form>
<?php
// cabecera de la pagina
include "includes/footer.php";
?>
