<?php
// cabecera de la pagina
include "includes/header.php";
include "includes/utilidades.php";

require_once("includes/DB/Conexion.php");
$con = new Conexion();

$id = $_GET['id'];

$sql="SELECT * FROM articulo WHERE id=". $id ."";

$res = $con->query($sql);
$row = $res->fetch_object();

$sql="SELECT * FROM categorias WHERE id_articulo=". $id ."";
$tag_res = $con->query($sql);

$sql="SELECT * FROM referencias WHERE id_articulo=". $id ."";
$ref_res = $con->query($sql);

?>

<h1><?= $row->titulo ?><a class="btn btn-sm btn-primary" href="form_mod_snippet.php?id=<?=$id?>"><i class='material-icons'>edit</i></a><a class="btn btn-sm btn-danger" onclick="return confirm('Delete Snippet?')" href="del_snippet.php?id=<?=$id?>"><i class='material-icons'>delete</i></a></h1>
<h4>by <a href="snippets_by_author.php?author=<?=$row->autor?>""><?=getFullNameOf($row->autor)?></a></h4>
<h4>Last edit: <?= $row->f_ult_mod ?></h4>


<div>
    <textarea id="snippetContent" class="hidden" name="name" rows="8" cols="80" readonly><?= $row->contenido ?></textarea>
</div>

<div id="snippetMarkdownContent">
</div>

<ul id=tagList>
    <li><b>Tags:</b></li>
    <?php
    while($tag = $tag_res->fetch_object()) {
        echo "<li><a href='snippets_by_tag.php?tag=". $tag->categoria ."'><i class='material-icons'>label_outline</i>". $tag->categoria ."</a></li>";
    }
     ?>
</ul>

<h4>References</h4>
<blockquote>
    <?php
    while($ref = $ref_res->fetch_object()) {
        echo $ref->referencia ."<br>";
    }
     ?>
</blockquote>
<?php
// pie de pagina
$con->close();
include "includes/footer.php";
?>
<script type="text/javascript">
    convert_markdown("snippetContent", "snippetMarkdownContent");
</script>
