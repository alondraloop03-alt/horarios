<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    exit();
}

require_once("../config/conexion.php");

$docente_id = $_SESSION['id'];

$dias = [
    'Lunes',
    'Martes',
    'Miercoles',
    'Jueves',
    'Viernes'
];

$horas = [
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
];

/*
|--------------------------------------------------------------------------
| GUARDAR DISPONIBILIDAD
|--------------------------------------------------------------------------
*/

if(isset($_POST['guardar'])){

    $grupo_id = $_POST['grupo_id'];

    $stmt = $conexion->prepare("
        DELETE FROM disponibilidad_docente
        WHERE docente_id = ?
        AND grupo_id = ?
    ");

    $stmt->execute([$docente_id,$grupo_id]);

    if(isset($_POST['bloques'])){

        foreach($_POST['bloques'] as $bloque){

            list($dia,$hora) = explode('|',$bloque);

            $sql = "
                INSERT INTO disponibilidad_docente
                (docente_id,grupo_id,dia,hora)
                VALUES (?,?,?,?)
            ";

            $stmtInsert = $conexion->prepare($sql);

            $stmtInsert->execute([
                $docente_id,
                $grupo_id,
                $dia,
                $hora
            ]);
        }
    }

    $mensaje = "Disponibilidad guardada correctamente";
}

/*
|--------------------------------------------------------------------------
| GRUPOS
|--------------------------------------------------------------------------
*/

$grupos = $conexion->query("
    SELECT *
    FROM grupos
    WHERE activo = 1
    ORDER BY semestre
");

/*
|--------------------------------------------------------------------------
| GRUPO SELECCIONADO
|--------------------------------------------------------------------------
*/

$grupoSeleccionado = 0;

if(isset($_GET['grupo'])){
    $grupoSeleccionado = $_GET['grupo'];
}

/*
|--------------------------------------------------------------------------
| DISPONIBILIDAD EXISTENTE
|--------------------------------------------------------------------------
*/

$seleccionados = [];

if($grupoSeleccionado){

    $sql = "
        SELECT dia,hora
        FROM disponibilidad_docente
        WHERE docente_id = ?
        AND grupo_id = ?
    ";

    $stmt = $conexion->prepare($sql);

    $stmt->execute([
        $docente_id,
        $grupoSeleccionado
    ]);

    while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){

        $clave = $fila['dia'].'|'.$fila['hora'];

        $seleccionados[$clave] = true;
    }
}

/*
|--------------------------------------------------------------------------
| HORARIOS OCUPADOS
|--------------------------------------------------------------------------
*/

$ocupados = [];

if($grupoSeleccionado){

    $sql = "
    SELECT
    d.dia,
    d.hora,
    u.nombre,
    u.color
    FROM disponibilidad_docente d
    INNER JOIN usuarios u
    ON u.id = d.docente_id
    WHERE d.grupo_id = ?
    ";

    $stmt = $conexion->prepare($sql);

    $stmt->execute([$grupoSeleccionado]);

    while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){

        $clave = $fila['dia'].'|'.$fila['hora'];

        $ocupados[$clave] = $fila;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Disponibilidad</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6fb;
}

.tablaHorario{
    width:100%;
    border-collapse:collapse;
}

.tablaHorario th,
.tablaHorario td{
    border:1px solid #ddd;
    text-align:center;
    padding:10px;
}

.hora{
    background:#0f172a;
    color:white;
    font-weight:bold;
}

.ocupado{
    color:white;
    font-size:11px;
    border-radius:8px;
    padding:6px;
}

</style>

</head>

<body>

<div class="container mt-4">

<h2>Disponibilidad Docente</h2>

<?php if(isset($mensaje)){ ?>

<div class="alert alert-success">
<?= $mensaje ?>
</div>

<?php } ?>

<form method="GET">

<div class="row mb-4">

<div class="col-md-4">

<select
name="grupo"
class="form-select"
onchange="this.form.submit()"
required
>

<option value="">
Seleccione Grupo
</option>

<?php

$grupos->execute();

while($g = $grupos->fetch(PDO::FETCH_ASSOC)){

$selected = '';

if($grupoSeleccionado == $g['id']){
    $selected = 'selected';
}

?>

<option
value="<?= $g['id'] ?>"
<?= $selected ?>
>

<?= $g['clave_grupo'] ?>

</option>

<?php } ?>

</select>

</div>

</div>

</form>

<?php if($grupoSeleccionado){ ?>

<form method="POST">

<input
type="hidden"
name="grupo_id"
value="<?= $grupoSeleccionado ?>"
>

<table class="tablaHorario">

<tr>

<th>Hora</th>

<?php foreach($dias as $dia){ ?>

<th><?= $dia ?></th>

<?php } ?>

</tr>

<?php foreach($horas as $hora){ ?>

<tr>

<td class="hora">

<?= substr($hora,0,5) ?>

</td>

<?php foreach($dias as $dia){

$clave = $dia.'|'.$hora;

?>

<td>

<?php

if(isset($ocupados[$clave])){

$nombre = $ocupados[$clave]['nombre'];
$color = $ocupados[$clave]['color'];

?>

<div
class="ocupado"
style="background:<?= $color ?>"
>

<?= $nombre ?>

</div>

<?php

}else{

$checked = '';

if(isset($seleccionados[$clave])){
    $checked = 'checked';
}

?>

<input
type="checkbox"
name="bloques[]"
value="<?= $clave ?>"
<?= $checked ?>
>

<?php } ?>

</td>

<?php } ?>

</tr>

<?php } ?>

</table>

<br>

<button
class="btn btn-success"
name="guardar"
>
Guardar Disponibilidad
</button>

</form>

<?php } ?>

</div>

</body>
</html>