<title>
  Snippedia
</title>
<body>

  <?php
  // cabecera de la pagina
  include "includes/header.php";
  ?>

  <h1>
    Welcome to Snippedia
  </h1>
  <p>
    Snippedia is a free Enciclopedia where you can upload, search and edit
    hundreds of code Snippets.
  </p>
  <h3>
    Where to start?
  </h3>
    <a href="formulario_login.php">Click here if you want to login.</a>
    <br>
    <a href="formulario_registro.php">Don't have an account yet?.</a>
    <br>
    <a href="formulario_post.php"> Submit a new post!</a>

  <br>
  <br>
  <br>

  <?php
  //Zona de pruebas
  require_once 'includes/DB/Conexion.php';

  $con = new Conexion();

  $res = $con->query('select * from usuario');

  echo "<p>Contenido de index.php: </p>";
  echo "<p>Probando a listar usuarios<p>";
  while ($row = $res->fetch_object()) {
      echo $row->dni . " " . $row->nombre . " " . $row->apellidos . "<br>";
  }

  // pie de pagina
  include "includes/footer.php";
  ?>

</body>
