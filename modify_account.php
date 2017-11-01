<?php
// cabecera de la pagina
include "includes/header.php";
include "includes/utilidades.php";

require_once 'includes/DB/Conexion.php';

$conn = new Conexion();
$dni = $_POST["dni"];
$name = $_POST["name"];
$second_name = $_POST["second_name"];
$phone = $_POST["phone"];
$email = $_POST["email"];

$sql = "UPDATE usuario
        SET nombre='".$conn->escape_string($name)."', apellidos='".$conn->escape_string($second_name)."',
        telefono='".$conn->escape_string($phone)."', email='".$conn->escape_string($email)."'
        WHERE dni='".$dni."'";
$res = $conn->query($sql);

if ($res) {
    //se han actualizado los datos
    header("Location: profile.php");
    exit();
} else {
    // error
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}

$conn->close();

// cabecera de la pagina
include "includes/footer.php";
?>
