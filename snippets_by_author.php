<?php
// cabecera de la pagina
include "includes/header.php";
require_once "includes/utilidades.php";

$author = $_GET['author'];
?>
<h1>Snippets by: <?=getFullNameOf($author)?></h1>

<?php
$sql = "SELECT DISTINCT f_ult_mod, titulo, id, autor FROM articulo
        WHERE autor = '". $author ."'";

CreateSnippetTable($sql);

// pie de pagina
include "includes/footer.php";
?>
