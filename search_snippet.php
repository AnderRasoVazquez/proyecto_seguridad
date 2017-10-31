<?php
// cabecera de la pagina
include "includes/header.php";
require_once "includes/utilidades.php";

$search = $_GET['search_term'];

if ($search) {
    echo "<h1>Snippets with search term \"". $search ."\" on title or on tag</h1>";
} else {
    echo "<h1>Showing all the snippets</h1>";
}

// "% Matches any number of characters, even zero characters"
// es como usar * en un regex
$sql = "SELECT DISTINCT f_ult_mod, titulo, id, autor FROM articulo
        JOIN categorias ON articulo.id = categorias.id_articulo
        JOIN usuario ON articulo.autor = usuario.dni
        WHERE categorias.categoria LIKE '%". $search ."%'
        OR articulo.titulo LIKE '%". $search ."%'
        OR usuario.nombre = '$search'
        OR usuario.apellidos = '$search'
        OR CONCAT(usuario.nombre, ' ', usuario.apellidos) = '$search'
        ORDER BY f_ult_mod DESC
        ";

CreateSnippetTable($sql);

// pie de pagina
include "includes/footer.php";
?>
