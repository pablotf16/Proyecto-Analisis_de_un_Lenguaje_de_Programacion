<?php


class Nota{


private string $ramo;
private array $notas;

public function __construct(string $ramo, array $notas){
    $this->ramo= $ramo;
    $this->notas = array_map('floatval', $notas);
}
public function getRamo() : string{
    return $this->ramo;
}
public function getNotas() : array{
    return $this->notas;
}
public function calcularPromedio(): float {
    if (count($this->notas) === 0) return 0;
    return round(array_sum($this->notas)/count($this->notas),1);
}


}