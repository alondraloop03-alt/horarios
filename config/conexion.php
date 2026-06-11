<?php

$host = "localhost";
$dbname = "horarios_universidad";
$user = "root";
$pass = "root";

try {

    $conexion = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass
    );

    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch(PDOException $e){

    die(
        "Error de conexion: "
        . $e->getMessage()
    );
}