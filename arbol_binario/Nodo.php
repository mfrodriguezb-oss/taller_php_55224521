<?php

class Nodo
{
    public $valor;
    public $izq;
    public $der;

    public function __construct($valor)
    {
        $this->valor = $valor;
        $this->izq = null;
        $this->der = null;
    }
}
