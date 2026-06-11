<?php

session_start();

if(
!isset($_SESSION['id'])
){

header(
"Location:
../login/login.php"
);

exit;
}
?>

<!DOCTYPE html>
<html>
<head>

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

<h3>
Administrador
</h3>

<a href="#">
Dashboard
</a>

<a href="docentes.php">
Docentes
</a>

<a href="materias.php">
Materias
</a>
<a href="asignaciones.php">
Asignaciones
</a>

<a href="grupos.php">
Grupos
</a>

<div style="margin-top:20px;">

<a
href="generar_horario.php">
Generar Horario
</a>

<a href="horarios_generados.php">
Horarios Generados
</a>

<a href="ver_horario.php?grupo=4"
class="btn btn-primary">

Ver Horario

</a>

</div>

<a href="horarios.php">
Horarios
</a>
<a href="../login/logout.php">
Salir
</a>

</div>

<div class="main-content">

<h2>

Bienvenido

<?=
$_SESSION['nombre']
?>

</h2>

<div class="row mt-4">

<div class="col-md-4">

<div class="card card-dashboard">

<div class="card-body">

<h5>
Docentes
</h5>

<h1>
14
</h1>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card card-dashboard">

<div class="card-body">

<h5>
Materias
</h5>

<h1>
59
</h1>

</div>

</div>

</div>

</div>

</div>

</div>

</body>
</html>