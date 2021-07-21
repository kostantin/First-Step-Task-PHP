<?php
$d = htmlspecialchars($_GET["var"]);
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
</body>
</html>



