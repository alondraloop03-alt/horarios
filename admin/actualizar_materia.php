<?php

require_once("../config/conexion.php");

$id = $_POST['id'];

$nombre = $_POST['nombre'];

$semestre = $_POST['semestre'];

$horas = $_POST['horas'];

$tipo = $_POST['tipo'];

$sql = "
UPDATE materias
SET
nombre=?,
semestre=?,
horas_semana=?,
tipo=?
WHERE id=?
";

$stmt = $conexion->prepare($sql);

$stmt->execute([
$nombre,
$semestre,
$horas,
$tipo,
$id
]);

header("Location: materias.php");