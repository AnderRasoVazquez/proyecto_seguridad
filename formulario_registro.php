<title>Signup - Snippedia</title>

<?php
// cabecera de la pagina
include "includes/header.php";
?>
<h1>Join Snippedia</h1>
<h3>The best wiki for small developers!</h3>
<h5>Create your account</h5>
<form action="signup.php" method="post" id="signupForm">
    <legend>DNI</legend>
    <input class="form-control form-control-sm" type="text" name="dni" maxlength="9">
    <legend>Name</legend>
    <input class="form-control form-control-sm" type="text" name="name" maxlength="30">
    <legend>Second Name*</legend>
    <input class="form-control form-control-sm" type="text" name="secondname" maxlength="30">
    <legend>Birth date</legend>
    <input class="form-control form-control-sm" type="date" name="birthdate">
    <legend>Phone number*</legend>
    <input class="form-control form-control-sm" type="number" name="phone" maxlength="9">
    <legend>Email address</legend>
    <input class="form-control form-control-sm" type="email" name="email" maxlength="30">
    <legend>Password</legend>
    <input class="form-control form-control-sm" type="password" name="pass" maxlength="20">
    <legend>Repeat your password</legend>
    <input class="form-control form-control-sm" type="password" name="pass2" maxlength="20">

    <br><i>The fields marked with * are optional.</i><br><br>

    <input type='button' class="btn btn-dark" onclick="checkSignup()" value='Join'>
    <input type='reset' class="btn btn-secondary" value='Reset'>
</form>

<?php
// cabecera de la pagina
include "includes/footer.php";
?>
