<?php
// cabecera de la pagina
include "includes/header.php";
require_once "includes/utilidades.php";

$tag = $_GET['tag'];
?>

<h1>Snippets with tag: <?=$tag?></h1>

<?php
$sql = "SELECT DISTINCT f_ult_mod, titulo, id FROM articulo
        JOIN categorias ON articulo.id = categorias.id_articulo
        WHERE categorias.categoria = '". $tag ."'";

CreateSnippetTable($sql);

// pie de pagina
include "includes/footer.php";
?>
