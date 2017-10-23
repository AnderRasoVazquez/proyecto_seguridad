<?php
// cabecera de la pagina
include "includes/header.php";
?>

<form action="add_post.php" method="post" id="form_post">
    <div id="textinput">
        <legend>Título:</legend>
        <input class="form-control" type="text" name="title" value="">
        <legend>Autor:</legend>
        <input class="form-control" type="text" name="author" value="">
        <legend>Categorías:</legend>
        <input class="form-control" type="text" id="tag" name="tags[]" value="">
        <div id="tag_container">
        </div>
        <a href="#" onclick="add_tag()">+Add tag</a>
        <legend>Texto en Markdown:</legend>
        <textarea id="sourceTA" class="form-control" name="content" oninput="convert_markdown()" form="formulario_post"></textarea>
        <input type="button" class="btn btn-success" name="submit" onclick="checkPost()" value="+Add Snippet">
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
    input.className += " form-control";
    container.appendChild(input);
    // Append a line break
}
</script>
