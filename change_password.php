<?php
// cabecera de la pagina
include "includes/header.php";

require_once 'includes/DB/Conexion.php';

if (isset($_SESSION["currentUser"])) {
    $dni = $_SESSION["currentUser"];
} else {
    // si no hay sesión iniciada redirigimos a index
    header("Location: formulario_login.php");
    exit();
}

$conn = new Conexion();
$pass_old = $_POST["pass_old"];
$pass_new = $_POST["pass_new"];

$sql = "SELECT dni, hash FROM usuario";
$res = $conn->query($sql);
$row;
$hash_old;
$found = false;

while($row = $res->fetch_object()) {
    // para cada hash
    if($dni == $row->dni && password_verify($pass_old, $row->hash)) {
        $hash_old = $row->hash;
        $found = true;
        break;
    }
}

if($found) {
    // usuario encontrado
    $sql = "UPDATE usuario
            SET hash='".password_hash($pass_new, PASSWORD_DEFAULT)."'
            WHERE hash='".$hash_old."'";
    $res = $conn->query($sql);
    if($res) {
        // se han actualiado los datos
        $conn->close();
        header("Location: profile.php");
        exit();
    } else {
        // error
        $conn->close();
        header("Location: form_change_pass.php");
        exit();
    }
} else {
    // usuario no encontrado. contraseña incorrecta
    $conn->close();
    header("Location: form_change_pass.php");
    exit();
}

$conn->close();

// cabecera de la pagina
include "includes/footer.php";
?>
