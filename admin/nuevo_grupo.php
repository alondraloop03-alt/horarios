<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Nuevo Grupo</title>

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

Registrar Grupo

</h2>

<form
action="guardar_grupo.php"
method="POST">

<div class="mb-3">

<label>Clave del Grupo</label>

<input
type="text"
name="clave_grupo"
class="form-control"
placeholder="02SC121"
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

<button
class="btn btn-success">

Guardar

</button>

<a
href="grupos.php"
class="btn btn-secondary">

Volver

</a>

</form>

</div>

</div>

</div>

</body>
</html>