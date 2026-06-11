<?php

session_start();

require_once("../config/conexion.php");

$id = $_GET['id'];

$sql = "
SELECT * FROM usuarios
WHERE id=?
";

$stmt = $conexion->prepare($sql);

$stmt->execute([$id]);

$docente = $stmt->fetch();

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Editar Docente</title>

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
Editar Docente
</h2>

<form
action="actualizar_docente.php"
method="POST">

<input
type="hidden"
name="id"
value="<?= $docente['id'] ?>">

<div class="mb-3">

<label>Matricula</label>

<input
type="text"
name="matricula"
class="form-control"
value="<?= $docente['matricula'] ?>">

</div>

<div class="mb-3">

<label>Nombre</label>

<input
type="text"
name="nombre"
class="form-control"
value="<?= $docente['nombre'] ?>">

</div>

<div class="mb-3">

<label>Contraseña</label>

<input
type="text"
name="password"
class="form-control"
value="<?= $docente['password'] ?>">

</div>

<button
class="btn btn-success">

Actualizar

</button>

<a
href="docentes.php"
class="btn btn-secondary">

Volver

</a>

</form>

</div>

</div>

</div>

</body>
</html>