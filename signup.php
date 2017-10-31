<?php
// cabecera de la pagina
include "includes/header.php";
include "includes/utilidades.php";

require_once 'includes/DB/Conexion.php';

$conn = new Conexion();
$dni = $_POST["dni"];
$name = $_POST["name"];
$secondname = $_POST["secondname"];
$phone = $_POST["phone"];
$birthdate = $_POST["birthdate"];
$email = $_POST["email"];
$pass = $_POST["pass"];

$res = $conn->query("SELECT * FROM usuario WHERE dni='".$conn->escape_string($dni)."'");

if (mysqli_num_rows($res)==0) {
    //se registra al usuario en la base de datos
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario
    VALUES ('".$conn->escape_string($dni)."','".$conn->escape_string($name)."',
    '".$conn->escape_string($secondname)."','".$conn->escape_string($phone)."',
    '".$conn->escape_string($birthdate)."','".$conn->escape_string($email)."',
    '".$conn->escape_string($hash)."')";
    if($conn->query($sql)){
        // se inicia su sesión
        createSession($dni, $name);
        // redirige a la página de login
        header("Location: index.php");
        exit();
    }else{
        // error de sql...
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
    exit();
}else if(mysqli_num_rows($res)!=0){
    // resultado no válido
    // nombre de usuario ya está en uso
    // redirige a la página de login
    header("Location: formulario_login.php");
    // rellenar datos validos de nuevo en el formulario

    exit();
} else {
    // error de sql...
    echo("Error de sql. Recargue la página.");
}

$conn->close();

// cabecera de la pagina
include "includes/footer.php";
?>
