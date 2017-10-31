
<?php

require_once("includes/DB/Conexion.php");
$conn = new Conexion();

$id = $_POST["id"];
$title = $_POST["title"];
$author = $_POST["author"];
$tags = $_POST["tags"];
$content = $_POST["content"];
$references = $_POST["references"];

$f_ult_mod = date('Y/m/d H:i:s');

$sql="DELETE FROM categorias WHERE id_articulo=". $id ."";
if (! $conn->query($sql)) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}
$sql="DELETE FROM referencias WHERE id_articulo=". $id ."";
if (! $conn->query($sql)) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}

$sql = "UPDATE articulo SET
titulo='". $conn->escape_string($title) ."',
contenido='". $conn->escape_string($content) ."',
autor='". $conn->escape_string($author) ."',
f_ult_mod='". $conn->escape_string($f_ult_mod) ."'
WHERE id='". $id ."'";
if (! $conn->query($sql)) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}

foreach ($tags as $tag) {
    $sql = "INSERT INTO categorias (id_articulo, categoria)
    VALUES ('". $conn->escape_string($id) ."', '". $conn->escape_string($tag) ."')";
    if (! $conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
}

// si no hay ninguna referencia simplemente no entra
foreach ($references as $reference) {
    $sql = "INSERT INTO referencias (id_articulo, referencia)
    VALUES ('". $conn->escape_string($id) ."', '". $conn->escape_string($reference) ."')";
    if (! $conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
}

$conn->close();

header("Location: show_snippet.php?id=". $id); /* Redirect browser */
exit();

?>
