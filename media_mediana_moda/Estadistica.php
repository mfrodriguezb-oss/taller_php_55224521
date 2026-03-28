<?php

class Estadistica
{
    public function media($numeros)
    {
        return array_sum($numeros) / count($numeros);
    }

    public function mediana($numeros)
    {
        sort($numeros);
        $n = count($numeros);
        $m = floor($n / 2);

        if ($n % 2 == 0) {
            return ($numeros[$m - 1] + $numeros[$m]) / 2;
        } else {
            return $numeros[$m];
        }
    }

    public function moda($numeros)
    {
        // Convertir a string para evitar warning con decimales
        $numerosStr = array_map('strval', $numeros);

        $frecuencia = array_count_values($numerosStr);
        arsort($frecuencia);

        return array_key_first($frecuencia);
    }
}
