<?php
// cabecera de la pagina
include "includes/header.php";
?>

<form action="add_post.php" method="post">
    <div id="textinput">
        <h3>Texto en Markdown</h3>
        <textarea id="sourceTA" oninput="run()"></textarea>
    </div>
    <div id="right">
        <h3>Previsualización en vivo</h3>
        <div id="targetDiv"></div>
    </div>
    <input type='button' value='Enviar'>

</form>

<?php
// pie de pagina
include "includes/footer.php";
?>
