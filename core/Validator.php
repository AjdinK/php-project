<?php

class Validator
{

    public static function String($value, $min, $max = INF)
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function Email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
