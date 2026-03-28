<?php

class Calculadora
{
    public function calcular($a, $b, $op)
    {
        switch ($op) {
            case 'suma':
                return $a + $b;
            case 'resta':
                return $a - $b;
            case 'multiplicacion':
                return $a * $b;
            case 'division':
                return ($b != 0) ? $a / $b : 'Error: división por 0';
            case 'porcentaje':
                return ($a * $b) / 100;
            default:
                return 'Operación inválida';
        }
    }
}