<?php

session_start();

if(!isset($_SESSION['rol']) || $_SESSION['rol']!='admin'){
    header("Location: ../index.php");
    exit();
}

require_once("../config/conexion.php");

$grupo_id = isset($_GET['grupo']) ? intval($_GET['grupo']) : 4;

$grupo = $conexion->query("
SELECT *
FROM grupos
WHERE id='$grupo_id'
")->fetch(PDO::FETCH_ASSOC);

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

<title>Horario Generado</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<style>

body{
background:#f4f6fb;
padding:20px;
}

.card{
border:none;
border-radius:20px;
box-shadow:0 5px 25px rgba(0,0,0,.1);
}

table{
text-align:center;
}

th{
background:#0f172a;
color:white;
}

td{
height:80px;
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

<h2>
Horario del Grupo <?= $grupo['clave_grupo']; ?>
</h2>

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
m.nombre AS materia
FROM horario_generado hg
INNER JOIN materias m
ON hg.materia_id = m.id
WHERE hg.grupo_id = '$grupo_id'
AND hg.dia = '$dia'
AND hg.hora = '$hora'
LIMIT 1
";

$r = $conexion->query($sql);

if($r && $r->rowCount()>0){

$f = $r->fetch(PDO::FETCH_ASSOC);

echo "<td>";

echo "<div class='bloque' style='background:#3498db'>";

echo $f['materia'];

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

</div>

</div>

</body>
</html>