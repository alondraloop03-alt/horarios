<?php

session_start();

require_once("../config/conexion.php");

$docentes = $conexion
->query("
SELECT *
FROM usuarios
WHERE rol='docente'
ORDER BY nombre
")
->fetchAll(PDO::FETCH_ASSOC);

$materias = $conexion
->query("
SELECT *
FROM materias
ORDER BY nombre
")
->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Asignaciones</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link
rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="d-flex">

<div class="sidebar">

<h3>Administrador</h3>

<a href="dashboard.php">Dashboard</a>

<a href="docentes.php">Docentes</a>

<a href="materias.php">Materias</a>

<a href="asignaciones.php">Asignaciones</a>

<a href="grupos.php">Grupos</a>

<a href="../login/logout.php">Salir</a>

</div>

<div class="main-content">

<h2 class="page-title">

Asignar Materias a Docentes

</h2>

<div class="card">

<div class="card-body">

<form
action="guardar_asignacion.php"
method="POST">

<div class="mb-3">

<label>Docente</label>

<select
name="docente_id"
class="form-control">

<?php foreach($docentes as $d){ ?>

<option value="<?= $d['id'] ?>">

<?= $d['nombre'] ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Materia</label>

<select
name="materia_id"
class="form-control">

<?php foreach($materias as $m){ ?>

<option value="<?= $m['id'] ?>">

<?= $m['nombre'] ?>

</option>

<?php } ?>

</select>

</div>

<button
class="btn btn-success">

Asignar

</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>