<?php

 if (isset($_COOKIE['password']))
{

	$w = $_COOKIE['password'];

	session_start();

	$page = 'pageA.php';

	if (!isset($_SESSION['page'])) 
		{
			$_SESSION['page'] = 'pageA.php';	
		}
	else 
		{
			$page = $_SESSION['page'];			
		}

		session_write_close();

		Redirect($page);
}
else 
{
	Redirect('register.php');
}

function Redirect($name = 'pageA.php')
{
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = $name;
	print_r($host . $uri . '/' . $extra);  
	header("Location: http://$host$uri/$extra");
	exit;
}

  ?>