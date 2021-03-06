<?php

require_once("includes/DB/Conexion.php");
$conn = new Conexion();

$title = $_POST["title"];
$tags = $_POST["tags"];
$content = $_POST["content"];
$references = $_POST["references"];
$f_ult_mod = date('Y/m/d H:i:s');

session_start();
$author;
if (isset($_SESSION["currentUser"])) {
    // si hay sesión iniciada mostramos enlace al perfil
    $author = $_SESSION["currentUser"];
}
else {
    $author= "anonimo";
}

$sql = "INSERT INTO articulo (titulo, contenido, autor, f_ult_mod)
VALUES ('".$conn->escape_string($title)."', '".$conn->escape_string($content)."',
'".$conn->escape_string($author)."', '".$conn->escape_string($f_ult_mod)."')";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->getLastId();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}

foreach ($tags as $tag) {
    $sql = "INSERT INTO categorias (id_articulo, categoria)
    VALUES ('". $conn->escape_string($last_id) ."', '". $conn->escape_string($tag) ."')";
    if (! $conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
}

// si no hay ninguna referencia simplemente no entra
foreach ($references as $reference) {
    $sql = "INSERT INTO referencias (id_articulo, referencia)
    VALUES ('". $conn->escape_string($last_id) ."', '". $conn->escape_string($reference) ."')";
    if (! $conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
}

$conn->close();

header("Location: show_snippet.php?id=". $last_id); /* Redirect browser */
exit();

?>
