<?php
// cabecera de la pagina
include "includes/header.php";
require_once "includes/utilidades.php";

$sql = "SELECT f_ult_mod, titulo, id FROM articulo
        ORDER BY f_ult_mod DESC
        LIMIT 30";

CreateTable($sql);

// pie de pagina
include "includes/footer.php";
?>
