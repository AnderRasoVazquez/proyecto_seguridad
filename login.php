<?php
// cabecera de la pagina
include "includes/header.php";

require_once 'includes/DB/Conexion.php';

$conn = new Conexion();
$dni = $_POST["dni"];
$pass = $_POST["pass"];
$sql = "SELECT * FROM usuario WHERE dni='".$conn->escape_string($dni)."'";
$res = $conn->query($sql);


if (!$res) {
        echo "Error: " . "foo" . "<br>" . $conn->error;
        exit();
} else if (mysqli_num_rows($res)!=0) {
    $row = $res->fetch_object();
    // usuario encontrado
    if (password_verify($pass, $row->hash)) {
        // contraseña verificada
        // se inicia la sesión
        session_start();
        // variables de sesión
        $_SESSION["currentUser"] = $dni;
        $_SESSION["currentUserName"] = $row->nombre;
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
