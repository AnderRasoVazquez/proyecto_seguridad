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
$tag_res = $con->query($sql);

$sql="SELECT * FROM referencias WHERE id_articulo=". $id ."";
$ref_res = $con->query($sql);
// CREATE TABLE `articulo` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `titulo` varchar(20) NOT NULL,
//   `contenido` text NOT NULL,
//   `f_ult_mod` datetime DEFAULT NULL,
//   `autor` varchar(20) NOT NULL,
//   PRIMARY KEY (`id`)
// ) DEFAULT CHARSET=utf8;

// echo $row->autor . "\t" . $row->titulo . " " . $row->contenido . "<br>";
// echo $row->f_ult_mod . "<br>";
?>

<h1><?= $row->titulo ?></h1>
<h4>by <?= $row->autor ?></h4>
<h4>Last edit: <?= $row->f_ult_mod ?></h4>


<div>
    <textarea id="snippetContent" class="hidden" name="name" rows="8" cols="80" readonly><?= $row->contenido ?></textarea>
</div>

<div id="snippetMarkdownContent">
</div>

<h4>Tags</h4>
<ul id=tag_list>
    <?php
    while($tag = $tag_res->fetch_object()) {
        echo "<li>". $tag->categoria ."</li>";
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
