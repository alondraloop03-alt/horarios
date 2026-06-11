<?php

session_start();

if(!isset($_SESSION['rol']) || $_SESSION['rol']!='docente'){
    header("Location: ../index.php");
    exit();
}

require_once("../config/conexion.php");

$mensaje="";

if(isset($_POST['guardar'])){

    $actual = $_POST['actual'];
    $nueva = $_POST['nueva'];
    $confirmar = $_POST['confirmar'];

    $usuario_id = $_SESSION['id'];

    $usuario = $conexion->query("
    SELECT *
    FROM usuarios
    WHERE id='$usuario_id'
    ")->fetch(PDO::FETCH_ASSOC);

    if($usuario['password'] != $actual){

        $mensaje="
        <div class='alert alert-danger'>
        La contraseña actual es incorrecta
        </div>";

    }elseif($nueva != $confirmar){

        $mensaje="
        <div class='alert alert-warning'>
        Las contraseñas no coinciden
        </div>";

    }else{

        $conexion->query("
        UPDATE usuarios
        SET password='$nueva'
        WHERE id='$usuario_id'
        ");

        $mensaje="
        <div class='alert alert-success'>
        Contraseña actualizada correctamente
        </div>";

    }

}

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">

<title>Cambiar Contraseña</title>

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

</style>

</head>

<body>

<div class="container">

<div class="card p-4">

<h2>Cambiar Contraseña</h2>

<hr>

<?= $mensaje ?>

<form method="POST">

<label>
Contraseña actual
</label>

<input
type="password"
name="actual"
class="form-control mb-3"
required>

<label>
Nueva contraseña
</label>

<input
type="password"
name="nueva"
class="form-control mb-3"
required>

<label>
Confirmar contraseña
</label>

<input
type="password"
name="confirmar"
class="form-control mb-3"
required>

<button
type="submit"
name="guardar"
class="btn btn-success">

Guardar cambios

</button>

<a
href="dashboard.php"
class="btn btn-secondary">

Volver

</a>

</form>

</div>

</div>

</body>
</html>