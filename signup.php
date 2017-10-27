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

$res = $conn->query("select * from usuario where nombre='$dni'");

if (mysqli_num_rows($res)==0) {
    //se registra al usuario en la base de datos
    $sql = "INSERT INTO usuario
    VALUES ('$dni','$name','$secondname','$phone',3333-03-03,'$email','$pass')";
    if($conn->query($sql) === TRUE){
        $last_id = $conn->getLastId();
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
    //se inicia su sesión
    session_start();
    //variables de sesión
    $_SESSION["currentUser"] = $name;
    // redirige a la página de login
    //header("Location: index.php");
    exit();
} elseif (mysqli_num_rows($res)!=0) {
    // resultado no válido
    // nombre de usuario ya está en uso
    // redirige a la página de login
    header("Location: formulario_login.php");
    exit();
} else {
    // caso de error
    // devuelve a la página de login
    header("Location: formulario_login.php");
    exit();
}

$conn->close();

// cabecera de la pagina
include "includes/footer.php";
?>
