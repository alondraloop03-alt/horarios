<?php

session_start();
require_once("../config/conexion.php");

$grupo_id = isset($_GET['grupo']) ? $_GET['grupo'] : 4;

$grupo = $conexion->query("
SELECT clave_grupo
FROM grupos
WHERE id='$grupo_id'
")->fetch(PDO::FETCH_ASSOC);

$dias = ['Lunes','Martes','Miercoles','Jueves','Viernes'];

$horas = [
'07:00:00','08:00:00','09:00:00',
'10:00:00','11:00:00','12:00:00',
'13:00:00','14:00:00','15:00:00',
'16:00:00','17:00:00','18:00:00'
];
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">

<title>Horario</title>

<style>

body{
font-family:Arial;
padding:20px;
}

h1{
text-align:center;
}

table{
width:100%;
border-collapse:collapse;
}

th,td{
border:1px solid black;
padding:8px;
text-align:center;
height:60px;
}

th{
background:#ddd;
}

@media print{

button{
display:none;
}

}

</style>

</head>

<body>

<button onclick="window.print()">
📄 Generar PDF
</button>

<h1>
HORARIO <?= $grupo['clave_grupo']; ?>
</h1>

<table>

<tr>

<th>Hora</th>

<?php foreach($dias as $dia){ ?>

<th><?= $dia ?></th>

<?php } ?>

</tr>

<?php

foreach($horas as $hora){

echo "<tr>";

echo "<td>$hora</td>";

foreach($dias as $dia){

$sql = "
SELECT m.nombre
FROM horario_generado h
INNER JOIN materias m
ON h.materia_id=m.id
WHERE h.grupo_id='$grupo_id'
AND h.dia='$dia'
AND h.hora='$hora'
LIMIT 1
";

$r = $conexion->query($sql);

if($r->rowCount()>0){

$f = $r->fetch(PDO::FETCH_ASSOC);

echo "<td>".$f['nombre']."</td>";

}else{

echo "<td></td>";

}

}

echo "</tr>";

}

?>

</table>

</body>
</html>