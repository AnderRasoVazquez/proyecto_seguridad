<?php
// cabecera de la pagina
include "includes/header.php";
require_once "includes/utilidades.php";

$search = $_POST['search_term'];

if ($search) {
    echo "<h1>Snippets with search term \"". $search ."\" on title or on tag</h1>";
} else {
    echo "<h1>Showing all the snippets</h1>";
}

// "% Matches any number of characters, even zero characters"
// es como usar * en un regex
$sql = "SELECT DISTINCT f_ult_mod, titulo, id, autor FROM articulo
        JOIN categorias ON articulo.id = categorias.id_articulo
        WHERE categorias.categoria LIKE '%". $search ."%'
        OR articulo.titulo LIKE '%". $search ."%'
        OR articulo.autor = '$search'
        ORDER BY f_ult_mod DESC
        ";

CreateSnippetTable($sql);

// pie de pagina
include "includes/footer.php";
?>
