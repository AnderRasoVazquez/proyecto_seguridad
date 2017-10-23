<title>Login - Snippedia</title>
<?php
// cabecera de la pagina
include "includes/header.php";
include "navigation_bar.php";
?>
    <h1>Log in to <a href="index.php">Snippedia</a></h1>
    <form action="index.html" method="post" id="login_post">
        <b>Nombre:</b><br>
        <input type="text" name="name"><br>
        <b>Contraseña:</b><br>
        <input type="text" name="pass"><br>
        <!-- párrafo en blanco para añadir posible mensaje de error -->
        <p id="error"></p>
        <input type='button' onclick="checkLogin()" value='Enviar'>
        <input type='reset' value='Borrar'>
    </form>
<?php
// cabecera de la pagina
include "includes/footer.php";
?>
