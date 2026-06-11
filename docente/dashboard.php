<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

/*
|--------------------------------------------------------------------------
| VALIDAR SESION
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION['rol'])) {
    header("Location: ../index.php");
    exit();
}

$nombre = "Docente";

if (isset($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre'];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Panel Docente</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f1f5f9;
}

.sidebar{
position:fixed;
left:0;
top:0;
width:260px;
height:100vh;
background:#0f172a;
color:white;
}

.logo{
padding:25px;
font-size:28px;
font-weight:700;
text-align:center;
border-bottom:1px solid rgba(255,255,255,.1);
}

.menu{
padding-top:20px;
}

.menu a{
display:block;
padding:15px 25px;
color:white;
text-decoration:none;
transition:.3s;
font-size:15px;
}

.menu a:hover{
background:#2563eb;
}

.content{
margin-left:260px;
padding:30px;
}

.header{
background:white;
padding:25px;
border-radius:20px;
box-shadow:0 5px 20px rgba(0,0,0,.08);
margin-bottom:25px;
}

.header h1{
font-size:38px;
font-weight:700;
color:#0f172a;
}

.header p{
color:#64748b;
}

.cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:20px;
}

.card-box{
background:white;
padding:25px;
border-radius:20px;
box-shadow:0 5px 20px rgba(0,0,0,.08);
transition:.3s;
}

.card-box:hover{
transform:translateY(-5px);
}

.card-box h5{
color:#64748b;
}

.card-box h2{
margin-top:10px;
font-weight:700;
}

.info{
margin-top:25px;
background:white;
padding:25px;
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

<div class="menu">

<a href="dashboard.php">🏠 Inicio</a>

<a href="materias.php">📚 Mis Materias</a>

<a href="grupos.php">👥 Mis Grupos</a>

<a href="disponibilidad.php">📅 Disponibilidad</a>

<a href="horario.php">🕒 Mi Horario</a>

<a href="cambiar_password.php">🔐 Cambiar Contraseña</a>

<a href="../login/logout.php">🚪 Salir</a>

<a href="asignaciones.php">📋 Asignaciones</a>

</div>

</div>

<div class="content">

<div class="header">

<h1>
Bienvenido <?php echo htmlspecialchars($nombre); ?>
</h1>

<p>
Sistema de Control de Horarios Universitarios
</p>

</div>

<div class="cards">

<div class="card-box">
<h5>Materias Asignadas</h5>
<h2>--</h2>
</div>

<div class="card-box">
<h5>Grupos Disponibles</h5>
<h2>--</h2>
</div>

<div class="card-box">
<h5>Disponibilidad</h5>
<h2>Pendiente</h2>
</div>

<div class="card-box">
<h5>Horario Generado</h5>
<h2>No disponible</h2>
</div>

</div>

<div class="info">

<h4>¿Qué podrás hacer aquí?</h4>

<hr>

<ul>
<li>Seleccionar materias que impartirás.</li>
<li>Elegir grupos.</li>
<li>Registrar disponibilidad semanal.</li>
<li>Consultar tu horario generado.</li>
<li>Modificar tu contraseña.</li>
</ul>

</div>

</div>

</body>
</html>