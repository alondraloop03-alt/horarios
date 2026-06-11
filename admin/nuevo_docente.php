<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../login/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Nuevo Docente</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="container mt-5">

<div class="card">

<div class="card-header">

Registrar Docente

</div>

<div class="card-body">

<form
action="guardar_docente.php"
method="POST">

<div class="mb-3">

<label>Matricula</label>

<input
type="text"
name="matricula"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Nombre</label>

<input
type="text"
name="nombre"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Contraseña</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button
class="btn btn-success">

Guardar

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