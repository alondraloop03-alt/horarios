<?php

require_once("../config/conexion.php");

$nombre = $_POST['nombre'];

$semestre = $_POST['semestre'];

$horas = $_POST['horas'];

$tipo = $_POST['tipo'];

$sql = "
INSERT INTO materias
(
nombre,
semestre,
horas_semana,
tipo
)
VALUES
(
?,
?,
?,
?
)
";

$stmt = $conexion->prepare($sql);

$stmt->execute([
$nombre,
$semestre,
$horas,
$tipo
]);

header("Location: materias.php");