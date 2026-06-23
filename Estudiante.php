<?php


class Estudiante{

private string $nombre;
private array $notas;


public function __construct(string $nombre){
    $this->nombre = $nombre;
    $this->notas = [];
}

public function getNombre() : string{
    return $this->nombre;
}
public function getNotas() : array{
    return $this->notas;
}
public function agregarRamoconNota (string $ramo,array $notas) : void {
    array_push($this->notas, new Nota($ramo,$notas));
}
public function calcularPromedioGeneral(): float {
    $suma=0;
    foreach ($this->notas as $nota) {
    $suma+=$nota->calcularPromedio();
    }
    return round($suma/count($this->notas),1);
}


}