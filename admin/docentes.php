<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../login/login.php");
    exit;
}

require_once("../config/conexion.php");

$sql = "
SELECT
u.id,
u.matricula,
u.nombre,
u.rol
FROM usuarios u
WHERE u.rol='docente'
ORDER BY u.nombre
";

$stmt = $conexion->prepare($sql);
$stmt->execute();

$docentes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Docentes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="d-flex">

<div class="sidebar">

<h3>Administrador</h3>

<a href="dashboard.php">Dashboard</a>

<a href="docentes.php">Docentes</a>

<a href="#">Materias</a>

<a href="#">Grupos</a>

<a href="#">Horarios</a>

<a href="../login/logout.php">Salir</a>

</div>

<div class="main-content">

<div class="d-flex justify-content-between align-items-center mb-4">

<h2>Gestion de Docentes</h2>

<a
href="nuevo_docente.php"
class="btn btn-primary">

+ Nuevo Docente

</a>

</div>

<table class="table table-striped table-hover">

<thead>

<tr>

<th>ID</th>
<th>Matricula</th>
<th>Nombre</th>
<th>Rol</th>
<th>Acciones</th>
</tr>

</thead>

<tbody>

<?php foreach($docentes as $d){ ?>

<tr>

<td><?= $d['id'] ?></td>

<td><?= $d['matricula'] ?></td>

<td><?= $d['nombre'] ?></td>

<td><?= $d['rol'] ?></td>
<td>

<a
href="editar_docente.php?id=<?= $d['id'] ?>"
class="btn btn-warning btn-sm">

Editar

</a>

<a
href="eliminar_docente.php?id=<?= $d['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('¿Eliminar docente?')">

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