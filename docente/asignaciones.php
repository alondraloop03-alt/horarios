<?php

session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    exit();
}

require_once("../config/conexion.php");

$docente_id = $_SESSION['id'];

if(isset($_POST['guardar'])){

    $materia_id = $_POST['materia_id'];
    $grupo_id = $_POST['grupo_id'];

    $sql = "INSERT INTO docente_grupo(docente_id,grupo_id,materia_id)
            VALUES(?,?,?)";

    $stmt = $conexion->prepare($sql);

    $stmt->execute([
        $docente_id,
        $grupo_id,
        $materia_id
    ]);

    $mensaje = "Asignación guardada correctamente";
}

/*
|--------------------------------------------------------------------------
| MATERIAS DEL DOCENTE
|--------------------------------------------------------------------------
*/

$sqlMaterias = "
SELECT m.*
FROM materias m
INNER JOIN docente_materia dm
ON dm.materia_id = m.id
WHERE dm.docente_id = ?
ORDER BY m.nombre
";

$stmtMaterias = $conexion->prepare($sqlMaterias);
$stmtMaterias->execute([$docente_id]);

/*
|--------------------------------------------------------------------------
| GRUPOS
|--------------------------------------------------------------------------
*/

$sqlGrupos = "
SELECT *
FROM grupos
WHERE activo = 1
ORDER BY semestre
";

$grupos = $conexion->query($sqlGrupos);

/*
|--------------------------------------------------------------------------
| ASIGNACIONES ACTUALES
|--------------------------------------------------------------------------
*/

$sqlAsignaciones = "
SELECT
dg.id,
m.nombre AS materia,
g.clave_grupo
FROM docente_grupo dg
INNER JOIN materias m
ON m.id = dg.materia_id
INNER JOIN grupos g
ON g.id = dg.grupo_id
WHERE dg.docente_id = ?
";

$stmtAsignaciones = $conexion->prepare($sqlAsignaciones);
$stmtAsignaciones->execute([$docente_id]);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Asignaciones</title>

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

.logo{
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
<a href="asignaciones.php">📋 Asignaciones</a>
<a href="disponibilidad.php">📅 Disponibilidad</a>
<a href="horario.php">🕒 Mi Horario</a>
<a href="../login/logout.php">🚪 Salir</a>

</div>

<div class="content">

<div class="card p-4 mb-4">

<h2>Nueva Asignación</h2>

<?php if(isset($mensaje)){ ?>

<div class="alert alert-success">
<?= $mensaje ?>
</div>

<?php } ?>

<form method="POST">

<div class="row">

<div class="col-md-6">

<label class="form-label">
Materia
</label>

<select name="materia_id" class="form-select" required>

<option value="">
Selecciona una materia
</option>

<?php while($m = $stmtMaterias->fetch(PDO::FETCH_ASSOC)){ ?>

<option value="<?= $m['id'] ?>">
<?= $m['nombre'] ?>
</option>

<?php } ?>

</select>

</div>

<div class="col-md-6">

<label class="form-label">
Grupo
</label>

<select name="grupo_id" class="form-select" required>

<option value="">
Selecciona un grupo
</option>

<?php while($g = $grupos->fetch(PDO::FETCH_ASSOC)){ ?>

<option value="<?= $g['id'] ?>">
<?= $g['clave_grupo'] ?>
</option>

<?php } ?>

</select>

</div>

</div>

<br>

<button class="btn btn-primary" name="guardar">
Guardar Asignación
</button>

</form>

</div>

<div class="card p-4">

<h2>Mis Asignaciones</h2>

<table class="table table-striped">

<thead>

<tr>
<th>ID</th>
<th>Materia</th>
<th>Grupo</th>
</tr>

</thead>

<tbody>

<?php while($a = $stmtAsignaciones->fetch(PDO::FETCH_ASSOC)){ ?>

<tr>

<td><?= $a['id'] ?></td>

<td><?= $a['materia'] ?></td>

<td><?= $a['clave_grupo'] ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>