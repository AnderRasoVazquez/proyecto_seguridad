<?php
// cabecera de la pagina
include "includes/header.php";
?>

<h1>Create new Snippet</h1>
<form action="add_post.php" method="post" id="form_post">
    <div id="textinput">
        <legend>Title:</legend>
        <input class="form-control" type="text" name="title" value="">
        <legend>Author:</legend>
        <input class="form-control" type="text" name="author" value="">
        <legend>Tags:</legend>
        <input class="form-control" type="text" id="tag" name="tags[]" value="">
        <div id="tag_container">
        </div>
        <input type="button" class="btn btn-sm btn-dark" onclick="add_tag()" value="+ Tag">
        <input type="button" class="btn btn-sm btn-dark" onclick="rm_tag()" value="- Tag">
        <legend>Text in Markdown format:</legend>
        <textarea id="sourceTA" class="form-control" name="content" oninput="convert_markdown()" form="formulario_post"></textarea>
        <legend>References:</legend>
        <input class="form-control" type="text" id="reference" name="references[]" value="">
        <div id="reference_container">
        </div>
        <input type="button" class="btn btn-sm btn-dark" onclick="add_reference()" value="+ Reference">
        <input type="button" class="btn btn-sm btn-dark" onclick="rm_reference()" value="- Reference">
        <br>
        <br>
        <input type="button" class="btn btn-success" name="submit" onclick="checkPost()" value="+Add Snippet">
    </div>
</form>
<div id="prev_panel">
    <legend>Live Preview</legend>
    <div id="targetDiv"></div>
</div>

<?php
// pie de pagina
include "includes/footer.php";
?>
