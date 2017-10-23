<?php
// cabecera de la pagina
include "includes/header.php";
?>

<form action="add_post.php" method="post" id="form_post">
    <div id="textinput">
        <legend>Título:</legend>
        <input type="text" name="title" value="">
        <legend>Autor:</legend>
        <input type="text" name="author" value="">
        <legend>Categorías:</legend>
        <input type="text" id="tag" name="tags[]" value="">
        <div id="tag_container">
        </div>
        <a href="#" onclick="add_tag()">+Add tag</a>
        <a href="#" onclick="rm_tag()">-Revome tag</a>
        <legend>Texto en Markdown:</legend>
        <textarea id="sourceTA" name="content" oninput="convert_markdown()" form="formulario_post"></textarea>
        <input type="button" name="submit" onclick="checkPost()" value="Crear snippet">
    </div>
</form>
<div id="prev_panel">
    <legend>Previsualización</legend>
    <div id="targetDiv"></div>
</div>

<?php
// pie de pagina
include "includes/footer.php";
?>
<script type="text/javascript">
function add_tag() {
    var container = document.getElementById("tag_container")
    // Create an <input> element, set its type and name attributes
    var input = document.createElement("input");
    input.type = "text";
    input.name = "categorias[]";
    container.appendChild(input);
    // Append a line break
    container.appendChild(document.createElement("br"));
}

function rm_tag() {
    var container = document.getElementById("tag_container")
    // Remove the container's last child twice:
    // First the input
    container.removeChild(container.lastChild);
    // Then the line break
    container.removeChild(container.lastChild);
}
</script>
