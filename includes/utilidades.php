<?php
/*
 * Dada una query SELECT de MySQL crea una tabla
 *
 * sql: debe pedir de la tabla articulo -> f_ult_mod, titulo, id
 */
function CreateSnippetTable($sql)
{
    require_once("includes/DB/Conexion.php");
    $conn = new Conexion();

    if (! $res = $conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        exit();
    }
    echo "
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Last Modified</th>
            </tr>
        </thead>
        <tbody>";
                while ($row = $res->fetch_object()) {
                    echo "<tr>";
                    echo "<td><a href='show_snippet.php?id=". $row->id ."'>". $row->titulo . "</a></td>";
                    echo "<td>". $row->f_ult_mod . "</td>";
                    echo "</tr>";
                }
    echo "
        </tbody>
    </table>";
    $conn->close();
}

?>
