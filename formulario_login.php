<?php
$image = "img/ragnaros.jpg";
?>

<html>
    <head>
        <title>
            identify INSECT!
        </title>
    </head>
    <body>
        <form>
            <?php
                /*
                se comprueba si el archivo de la imagen existe
                si no existe no se hace nada
                */
                if (file_exists($image)) {
                    echo("<image src=$image title='TOO SOON!'>");
                }
            ?>
            <br><br>
            Nombre: <input type="text" name="name"><br>
            Contraseña: <input type="text" name="pass"><br>
            <input type='button' value='Enviar'>
            <input type='reset' value='Borrar'>
        </form>
    </body>
</html>
