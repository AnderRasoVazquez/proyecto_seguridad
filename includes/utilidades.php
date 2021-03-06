<?php
/*
 * Dada una query SELECT de MySQL crea una tabla
 *
 * sql: debe pedir de la tabla articulo -> f_ult_mod, titulo, id, autor
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
                <th>Created by</th>
                <th>Last Modified</th>
            </tr>
        </thead>
        <tbody>";
                while ($row = $res->fetch_object()) {
                    $full_name = getFullNameOf($row->autor);
                    echo "<tr>";
                    echo "<td><a href='show_snippet.php?id=". $row->id ."'>". $row->titulo . "</a></td>";
                    echo "<td><a href='snippets_by_author.php?author=". $row->autor ."'>". getFullNameOf($row->autor) ."</a></td>";
                    echo "<td>". $row->f_ult_mod . "</td>";
                    echo "</tr>";
                }
    echo "
        </tbody>
    </table>";
    $conn->close();
}

function createSession($pDni, $pName, $pSecondName) {
    session_start();
    // variables de sesión
    $_SESSION["currentUser"] = $pDni;
    $_SESSION["currentUserName"] = $pName;
    $_SESSION["currentUserSecondName"] = $pSecondName;
}

function endSession() {
    // se borran las variables de sesión
    $_SESSION = array();
    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
     }
    // Finally, destroy the session.
    session_destroy();
}

function getFullNameOf($pDni) {
    // dado un dni, devuelve el nombre completo (nombre + apellidos) del usuario
    require_once("includes/DB/Conexion.php");
    $conn = new Conexion();
    $sql="SELECT nombre, apellidos FROM usuario WHERE dni='".$pDni."'";
    if (!$res = $conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        return false;
    }
    $row = $res->fetch_object();
    $full_name = $row->nombre." ".$row->apellidos;
    $conn->close();
    return $full_name;
}

?>
