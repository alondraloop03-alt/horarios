<?php

session_start();

if(!isset($_SESSION['rol']) || $_SESSION['rol']!='docente'){
    header("Location: ../index.php");
    exit();
}

require_once("../config/conexion.php");

$usuario_id = $_SESSION['id'];

$docente = $conexion->query("
SELECT *
FROM docentes
WHERE usuario_id='$usuario_id'
")->fetch(PDO::FETCH_ASSOC);

$docente_id = $docente['id'];

$grupos = $conexion->query("
SELECT DISTINCT
g.*
FROM docente_grupo dg
INNER JOIN grupos g
ON dg.grupo_id = g.id
WHERE dg.docente_id='$docente_id'
ORDER BY g.clave_grupo
");

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">

<title>Mis Grupos</title>

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

<h2>Mis Grupos</h2>

<hr>

<table class="table table-striped">

<tr>
<th>ID</th>
<th>Grupo</th>
<th>Semestre</th>
</tr>

<?php while($g = $grupos->fetch(PDO::FETCH_ASSOC)){ ?>

<tr>

<td><?= $g['id']; ?></td>

<td><?= $g['clave_grupo']; ?></td>

<td><?= $g['semestre']; ?></td>

</tr>

<?php } ?>

</table>

<a href="dashboard.php"
class="btn btn-primary">
Volver
</a>

</div>

</div>

</body>
</html>