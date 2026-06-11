<?php

session_start();

require_once
"../config/conexion.php";

$matricula =
$_POST['matricula'];

$password =
$_POST['password'];

$sql =
"SELECT * FROM usuarios
WHERE matricula=?";

$stmt =
$conexion->prepare($sql);

$stmt->execute([
$matricula
]);

$usuario =
$stmt->fetch();

if(
$usuario &&
$usuario['password']==$password
){

    $_SESSION['id']
    =
    $usuario['id'];

    $_SESSION['nombre']
    =
    $usuario['nombre'];

    $_SESSION['rol']
    =
    $usuario['rol'];

    if(
    $usuario['rol']
    ==
    'admin'
    ){

        header(
        "Location:
        ../admin/dashboard.php"
        );

    }else{

        header(
        "Location:
        ../docente/dashboard.php"
        );

    }

}else{

    echo
    "Usuario o contraseña incorrectos";

}