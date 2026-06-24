<?php

// Se crea la calse Nota
class Nota{

// Se declaran los atributos ramo y notas 
private string $ramo;
private array $notas;

// Se crea el constructor de la clase Nota 
public function __construct(string $ramo, array $notas){
    $this->ramo= $ramo;
    $this->notas = array_map('floatval', $notas);
}
// Se crean los métodos getRamo y getNotas para obtener el ramo y las notas respectivamente
public function getRamo() : string{
    return $this->ramo;
}
public function getNotas() : array{
    return $this->notas;
}

// se crea el método calcularPromedio para calcular el promedio de las notas del ramo
public function calcularPromedio(): float {
    if (count($this->notas) === 0) return 0;
    return round(array_sum($this->notas)/count($this->notas),1);
}


}