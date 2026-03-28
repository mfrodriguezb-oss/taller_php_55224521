<?php

class Acronimo
{
    public function generar($frase)
    {
        $frase = preg_replace('/[^\w\s-]/', '', $frase);
        $frase = str_replace('-', ' ', $frase);
        $palabras = explode(' ', $frase);

        $acronimo = '';
        foreach ($palabras as $palabra) {
            if ($palabra !== '') {
                $acronimo .= strtoupper($palabra[0]);
            }
        }
        return $acronimo;
    }
}
