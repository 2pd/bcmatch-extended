<?php

namespace Math;

function m_add($a, $b, $precision = null)
{
    return bcadd($a, $b, $precision);
}

function ndecimal($val)
{
    // scientific notation
    $number = abs(intval(strrchr($val, '-')));
    $dotNumber =  strlen(strrchr($val, '.'));
    return $number == 0 ? $dotNumber == 0 ? 0 : $dotNumber - 1 : $number;
}

function max_ndecimal($a, ...$b)
{
    return array_reduce($b, function($curry, $item) {
        return max($curry, ndecimal($item));
    }, ndecimal($a));
}
