<title>Signup - Snippedia</title>

<?php
// cabecera de la pagina
include "includes/header.php";
?>
<h1>Join Snippedia</h1>
<h3>The best wiki for small developers!</h3>
<h5>Create your account</h5>
<form action="signup.php" method="post" id="signupForm">
    <legend>Name</legend>
    <input class="form-control" type="text" name="name">
    <legend>Second Name*</legend>
    <input class="form-control" type="text" name="secondname">
    <legend>Birth date</legend>
    <input class="form-control" type="date" name="birthdate">
    <legend>Phone number</legend>
    <input class="form-control" type="number" name="phone">
    <legend>Email address</legend>
    <input class="form-control" type="email" name="email">
    <legend>Password</legend>
    <input class="form-control" type="password" name="pass">
    <legend>Repeat your password</legend>
    <input class="form-control" type="password" name="pass2">

    <br><i>The fields marked with * are optional.</i><br><br>

    <input type='button' class="btn btn-dark" onclick="checkSignup()" value='Join'>
    <input type='reset' class="btn btn-secondary" value='Reset'>
</form>

<?php
// cabecera de la pagina
include "includes/footer.php";
?>
