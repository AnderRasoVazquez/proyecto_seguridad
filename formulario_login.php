<title>Login - Snippedia</title>
<?php
// cabecera de la pagina
include "includes/header.php";
?>
    <h1>Log in to <a href="index.php">Snippedia</a></h1>
    <form action="index.html" method="post" id="login_post">
        <legend>Nombre:</legend>
        <input class="form-control" type="text" name="name">
        <legend>Contraseña:</legend>
        <input class="form-control" type="text" name="pass">
        <!-- párrafo en blanco para añadir posible mensaje de error -->
        <p id="error"></p>
        <input type='button' onclick="checkLogin()" value='Enviar'>
        <input type='reset' value='Borrar'>
    </form>
<?php
// cabecera de la pagina
include "includes/footer.php";
?>
