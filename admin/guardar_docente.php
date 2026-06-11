<?php

require_once("../config/conexion.php");

$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];

$sql = "
INSERT INTO usuarios
(
matricula,
nombre,
password,
rol
)
VALUES
(
?,
?,
?,
'docente'
)
";

$stmt = $conexion->prepare($sql);

$stmt->execute([
$matricula,
$nombre,
$password
]);

header("Location: docentes.php");