<?php
// cabecera de la pagina
include "includes/header.php";
?>

<form action="add_post.php" method="post" id="formulario_post">
    <div id="textinput">
    <legend>Título:</legend>
    <input type="text" name="titulo" value="">
    <legend>Autor:</legend>
    <input type="text" name="autor" value="">
    <legend>Categorías:</legend>
    <input type="text" name="categorias[]" value="">
    <div id="tag_container">
    </div>
    <a href="#" onclick="add_tag()">+Add tag</a>
        <!-- <h3>Texto en Markdown</h3> -->
        <legend>Texto en Markdown:</legend>
        <textarea id="sourceTA" oninput="run()" form="formulario_post"></textarea>
    <input type="button" name="submit" value="Crear snippet">
    </div>
    <div id="prev_panel">
        <legend>Previsualización</legend>
        <div id="targetDiv"></div>
    </div>
</form>

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
    </script>
