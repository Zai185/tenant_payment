<?php

namespace App\Helpers;

abstract class CVA
{

    abstract public static function config();
    
    /**
     * Summary of new
     * @param mixed $i intent of the element
     * @param mixed $s size of the element
     * @return mixed final class name for the elements
     */
    public static function new($i = null, $s = null)
    {
        [
            'base' => $base,
            'variants' => $variants,
            'default' => $default
        ] = static::config();

        extract($default + $variants); // intent, size
        return $base . ' ' . $intents[$i ?? $intent] . ' ' . $sizes[$s ?? $size];
    }
}
