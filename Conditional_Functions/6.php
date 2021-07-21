<?php

function Power($base, $exp)
{
if ($exp == 1) return ($base);
if ($exp != 1) return ($base * Power($base, $exp - 1));
}
echo Power(2, 4);

?>