<?php

session_start();

if(!isset($_SESSION['rol']) || $_SESSION['rol']!='admin'){
    header("Location: ../index.php");
    exit();
}

require_once("../config/conexion.php");

/*
    BORRAR HORARIO ANTERIOR
*/
//$conexion->exec("TRUNCATE TABLE horario_generado");

/*
    OBTENER ASIGNACIONES
*/
$sql = "
SELECT
dg.docente_id,
dg.grupo_id,
dg.materia_id,
m.horas_semana
FROM docente_grupo dg
INNER JOIN materias m
ON dg.materia_id=m.id
";

$asignaciones = $conexion->query($sql);

$totalGeneradas = 0;

while($a = $asignaciones->fetch(PDO::FETCH_ASSOC))
{

    $docente = $a['docente_id'];
    $grupo   = $a['grupo_id'];
    $materia = $a['materia_id'];

    $horasNecesarias = $a['horas_semana'];

    /*
        DISPONIBILIDAD DEL DOCENTE
    */

    $sqlDisp = "
    SELECT *
    FROM disponibilidad_docente
    WHERE docente_id = $docente
    AND grupo_id = $grupo
    ORDER BY dia,hora
    ";

    $disp = $conexion->query($sqlDisp);

    $contador = 0;

    while($d = $disp->fetch(PDO::FETCH_ASSOC))
    {

        if($contador >= $horasNecesarias){
            break;
        }

        $dia = $d['dia'];
        $hora = $d['hora'];

        /*
            VERIFICAR SI EL GRUPO YA TIENE ALGO
        */

        $checkGrupo = $conexion->query("
        SELECT id
        FROM horario_generado
        WHERE grupo_id='$grupo'
        AND dia='$dia'
        AND hora='$hora'
        ");

        if($checkGrupo->rowCount()>0){
            continue;
        }

        /*
            INSERTAR
        */

        $conexion->exec("
        INSERT INTO horario_generado
        (
            grupo_id,
            materia_id,
            docente_id,
            dia,
            hora
        )
        VALUES
        (
            '$grupo',
            '$materia',
            '$docente',
            '$dia',
            '$hora'
        )
        ");

        $contador++;
        $totalGeneradas++;
    }
}

echo "
<h1>Horario generado correctamente</h1>
<h2>Total bloques creados: $totalGeneradas</h2>

<a href='dashboard.php'>
Volver al panel
</a>
";