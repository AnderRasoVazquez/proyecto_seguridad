<?php
// cabecera de la pagina
include "includes/header.php";
$full_name;
if (isset($_SESSION["currentUser"])) {
    $full_name=$_SESSION["currentUserName"]." ".$_SESSION["currentUserSecondName"];
} else {
    $full_name="Anónimo";
}
?>

<h1>Create new Snippet</h1>
<form action="add_post.php" method="post" id="form_post">
    <div id="textinput">
        <legend>Title:</legend>
        <input class="form-control" type="text" name="title" value="" maxlength="200">
        <legend>Author:</legend>
        <input class="form-control form-control-sm" type="text" name="author" value="<?=$full_name?>" maxlength="50" disabled>
        <legend>Tags:</legend>
        <input class="form-control form-control-sm" type="text" id="tag" name="tags[]" value="" maxlength="20">
        <div id="tag_container">
        </div>
        <a class="btn btn-sm btn-dark" onclick="add_tag()"><i class="material-icons">add_circle</i></a>
        <a class="btn btn-sm btn-dark" onclick="rm_tag()"><i class="material-icons">remove_circle</i></a>
        <legend>Text in <a target="_blank" href="index.php">Markdown</a> format:</legend>
        <textarea id="sourceTA" class="form-control" name="content" oninput="convert_markdown('sourceTA', 'targetDiv')" form="form_post"></textarea>
        <legend>References:</legend>
        <input class="form-control" type="text" name="references[]" id="ref" value="" maxlength="200">
        <div id="reference_container">
        </div>
        <a class="btn btn-sm btn-dark" onclick="add_reference()"><i class="material-icons">add_circle</i></a>
        <a class="btn btn-sm btn-dark" onclick="rm_reference()"><i class="material-icons">remove_circle</i></a>
        <br>
        <br>
        <a class="btn btn-success" id="snippetSubmitButton" onclick="checkPost()"><i class="material-icons">cloud_upload</i> SUBMIT SNIPPET</a>
    </div>
</form>
<div id="prev_panel">
    <legend><i class="material-icons">remove_red_eye</i> Live Preview</legend>
    <div id="targetDiv"></div>
</div>

<?php
// pie de pagina
include "includes/footer.php";
?>
