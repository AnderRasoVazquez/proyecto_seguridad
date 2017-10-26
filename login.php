<?php
// cabecera de la pagina
include "includes/header.php";

require_once 'includes/DB/Conexion.php';

$conn = new Conexion();
$name = $_POST["name"];
$pass = $_POST["pass"];
$res = $conn->query("select * from usuario where nombre='$name' and contraseña='$pass'");

if ($res == false) {
    //caso de error
} elseif (mysqli_num_rows($res)!=0) {
    // resultado válido
    // se inicia la sesión
    session_start();
    // variables de sesión
    $_SESSION["name"] = $name;
    // redirige a la página principal
    header("Location: index.php");
    exit();
} else {
    // resultado no válido
    // devuelve a la página de login
    header("Location: formulario_login.php");
    exit();
}

$conn->close();

// cabecera de la pagina
include "includes/footer.php";
?>
