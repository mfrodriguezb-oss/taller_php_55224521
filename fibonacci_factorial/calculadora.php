<?php

class Calculadora
{
    public function factorial($n)
    {
        $resultado = 1;
        for ($i = 1; $i <= $n; $i++) {
            $resultado *= $i;
        }
        return $resultado;
    }

    public function fibonacci($n)
    {
        $serie = [];
        $a = 0;
        $b = 1;

        for ($i = 0; $i < $n; $i++) {
            $serie[] = $a;
            $temp = $a + $b;
            $a = $b;
            $b = $temp;
        }

        return $serie;
    }
}
