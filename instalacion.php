<?php

$server = "localhost";
$user = "Xdperez067";
$passw = "AVmu8sW4r";
$bd = "Xdperez067_db_sgssi";

$conn = new mysqli($server, $user, $passw);
mysqli_set_charset($conn, "utf8");

if (mysqli_connect_errno()) {
    printf("La conexion ha fallado: %s\n", mysqli_connect_error());
    exit();
}

function execute_query($sql, $desc, $error){
    global $conn;
    echo($desc . "...<br>");
    $sql_query = $sql;
    if (!$conn->query($sql_query)) {
        echo($error . ": " . $conn->error);
        exit();
    }
}

// crear base de datos
$sql = "DROP DATABASE IF EXISTS $bd";
execute_query($sql, "Borrando base de datos si ya existe",
                    "Error al intentar borrar bd si ya existe");

$sql = "CREATE DATABASE $bd";
execute_query($sql, "Creando base de datos",
                    "Error al intentar crear la base de datos");

// ahora que esta creada la bd la seleccionamos para operar con ella
$conn->select_db($bd);

// crear todas las tablas
$sql = "
CREATE TABLE `usuario` (
    `dni` varchar(9) NOT NULL,
    `nombre` varchar(30) NOT NULL,
    `apellidos` varchar(30) DEFAULT NULL,
    `telefono` varchar(9) DEFAULT NULL,
    `f_nacimiento` date NOT NULL,
    `email` varchar(30) NOT NULL,
    `hash` varchar(100) NOT NULL,
    PRIMARY KEY (`dni`)
) DEFAULT CHARSET=utf8;
";
execute_query($sql, "Creando tabla usuario",
                    "Error al intentar crear la tabla usuario");

$sql = "
INSERT INTO `usuario` VALUES
('anonimo','Anónimo','','','','','')";
execute_query($sql, "Insertando entradas de prueba en la tabla usuario",
                    "Error al intentar insertar entradas en la tabla usuario");

$sql = "
CREATE TABLE `articulo` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `titulo` varchar(200) NOT NULL,
    `contenido` text NOT NULL,
    `f_ult_mod` datetime DEFAULT NULL,
    `autor` varchar(9) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`autor`) REFERENCES `usuario` (`dni`)
) DEFAULT CHARSET=utf8;
";

execute_query($sql, "Creando tabla articulo",
"Error al intentar crear la tabla articulo");
$sql = "
CREATE TABLE `categorias` (
    `id_articulo` int(11) NOT NULL,
    `categoria` varchar(20) NOT NULL,
    PRIMARY KEY (`id_articulo`,`categoria`),
    FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id`) ON DELETE CASCADE
) DEFAULT CHARSET=utf8;
";
execute_query($sql, "Creando tabla categorias",
                    "Error al intentar crear la tabla categorias");

$sql = "
CREATE TABLE `referencias` (
    `id_articulo` int(11) NOT NULL,
    `referencia` varchar(200) NOT NULL,
    PRIMARY KEY (`id_articulo`,`referencia`),
    FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id`) ON DELETE CASCADE
) DEFAULT CHARSET=utf8;
";
execute_query($sql, "Creando tabla referencias",
                    "Error al intentar crear la tabla referencias");

// modificacion de bd finalizada
echo("Exito en todas las operaciones");

$conn->close();
?>
