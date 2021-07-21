<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page B</title>
</head>
<body>
<h1>Page B</h1>
    <a href="pageA.php">to Page A</a>
</body>
</html>

<?php
session_start();
$_SESSION['page'] = 'pageB.php';
session_write_close();