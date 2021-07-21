<?php

function C($a, $b)
{
    return $a > $b ? $a : $b;
}
echo C(20, 4), "\n";

function B($a, $b)
{
    return $a > $b ? $b : $a;
}
echo B(20, 4), "\n";

function D($a, $b)
{
    if($a * $b > 100 && $a * $b < 1000)
    {
    return $a > $b ? $a - $b : $b - $a;
    }

    if($a * $b > 1000)
    {
    return $a > $b ? ($a * $b)/$a : ($b * $a)/$b;
    }
}
echo D(100, 110), "\n";

?>