<title>Signup - Snippedia</title>

<?php
// cabecera de la pagina
include "includes/header.php";
?>
<h1>Join Snippedia</h1>
<h3>The best wiki for small developers!</h3>
<h5>Create your account</h5>
<form class="" action="index.html" method="post">
    <legend>Name</legend>
    <input class="form-control" type="text" name="name">
    <legend>Second Name*</legend>
    <input class="form-control" type="text" name="secondname">
    <legend>Birth date</legend>
    <input class="form-control" type="date" name="pass">
    <legend>Phone numlegender*</legend>
    <input class="form-control" type="number" name="phone">
    <legend>Email address</legend>
    <input class="form-control" type="email" name="email">
    <legend>Password</legend>
    <input class="form-control" type="password" name="pass">
    <legend>Repeat your password</legend>
    <input class="form-control" type="password" name="pass2">

    The fields marked with * are optional.
    <br>

    <input type='button' value='Enviar'>
    <input type='reset' value='Borrar'>
</form>
