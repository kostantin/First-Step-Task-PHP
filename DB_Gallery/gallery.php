<?php
include 'db.php';

$d = htmlspecialchars($_GET["var"]); // Путь к изображению
$s = htmlspecialchars($_GET["vav"]); // Уникальный id
$v = Data_Base_Set_Count($s); // Увеличиваем кол-во просмотров

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
</head>
<body>
<img src="<?php echo $d;?>" width='auto' height='auto'> 
<div>Просмотров <?php echo $v;?></div>
</body>
</html>



