<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body class="bg-login">

<div class="login-card">

<h1>
Sistema de Horarios
</h1>

<p>
Universidad Mexiquense Del Bicentenario
</p>

<hr>

<form
action="validar.php"
method="POST">

<div class="mb-3">

<label>
Matricula
</label>

<input
type="text"
name="matricula"
class="form-control">

</div>

<div class="mb-3">

<label>
Contraseña
</label>

<input
type="password"
name="password"
class="form-control">

</div>

<button
class="btn btn-primary w-100">

Ingresar

</button>

</form>

</div>

</body>
</html>