<?php

// Se crea la clase Estudiante
class Estudiante{

// Se declaran los atributos nombre y notas
private string $nombre;
private array $notas;

// Se crea el constructor de la clase Estudiante
public function __construct(string $nombre){
    $this->nombre = $nombre;
    $this->notas = [];
}
// Se crean los métodos getNombre y getNotas para obtener el nombre y las notas respectivamente
public function getNombre() : string{
    return $this->nombre;
}
public function getNotas() : array{
    return $this->notas;
}

// Se crea el método agregarRamoconNota para agregar un ramo con sus notas al arreglo de notas
public function agregarRamoconNota (string $ramo,array $notas) : void {
    array_push($this->notas, new Nota($ramo,$notas));
}
// Se crea el método calcularPromedioGeneral para calcular el promedio general de las notas del estudiante
public function calcularPromedioGeneral(): float {
    $suma=0;
    foreach ($this->notas as $nota) {
    $suma+=$nota->calcularPromedio();
    }
    return round($suma/count($this->notas),1);
}


}