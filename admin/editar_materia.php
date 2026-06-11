<?php

require_once("../config/conexion.php");

$id = $_GET['id'];

$sql = "
SELECT *
FROM materias
WHERE id=?
";

$stmt = $conexion->prepare($sql);

$stmt->execute([$id]);

$materia = $stmt->fetch();

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Editar Materia</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link
rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="container mt-5">

<div class="card">

<div class="card-body">

<h2 class="page-title">

Editar Materia

</h2>

<form
action="actualizar_materia.php"
method="POST">

<input
type="hidden"
name="id"
value="<?= $materia['id'] ?>">

<div class="mb-3">

<label>Nombre</label>

<input
type="text"
name="nombre"
class="form-control"
value="<?= $materia['nombre'] ?>">

</div>

<div class="mb-3">

<label>Semestre</label>

<input
type="number"
name="semestre"
class="form-control"
value="<?= $materia['semestre'] ?>">

</div>

<div class="mb-3">

<label>Horas</label>

<input
type="number"
name="horas"
class="form-control"
value="<?= $materia['horas_semana'] ?>">

</div>

<div class="mb-3">

<label>Tipo</label>

<input
type="text"
name="tipo"
class="form-control"
value="<?= $materia['tipo'] ?>">

</div>

<button
class="btn btn-success">

Actualizar

</button>

<a
href="materias.php"
class="btn btn-secondary">

Volver

</a>

</form>

</div>

</div>

</div>

</body>
</html>