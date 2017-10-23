<form>
  <title>Signup - Snippedia</title>

  <body>
    <?php
    // cabecera de la pagina
    include "includes/header.php";
    include "navigation_bar.php";
    ?>
    <h1>Join Snippedia</h1>
    <h3>The best wiki for small developers!</h3>
    <h5>Create your account</h5>
    <form class="" action="index.html" method="post">
      <b>Name</b><br>
      <input type="text" name="name"><br>
      <b>Second Name*</b><br>
      <input type="text" name="secondname"><br>
      <b>Birth date</b><br>
      <input type="date" name="pass"><br>
      <b>Phone number*</b><br>
      <input type="number" name="phone"><br>
      <b>Email address</b><br>
      <input type="email" name="email"><br>
      <b>Password</b><br>
      <input type="password" name="pass"><br>
      <b>Repeat your password</b><br>
      <input type="password" name="pass2"><br><br>

      The fields marked with * are optional.
      <br>

      <input type='button' value='Enviar'>
      <input type='reset' value='Borrar'>
    </form>
  </body>
</form>
