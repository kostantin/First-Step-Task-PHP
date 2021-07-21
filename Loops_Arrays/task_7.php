<?php

function Transalte($string){

return preg_replace('/\s+/', '_', $string);

}

echo Transalte ("фы ваыв ывауьор");

?>