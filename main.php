<?php

require_once 'Nota.php';
require_once 'Estudiante.php';
require_once 'Evaluador.php';




$evaluador= new Evaluador();

$archivo = fopen("estudiantes.csv", "r");  // "r" = solo lectura

if (!$archivo) {
    echo "Error: no se pudo abrir el archivo\n";
    exit(1);
}


$primeraLinea = true;
while (($linea = fgetcsv($archivo, 0, ',', '"', '')) !== false) {
    if ($primeraLinea) {       // saltarse el header
        $primeraLinea = false;
        continue;
    }
    // $linea es un arreglo con cada columna
    // ej: ["Ana", "Matemáticas", "6.5", "5.8", "7.0"]
    $nombre = $linea[0];
    $ramo   = $linea[1];
    $notas  = [(float) $linea[2],(float) $linea[3],(float) $linea[4]];  // castear string a float

    $estudianteExistente = null;
    foreach ($evaluador->getEstudiantes() as $e) {
        if ($e->getNombre() === $nombre) {
            $estudianteExistente = $e;
            break;
        }
     }
    if ($estudianteExistente === null) {
    // No existe → crear nuevo y agregarlo
        $nuevo = new Estudiante($nombre);
        $nuevo->agregarRamoconNota($ramo, $notas);
        $evaluador->agregarEstudiante($nuevo);
    } 
    else {
        // Ya existe → solo agregarle el ramo
        $estudianteExistente->agregarRamoconNota($ramo, $notas);
    }



}
fclose($archivo);

echo "\n=================================\n";
echo "Bienvenido al Evaluador de Notas\n";
echo "=================================\n";
echo "1. Mostrar Ranking\n";
echo "2. Mostrar Reprobados\n";
echo "3. Mostrar Aprobados\n";
echo "4. Salir\n";



$opcion = 0;
while ($opcion != 4) {
    // mostrar opciones
    $opcion = readline("Elige una opción: ");
    switch ($opcion) {
        case "1":
            foreach ($evaluador->generarRanking() as $a)
            echo $a->getNombre() . " - Promedio General: " . $a->calcularPromedioGeneral()."\n";
            break;
        case "2":
            echo "\n=================================\n";
            echo "Alumnos Reprobados\n";
            echo "=================================\n";
            foreach ($evaluador->obtenerReprobados() as $a)
            echo $a->getNombre() . " - Promedio General: " . $a->calcularPromedioGeneral()."\n";
            break;
        case "3":
            echo "\n=================================\n";
            echo "Alumnos Aprobados\n";
            echo "=================================\n";
            foreach ($evaluador->obtenerAprobados() as $a)
            echo $a->getNombre() . " - Promedio General: " . $a->calcularPromedioGeneral()."\n";
            break;
        case "4":
            echo "Hasta luego!\n";
            break;
        default:
            echo "Opción inválida\n";
    }
}
