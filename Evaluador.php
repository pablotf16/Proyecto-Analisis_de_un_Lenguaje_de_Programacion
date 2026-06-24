<?php
// Se crea la clase Evaluador
class Evaluador{

// Se declara el atributo estudiantes
private array $estudiantes; 

public function __construct() {
    $this->estudiantes=[];
}

// Se crea el método agregarEstudiante para agregar un estudiante al arreglo de estudiantes
public function agregarEstudiante(Estudiante $estudiante):void{
array_push($this->estudiantes,$estudiante);
}
public function getEstudiantes() : array{
    return $this->estudiantes;
}

// Se crea el método generarRanking para generar el ranking de estudiantes
public function generarRanking(){ 
usort($this->estudiantes, function($a, $b) {
    return $b->calcularPromedioGeneral() <=> $a->calcularPromedioGeneral();
});
return $this->estudiantes;
}

// Se crea el metodo obtenerReprobados para obtener los estudiantes reprobados
public function obtenerReprobados(){
    $reprobados=[];
    foreach($this->estudiantes as $estudiante){
        if($estudiante->calcularPromedioGeneral()< 4.0){
            array_push($reprobados,$estudiante);
        }
    }
    return $reprobados;

}
//Lo mismo para los estudiantes aprobados
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