<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Nueva Materia</title>

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

Registrar Materia

</h2>

<form
action="guardar_materia.php"
method="POST">

<div class="mb-3">

<label>Nombre</label>

<input
type="text"
name="nombre"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Semestre</label>

<select
name="semestre"
class="form-control">

<?php for($i=1;$i<=9;$i++){ ?>

<option value="<?= $i ?>">

<?= $i ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Horas Semanales</label>

<input
type="number"
name="horas"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Tipo</label>

<select
name="tipo"
class="form-control">

<option value="tecnica">
Técnica
</option>

<option value="ingles">
Inglés
</option>

<option value="matematica">
Matemática
</option>

<option value="relleno">
Relleno
</option>

<option value="complementaria">
Complementaria
</option>

</select>

</div>

<button
class="btn btn-success">

Guardar

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