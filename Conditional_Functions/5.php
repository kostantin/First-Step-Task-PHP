<?php
function Addition($a, $b){
    return $a + $b;
}

function Subtraction($a, $b){
    return $a - $b;
}

function Multiplication($a, $b){
    return $a * $b;
}

function Division($a, $b){
    return $a / $b;
}

function Modulo($a, $b){
    return $a % $b;
}

function Exponentiation($a, $b){
    return $a ** $b;
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case "Addition":
            return Addition($arg1, $arg2);
            break;
        case "Subtraction":
            return Subtraction($arg1, $arg2);
            break;
        case "Multiplication":
            return Multiplication($arg1, $arg2);
            break;
        case "Division":
            return Division($arg1, $arg2);
            break;
        case "Modulo":
            return Modulo($arg1, $arg2);
            break;
        case "Exponentiation":
            return Exponentiation($arg1, $arg2);
            break;    
    }
}

echo mathOperation(2, 2, "Exponentiation");

?>