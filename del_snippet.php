<?php
// cabecera de la pagina
include "includes/header.php";

require_once("includes/DB/Conexion.php");
$con = new Conexion();

$id = $_GET['id'];

$sql="DELETE FROM articulo WHERE id=". $id ."";

$res = $con->query($sql);

if ($res) {
    echo "Snippet deleted.";
    # code...
} else {
    echo "Snippet not deleted.";
}

// pie de pagina
$con->close();
include "includes/footer.php";
?>
