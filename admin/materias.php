<?php

session_start();

require_once("../config/conexion.php");

$sql = "
SELECT *
FROM materias
ORDER BY semestre,nombre
";

$stmt = $conexion->prepare($sql);

$stmt->execute();

$materias = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Materias</title>

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

<a href="#">Grupos</a>

<a href="#">Horarios</a>

<a href="../login/logout.php">Salir</a>

</div>

<div class="main-content">

<div class="d-flex justify-content-between align-items-center mb-4">

<h2 class="page-title">
Gestión de Materias
</h2>

<a
href="nueva_materia.php"
class="btn btn-primary">

+ Nueva Materia

</a>

</div>

<table class="table table-hover">

<thead>

<tr>

<th>ID</th>
<th>Nombre</th>
<th>Semestre</th>
<th>Horas</th>
<th>Tipo</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php foreach($materias as $m){ ?>

<tr>

<td><?= $m['id'] ?></td>

<td><?= $m['nombre'] ?></td>

<td><?= $m['semestre'] ?></td>

<td><?= $m['horas_semana'] ?></td>

<td><?= $m['tipo'] ?></td>

<td>

<a
href="editar_materia.php?id=<?= $m['id'] ?>"
class="btn btn-warning btn-sm">

Editar

</a>

<a
href="eliminar_materia.php?id=<?= $m['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('¿Eliminar materia?')">

Eliminar

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>