<?php
// cabecera de la pagina
include "includes/header.php";

require_once 'includes/DB/Conexion.php';

$conn = new Conexion();
$dni = $_POST["dni"];
$pass = $_POST["pass"];
$res = $conn->query("SELECT * FROM usuario WHERE dni='$dni' AND contraseña='$pass'");

if ($res == false) {
    //caso de error
    exit();
} elseif (mysqli_num_rows($res)!=0) {
    // resultado válido
    // se inicia la sesión
    session_start();
    // variables de sesión
    $_SESSION["currentUser"] = $name;
    // redirige a la página principal
    header("Location: index.php");
    exit();
} else {
    // resultado no válido
    // devuelve a la página de login
    header("Location: formulario_login.php");
    showLoginError();
    exit();
}

$conn->close();

// cabecera de la pagina
include "includes/footer.php";
?>
