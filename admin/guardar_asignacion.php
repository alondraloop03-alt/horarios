<?php

require_once("../config/conexion.php");

$docente =
$_POST['docente_id'];

$materia =
$_POST['materia_id'];

$sql = "
INSERT INTO docente_materia
(
docente_id,
materia_id
)
VALUES
(
?,
?
)
";

$stmt = $conexion->prepare($sql);

$stmt->execute([
$docente,
$materia
]);

header("Location: asignaciones.php");