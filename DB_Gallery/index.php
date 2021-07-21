<?php
include 'db.php';
include 'img_size.php';

function Redirect($name)
{
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = $name;
	print_r($host . $uri . '/' . $extra);  
	header("Location: http://$host$uri/$extra");
	exit;
}

function Show()
{

    $arr = Data_Base_Sort();

    $arr_echo = array();
   
    $scanned_directory = array_diff(scandir("./images_small"), array('..', '.'));

    foreach ($scanned_directory as $value) {
        $uniq_id = preg_replace('/\..*/','', $value);
        $dir1 = "./images_small/$value";
        $dir2 = "./images/$value";
        $dh = opendir($dir1);

        while (($file = readdir($dh)) !== false) 
        {
            if($file != "." && $file != "..") 
            {
                $arr_echo["$uniq_id"] = "<a href='gallery.php?var=$dir2/$file&vav=$uniq_id'><img src='$dir1/$file' width='auto' height='auto'></a>";
            }
        }     
    }

     foreach($arr as $value)
    {
        echo $arr_echo[$value];
    }  
}

Show();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $uploadfile = basename($_FILES['picture']['name']);

    $image_type_num = exif_imagetype($_FILES['picture']['tmp_name']);

    
    if(in_array($image_type_num , array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG))) //Проверяем поддерживается ли тип картинки
    {
        $array = array(1 => 'gif', 2 => 'jpeg', 3 => 'png'); //Создаем массив с именами типов картинок
        
        $img_type = $array[$image_type_num]; //По индексу получаем имя типа картинки
       
        $uniq_id = uniqid(); //Создаем уникальный id

        Data_Base_Load($img_type, $uniq_id); // Сохраняем в базу данных имя типа и уникальный id

        $uploaddir = "images/$uniq_id.$img_type"; //Путь для сохранения изображения

        mkdir($uploaddir, 0700); //Создаем папку

        move_uploaded_file($_FILES['picture']['tmp_name'], "$uploaddir/$uploadfile"); // Сохраняем загруженную картинку на сервере


        $im = img_mini("$uploaddir/$uploadfile", $image_type_num); //Создаем уменьшенную копию изображения

        $uploaddir = "./images_small/$uniq_id.$img_type"; //Путь для уменьшенной копии

        mkdir($uploaddir, 0700); //Создаем папку для уменьшенной копии

        switch ($image_type_num) {
            case 1 :
                imagegif($im, "$uploaddir/$uploadfile");
            break;
            case 2 :
                imagejpeg($im, "$uploaddir/$uploadfile", 100);
            break;
            case 3 :
                imagepng($im, "$uploaddir/$uploadfile", 0);
            break;
        }   

        imagedestroy($im);

        Redirect('index.php');

        exit;
    } else
    {
    echo 'Формат не поддерживается!';
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>БД_Галерея</title>
</head>

<body>
    <form enctype="multipart/form-data" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" />
        <input name="picture" type="file" />
        <input type="submit" value="Загрузить" />
    </form>
</body>

</html>