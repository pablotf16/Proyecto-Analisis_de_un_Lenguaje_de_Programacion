<?php

class Evaluador{


private array $estudiantes; 

public function __construct() {
    $this->estudiantes=[];
}

public function agregarEstudiante(Estudiante $estudiante):void{
array_push($this->estudiantes,$estudiante);
}
public function getEstudiantes() : array{
    return $this->estudiantes;
}

public function generarRanking(){ 
usort($this->estudiantes, function($a, $b) {
    return $b->calcularPromedioGeneral() <=> $a->calcularPromedioGeneral();
});
return $this->estudiantes;
}

public function obtenerReprobados(){
    $reprobados=[];
    foreach($this->estudiantes as $estudiante){
        if($estudiante->calcularPromedioGeneral()< 4.0){
            array_push($reprobados,$estudiante);
        }
    }
    return $reprobados;

}
public function obtenerAprobados(){
    $aprobados=[];
    foreach($this->estudiantes as $estudiante){
        if($estudiante->calcularPromedioGeneral()>= 4.0){
            array_push($aprobados,$estudiante);
        }
    }
    return $aprobados;

}
}