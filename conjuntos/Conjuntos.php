<?php

class Conjuntos
{
    public function union($A, $B)
    {
        return array_values(array_unique(array_merge($A, $B)));
    }

    public function interseccion($A, $B)
    {
        return array_values(array_intersect($A, $B));
    }

    public function diferencia($A, $B)
    {
        return array_values(array_diff($A, $B));
    }
}