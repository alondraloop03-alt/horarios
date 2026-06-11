<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();

require_once("../config/conexion.php");

$dias = [
'Lunes',
'Martes',
'Miercoles',
'Jueves',
'Viernes'
];

$horas = [
'07:00',
'08:00',
'09:00',
'10:00',
'11:00',
'12:00',
'13:00',
'14:00',
'15:00',
'16:00',
'17:00',
'18:00'
];

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Horario Interactivo</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link
rel="stylesheet"
href="../assets/css/style.css">

<link
rel="preconnect"
href="https://fonts.googleapis.com">

<link
rel="preconnect"
href="https://fonts.gstatic.com"
crossorigin>

<link
href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<style>

body{

background:#eef2ff;
font-family:'Poppins',sans-serif;

}

.horario-container{

background:white;
padding:30px;
border-radius:20px;
box-shadow:0 10px 30px rgba(0,0,0,.1);

}

.horario-table{

border-radius:20px;
overflow:hidden;

}

.horario-table th{

background:#2563eb;
color:white;
text-align:center;
padding:18px;

font-size:15px;

}

.horario-table td{

width:130px;
height:75px;

text-align:center;
vertical-align:middle;

cursor:pointer;

transition:.3s;

font-size:14px;
font-weight:500;

}

.hora{

background:#1e293b;
color:white;
font-weight:bold;

}

.libre{

background:#f8fafc;

}

.ocupado{

background:#0ea5e9;
color:white;

box-shadow:
inset 0 0 10px rgba(255,255,255,.4);

}

.horario-table td:hover{

transform:scale(1.05);

}

.page-title{

font-weight:700;
margin-bottom:25px;
color:#1e293b;

}

.info-box{

background:linear-gradient(
135deg,
#2563eb,
#1d4ed8
);

padding:15px;

border-radius:15px;

color:white;

margin-bottom:20px;

}

</style>

</head>

<body>

<div class="d-flex">

<div class="sidebar">

<h3>Administrador</h3>

<a href="dashboard.php">Dashboard</a>

<a href="docentes.php">Docentes</a>

<a href="materias.php">Materias</a>

<a href="grupos.php">Grupos</a>

<a href="horarios.php">Horarios</a>

<a href="../login/logout.php">Salir</a>

</div>

<div class="main-content">

<div class="horario-container">

<h2 class="page-title">

Horario Interactivo Universitario

</h2>

<div class="info-box">

Selecciona bloques de horario disponibles.
Las horas ocupadas se marcarán automáticamente.

</div>

<table class="table table-bordered horario-table">

<thead>

<tr>

<th>Hora</th>

<?php foreach($dias as $d){ ?>

<th><?= $d ?></th>

<?php } ?>

</tr>

</thead>

<tbody>

<?php foreach($horas as $h){ ?>

<tr>

<td class="hora">

<?= $h ?>

</td>

<?php foreach($dias as $d){ ?>

<td
class="libre"
onclick="seleccionar(this)">

</td>

<?php } ?>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

<script>

function seleccionar(celda){

if(celda.classList.contains('libre')){

celda.classList.remove('libre');

celda.classList.add('ocupado');

celda.innerHTML='Seleccionado';

}else{

celda.classList.remove('ocupado');

celda.classList.add('libre');

celda.innerHTML='';

}

}

</script>

</body>
</html>