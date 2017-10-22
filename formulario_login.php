<?php

// quería trastear y probar a poner una imagen
$image = "img/ragnaros.jpg";
echo("<html>");
    echo("<title>");
        echo("identify INSECT!");
    echo("</title>");

    echo("<body>");
        // empieza el formulario
        echo("<form>");
            /*
            se comprueba si el archivo de la imagen existe
            si no existe no se hace nada
            */
            if (file_exists($image)) {
                echo("<image src=$image title='TOO SOON!'>");
            }
            // este es el equivalente a meter enters para alinear párrafor fml
            echo("<br><br>");
            echo("Nombre: <input type='text' name='name' ><br>");
            echo("Contraseña: <input type='password' name='pass'><br>");
            echo("<input type='button' value='Enviar'>");
            echo("<input type='reset' value='Borrar'>");
        echo("</form>");
    echo("</body>");
echo("</html>");

?>
