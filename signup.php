<?php
// cabecera de la pagina
include "includes/header.php";

require_once 'includes/DB/Conexion.php';

$conn = new Conexion();
$dni = $_POST["dni"];
$name = $_POST["name"];
$secondname = $_POST["secondname"];
$phone = $_POST["phone"];
$birthdate = $_POST["birthdate"];
$email = $_POST["email"];
$pass = $_POST["pass"];

$res = $conn->query("SELECT * FROM usuario WHERE nombre='$dni'");


if ($res == false) {
    // caso de error
    exit();
} elseif (mysqli_num_rows($res)==0) {
    // se registra al usuario en la base de datos
<<<<<<< HEAD
    $sql = "INSERT INTO usuario
    VALUES('$dni','$name','$secondname','$phone','$birthdate','$email','$pass')";
=======
    // $sql = "INSERT INTO 'usuario'
    // VALUES('$dni','$name','$secondname','$phone','$birthdate','$email','$pass')";
    $sql = "INSERT INTO usuario (dni, nombre)
    VALUES('$dni','$name')";
>>>>>>> c73953a71ca640e1212429dd9f83f277b3fbfb0d
    $res = $conn->query($sql);
    if ($res) {
        // se inicia su sesión
        session_start();
        // variables de sesión
        $_SESSION["currentUser"] = $name;
        // redirige a la página de login
        header("Location: index.php");
        exit();
    } else {
        // erro al insertar datos
        exit();
    }
} else {
    // resultado no válido
    // nombre de usuario ya está en uso
    // redirige a la página de login
    header("Location: formulario_login.php");
    exit();
}

$conn->close();

// cabecera de la pagina
include "includes/footer.php";
?>
