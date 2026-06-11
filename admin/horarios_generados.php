<?php

session_start();

if(!isset($_SESSION['rol']) || $_SESSION['rol']!='admin'){
    header("Location: ../index.php");
    exit();
}

require_once("../config/conexion.php");

$grupos = $conexion->query("
SELECT *
FROM grupos
ORDER BY clave_grupo
");

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">

<title>Horarios Generados</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<style>

body{
background:#f4f6fb;
padding:30px;
}

.card{
border:none;
border-radius:20px;
box-shadow:0 5px 20px rgba(0,0,0,.1);
}

</style>

</head>

<body>

<div class="container">

<div class="card p-4">

<h2>Horarios Generados</h2>

<hr>

<table class="table table-striped table-bordered">

<tr>
<th>ID</th>
<th>Grupo</th>
<th>Semestre</th>
<th>Acción</th>
</tr>

<?php while($g = $grupos->fetch(PDO::FETCH_ASSOC)){ ?>

<tr>

<td><?= $g['id']; ?></td>

<td><?= $g['clave_grupo']; ?></td>

<td><?= $g['semestre']; ?></td>

<td>

<a
href="ver_horario.php?grupo=<?= $g['id']; ?>"
class="btn btn-primary btn-sm">

Ver Horario

</a>

</td>

</tr>

<?php } ?>

</table>

<a
href="dashboard.php"
class="btn btn-secondary">

Volver

</a>

</div>

</div>

</body>
</html>