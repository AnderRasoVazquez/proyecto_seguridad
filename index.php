<?php
// cabecera de la pagina
include "includes/header.php";

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
