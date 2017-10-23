<title>Login - Snippedia</title>
<?php
// cabecera de la pagina
include "includes/header.php";
?>
    <h1>Log in to Snippedia</h1>
    <h3>The best wiki for small developers!</h3>
    <form action="index.html" method="post">
        <b>Nombre:</b><br>
        <input type="text" name="name"><br>
        <b>Contraseña:</b><br>
        <input type="text" name="pass"><br><br>
        <input type='button' value='Enviar'>
        <input type='reset' value='Borrar'>
    </form>
<?php
// cabecera de la pagina
include "includes/footer.php";
?>
