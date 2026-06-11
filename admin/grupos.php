<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();

require_once("../config/conexion.php");

$sql = "
SELECT *
FROM grupos
ORDER BY semestre
";

$stmt = $conexion->prepare($sql);

$stmt->execute();

$grupos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Grupos</title>

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

<a href="grupos.php">Grupos</a>

<a href="../login/logout.php">Salir</a>

</div>

<div class="main-content">

<div class="d-flex justify-content-between align-items-center mb-4">

<h2 class="page-title">
Gestión de Grupos
</h2>

<a
href="nuevo_grupo.php"
class="btn btn-primary">

+ Nuevo Grupo

</a>

</div>

<table class="table table-hover">

<thead>

<tr>

<th>ID</th>
<th>Grupo</th>
<th>Semestre</th>
<th>Estado</th>

</tr>

</thead>

<tbody>

<?php foreach($grupos as $g){ ?>

<tr>

<td><?= $g['id'] ?></td>

<td><?= $g['clave_grupo'] ?></td>

<td><?= $g['semestre'] ?></td>

<td>

<?php if($g['activo']==1){ ?>

<span class="badge bg-success">

Activo

</span>

<?php }else{ ?>

<span class="badge bg-danger">

Inactivo

</span>

<?php } ?>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>