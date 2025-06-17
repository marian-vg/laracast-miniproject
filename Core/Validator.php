<?php

namespace Core;

class Validator
{

    // funcion pura, no depende de estados o valores del exterior
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

}