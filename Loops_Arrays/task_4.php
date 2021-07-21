<?php
$array = array("Московская область" => array("Москва", "Зеленоград", "Клин"),
"Ленинградская область" => array("Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"),
"Рязанская область" => array("Рязань", "Касимов", "Скопин", "Сасово", "Ряжск", "Рыбное"));

foreach ($array as $key => $value) {
    echo "<br>";
    echo $key, ':', "<br>";
    foreach ($value as $v) {
        if(array_key_last($value) == key($value)){
            echo $v;
        }else{
            echo $v, ', ';
        }
        next($value);
        
    }
}
?>