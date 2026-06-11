<?php

require_once("../config/conexion.php");

$id = $_POST['id'];

$matricula = $_POST['matricula'];

$nombre = $_POST['nombre'];

$password = $_POST['password'];

$sql = "
UPDATE usuarios
SET
matricula=?,
nombre=?,
password=?
WHERE id=?
";

$stmt = $conexion->prepare($sql);

$stmt->execute([
$matricula,
$nombre,
$password,
$id
]);

header("Location: docentes.php");