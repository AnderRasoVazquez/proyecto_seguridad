<?php

require_once("includes/DB/Conexion.php");
$conn = new Conexion();

$title = $_POST["title"];
$author = $_POST["author"];
$tags = $_POST["tags"];
$content = $_POST["content"];
$references = $_POST["references"];

$f_ult_mod = date('Y/m/d H:i:s');

$sql = "INSERT INTO articulo (titulo, contenido, autor, f_ult_mod)
VALUES ('". $title ."', '". $content ."', '". $author ."', '". $f_ult_mod ."')";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->getLastId();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}

foreach ($tags as $tag) {
    $sql = "INSERT INTO categorias (id_articulo, categoria)
    VALUES ('". $last_id ."', '". $tag ."')";
    if (! $conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
}

// si no hay ninguna referencia simplemente no entra
foreach ($references as $reference) {
    $sql = "INSERT INTO referencias (id_articulo, referencia)
    VALUES ('". $last_id ."', '". $reference ."')";
    if (! $conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
}

echo "Snippet successfully created =)";

$conn->close();

?>
