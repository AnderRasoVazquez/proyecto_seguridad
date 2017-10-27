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

if (mysqli_num_rows($res)==0) {
    //se registra al usuario en la base de datos
    $sql = "INSERT INTO usuario
    VALUES ('$dni','$name','$secondname','$phone',$birthdate,'$email','$pass')";
    if($conn->query($sql)){
        // se inicia su sesión
        session_start();
        // variables de sesión
        $_SESSION["currentUser"] = $name;
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
