<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page A</title>
</head>
<body>
    <h1>Page A</h1>
    <a href="pageB.php">to Page B</a>
</body>
</html>

<?php
session_start();
$_SESSION['page'] = 'pageA.php';
session_write_close();