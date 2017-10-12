<?php

namespace Math;

function m_add($a, $b, $precision = null)
{
    return bcadd($a, $b, $precision === null?max_ndecimal($a, $b) : $precision);
}

function m_div($a, $b, $precision = null)
{
  return bcdiv($a, $b, $precision);
}

function m_sub($a, $b, $precision = null)
{
  return bcsub($a, $b, $precision === null ? max_ndecimal($a, $b): $precision);
}

function m_mul($a, $b, $precision = null)
{
  return bcmul($a, $b, $precision);
}

function m_floor($val, $precision = null)
{
    $mul = pow(10, $precision);
    return bcdiv(floor(bcmul($val, $mul, $precision)), $mul, $precision);
}

function m_ceil($val, $precision = null)
{
    $mul = pow(10, $precision);
    return bcdiv(ceil(bcmul($val, $mul, $precision)), $mul, $precision);
}

function m_compare($a, $b)
{
  if (version_compare(PHP_VERSION, '7') >= 0) {
    return ($a <=> $b) === 0;
  }
  // todo
  throw new \Exception('not implemented yet');
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
