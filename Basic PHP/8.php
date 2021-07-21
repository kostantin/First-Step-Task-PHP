<?php

echo var_dump(true xor false), "<br>";

echo var_dump(false xor true), "<br>";

echo var_dump(true xor true), "<br>";

echo var_dump(false xor false), "<br>";

$a = true;

echo var_dump($a xor $a), "<br>"; // $a xor $a для любых значений $a будет false


?>