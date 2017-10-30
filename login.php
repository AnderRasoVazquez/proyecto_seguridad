<?php
// cabecera de la pagina
include "includes/header.php";

require_once 'includes/DB/Conexion.php';

$conn = new Conexion();
$dni = $_POST["dni"];
$pass = $_POST["pass"];
$res = $conn->query("SELECT * FROM usuario WHERE dni='$dni'");

if (mysqli_num_rows($res)!=0) {
    // usuario encontrado
    if (password_verify($pass, $res->fetch_object()->hash)) {
        // contraseña verificada
        // se inicia la sesión
        session_start();
        // variables de sesión
        $_SESSION["currentUser"] = $dni;
        $_SESSION["currentUserName"] = $res->fetch_object()->nombre;
        // redirige a la página principal
        $conn->close();
        header("Location: index.php");
        exit();
    }
}
// resultado no válido
// devuelve a la página de login
$conn->close();
header("Location: formulario_login.php");
exit();


// cabecera de la pagina
include "includes/footer.php";
?>
