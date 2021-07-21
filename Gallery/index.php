<?php

function Show()
{
    $d = dir("./images_small");
    $a = dir("./images");
    while (false !== ($entry = $d->read())) 
    {
       if($entry != "." && $entry != "..")     
       echo "<a href='image.php?var=$a->path/$entry'><img src='$d->path/$entry' width='auto' height='auto'></a>";
    }
    echo "<br>";
    $d->close();
}
Show();

function Redirect($name)
{
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = $name;
	print_r($host . $uri . '/' . $extra);  
	header("Location: http://$host$uri/$extra");
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploaddir = 'images';
    $uploadfile = basename($_FILES['picture']['name']);


    move_uploaded_file($_FILES['picture']['tmp_name'], "$uploaddir/$uploadfile");

    $im = img_mini("$uploaddir/$uploadfile");

    imagepng($im, './images_small/' . $uploadfile, 0);
    
    imagedestroy($im);

    Redirect('index.php');

    exit;

}
function img_mini($filename)
{
// задание максимальной ширины и высоты
$width = 200;
$height = 200;
// получение новых размеров
list($width_orig, $height_orig) = getimagesize($filename);

$ratio_orig = $width_orig/$height_orig;

if ($width/$height > $ratio_orig) {
   $width = $height*$ratio_orig;
} else {
   $height = $width/$ratio_orig;
}
// ресэмплирование
$image_p = imagecreatetruecolor($width, $height);
$image = imagecreatefrompng($filename);

setTransparency($image_p, $image);

imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

return $image_p;
}


function setTransparency($new_image, $image_source)
{

    $transparencyIndex = imagecolortransparent($image_source);
    $transparencyColor = array('red' => 255, 'green' => 255, 'blue' => 255);

    if ($transparencyIndex >= 0) {
        $transparencyColor = imagecolorsforindex($image_source, $transparencyIndex);
    }

    $transparencyIndex = imagecolorallocate($new_image, $transparencyColor['red'], $transparencyColor['green'], $transparencyColor['blue']);
    imagefill($new_image, 0, 0, $transparencyIndex);
    imagecolortransparent($new_image, $transparencyIndex);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея</title>
</head>

<body>
    <form enctype="multipart/form-data" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" />
        <input name="picture" type="file" />
        <input type="submit" value="Загрузить" />
    </form>
</body>

</html>