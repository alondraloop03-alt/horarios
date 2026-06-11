<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    exit();
}

require_once("../config/conexion.php");

$docente_id = $_SESSION['id'];

$sql = "
SELECT m.*
FROM materias m
INNER JOIN docente_materia dm
ON dm.materia_id = m.id
WHERE dm.docente_id = $docente_id
ORDER BY m.semestre
";

$resultado = $conexion->query($sql);
if(!$resultado){
    die("Error SQL: ".$conexion->error);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Mis Materias</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
    background:#f1f5f9;
    font-family:'Poppins',sans-serif;
}

.sidebar{
    width:260px;
    height:100vh;
    position:fixed;
    background:#0f172a;
}

.sidebar .logo{
    color:white;
    text-align:center;
    padding:25px;
    font-size:28px;
    font-weight:700;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 25px;
}

.sidebar a:hover{
    background:#2563eb;
}

.content{
    margin-left:260px;
    padding:30px;
}

.card{
    border:none;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

</style>

</head>

<body>

<div class="sidebar">

<div class="logo">
DOCENTE
</div>

<a href="dashboard.php">🏠 Inicio</a>
<a href="materias.php">📚 Mis Materias</a>
<a href="grupos.php">👥 Mis Grupos</a>
<a href="disponibilidad.php">📅 Disponibilidad</a>
<a href="horario.php">🕒 Mi Horario</a>
<a href="../login/logout.php">🚪 Salir</a>

</div>

<div class="content">

<div class="card p-4">

<h2>Mis Materias</h2>

<hr>

<table class="table table-striped">

<thead>

<tr>

<th>ID</th>
<th>Materia</th>
<th>Semestre</th>
<th>Horas/Semana</th>
<th>Tipo</th>

</tr>

</thead>

<tbody>

<?php while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){ ?>

<tr>

<td><?= $fila['id'] ?></td>

<td><?= $fila['nombre'] ?></td>

<td><?= $fila['semestre'] ?></td>

<td><?= $fila['horas_semana'] ?></td>

<td><?= $fila['tipo'] ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>