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

if(!$docente){
    die("No se encontró el docente.");
}

$docente_id = $docente['id'];

$dias = array(
'Lunes',
'Martes',
'Miercoles',
'Jueves',
'Viernes'
);

$horas = array(
'07:00:00',
'08:00:00',
'09:00:00',
'10:00:00',
'11:00:00',
'12:00:00',
'13:00:00',
'14:00:00',
'15:00:00',
'16:00:00',
'17:00:00',
'18:00:00'
);

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">

<title>Mi Horario</title>

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

th{
background:#0f172a;
color:white;
text-align:center;
}

td{
height:80px;
text-align:center;
vertical-align:middle;
}

.bloque{
color:white;
padding:8px;
border-radius:10px;
font-size:12px;
font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<div class="card p-4">

<h2>Mi Horario</h2>

<hr>

<table class="table table-bordered">

<tr>

<th>Hora</th>

<?php foreach($dias as $dia){ ?>

<th><?= $dia ?></th>

<?php } ?>

</tr>

<?php

foreach($horas as $hora){

echo "<tr>";

echo "<td><b>$hora</b></td>";

foreach($dias as $dia){

$sql = "
SELECT
hg.*,
m.nombre AS materia,
g.clave_grupo,
d.color
FROM horario_generado hg
INNER JOIN materias m
ON hg.materia_id = m.id
INNER JOIN grupos g
ON hg.grupo_id = g.id
INNER JOIN docentes d
ON hg.docente_id = d.id
WHERE hg.docente_id = '$docente_id'
AND hg.dia = '$dia'
AND hg.hora = '$hora'
LIMIT 1
";

$r = $conexion->query($sql);

if($r->rowCount()>0){

$f = $r->fetch(PDO::FETCH_ASSOC);

echo "<td>";

echo "<div class='bloque'
style='background:".$f['color']."'>";

echo $f['materia'];

echo "<br>";

echo "<small>".$f['clave_grupo']."</small>";

echo "</div>";

echo "</td>";

}else{

echo "<td></td>";

}

}

echo "</tr>";

}

?>

</table>

<br>

<a href='dashboard.php'
class='btn btn-primary'>
Volver
</a>

</div>

</div>

</body>
</html>