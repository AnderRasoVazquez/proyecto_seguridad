<?php
// cabecera de la pagina
include "includes/header.php";
require_once("includes/DB/Conexion.php");
$con = new Conexion();

$id = $_GET['id'];

$sql="SELECT * FROM articulo WHERE id=". $id ."";
$res = $con->query($sql);
$row = $res->fetch_object();

$sql="SELECT * FROM categorias WHERE id_articulo=". $id ."";
$resTag = $con->query($sql);
$rowTag = $resTag->fetch_object();

$sql="SELECT * FROM referencias WHERE id_articulo=". $id ."";
$resReferencia = $con->query($sql);
$rowReferencia = $resReferencia->fetch_object();


// TODO
// Para ir añadiendo los tags, una opción sería añadir el primero
// y después en javascript hacer click en el botón y coger el last child,
// añadir el tag ahí

?>

<h1>Modify Snippet</h1>
<form action="mod_snippet.php" method="post" id="form_post">
    <input type="hidden" value="<?=$id?>" name="id" />
    <div id="textinput">
        <legend>Title:</legend>
        <input class="form-control" type="text" name="title" value="<?=$row->titulo?>" maxlength="200">
        <legend>Author:</legend>
        <input class="form-control form-control-sm" type="text" name="author" value="<?=$row->autor?>" disabled maxlength="50">
        <legend>Tags:</legend>
        <input class="form-control form-control-sm" type="text" id="tag" name="tags[]" value="<?=$rowTag->categoria?>" maxlength="20">
        <div id="tag_container">
        </div>
        <a id="btnAddTag" class="btn btn-sm btn-dark" onclick="add_tag()"><i class="material-icons">add_circle</i></a>
        <a class="btn btn-sm btn-dark" onclick="rm_tag()"><i class="material-icons">remove_circle</i></a>
        <legend>Text in <a target="_blank" href="index.php">Markdown</a> format:</legend>
        <textarea id="sourceTA" class="form-control" name="content" oninput="convert_markdown('sourceTA', 'targetDiv')" form="form_post"><?=$row->contenido?></textarea>
        <legend>References:</legend>
        <input class="form-control" type="text" name="references[]" value="<?=$rowReferencia->referencia?>" maxlength="200">
        <div id="reference_container">
        </div>
        <a id="btnAddRef" class="btn btn-sm btn-dark" onclick="add_reference()"><i class="material-icons">add_circle</i></a>
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
<?php
    echo "<script type='text/javascript'>
        convert_markdown('sourceTA', 'targetDiv')
    ";
    while ($rowTag = $resTag->fetch_object()) {
        echo "
        document.getElementById('btnAddTag').click();
        document.getElementById('tag_container').lastChild.value='". $rowTag->categoria ."';
        ";
    }
    while ($rowReferencia = $resReferencia->fetch_object()) {
        echo "
        document.getElementById('btnAddRef').click();
        document.getElementById('reference_container').lastChild.value='". $rowReferencia->referencia ."';
        ";
    }
    echo "</script>";
?>
