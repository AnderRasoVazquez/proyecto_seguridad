<?php
// cabecera de la pagina
include "includes/header.php";

if (!isset($_SESSION["currentUser"])) {
    // si no hay sesión iniciada redirigimos a index
    header("Location: formulario_login.php");
    exit();
}

require_once "includes/DB/Conexion.php";

$conn = new Conexion();
$sql = "SELECT nombre, apellidos, telefono, email FROM usuario
        WHERE dni='".$_SESSION['currentUser']."'";
$res = $conn->query($sql);
$name;
$second_name;
$phone;
$email;

if(!$res) {
    //error
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
} else if (mysqli_num_rows($res)!=0) {
    // usuario encontrado
    $row = $res->fetch_object();
    $name = $row->nombre;
    $second_name = $row->apellidos;
    $phone = $row->telefono;
    $email = $row->email;
}

?>

<h1>My account - Preferences</h1>

<form action="index.html" method="post" id="preferences_form">
    <legend>DNI:</legend>
    <input type="text" id="pref_dni" name="dni" class="form-control form-control-sm" maxlength="9" value="<?=$_SESSION["currentUser"]?>" disabled>
    <legend>Name:</legend>
    <input type="text" id="pref_name" name="name" class="form-control form-control-sm" maxlength="30" value="<?=$name?>">
    <legend>Second name*:</legend>
    <input type="text" id="pref_second_name" name="second_name" class="form-control form-control-sm" maxlength="30" value="<?=$second_name?>">
    <legend>Phone number*:</legend>
    <input type="numer" id="pref_phone" name="phone" class="form-control form-control-sm" maxlength="9" value="<?=$phone?>">
    <legend>Email adress:</legend>
    <input type="text" id="pref_email" name="email" class="form-control form-control-sm" maxlength="30" value="<?=$email?>">

    <br><i>The fields marked with * are optional.</i><br><br>

    <input type='button' value='Back' class="btn btn-dark" onclick="discardAndLeave()">
    <input type='button' value='Save changes' class="btn btn-dark" onclick="">
    <input type='reset' value='Discard changes'class="btn btn-secondary">

    <script type="text/javascript">
        function discardAndLeave() {
            if (window.confirm("Changes will NOT be saved. Are you sure you want to go back?") == true) {
                document.location.href='profile.php';
            }
        }
    </script>
</form>


<?php
// pie de pagina
include "includes/footer.php";
?>
