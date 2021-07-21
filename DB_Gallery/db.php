<?php

function Connect_DB($localhost = 'localhost', $root = 'root', $password = '', $db = '')
{
    $mysqli = new mysqli($localhost, $root, $password, $db);
    if($mysqli->connect_error)
    {
        die('Ошибка подкючения: ' . $mysqli->connect_error);
    }
    return $mysqli;
}

function Create_DB()
{

    $mysqli = Connect_DB();

    $db_EXISTS = $mysqli->select_db("gallery_db");

    if($db_EXISTS)
    {
        $mysqli->close();
        return;
    }

    echo 'DATABASE is NOT EXISTS!!!   ';

    $query = "CREATE DATABASE IF NOT EXISTS gallery_db";
    
    if($mysqli->query($query) === true)
    {
        echo 'CREATE DATABASE   ';
    }else
    {
        echo 'Ошибка  создания базы данных: ' . $mysqli->error;
        echo "<br>";
    }

    $mysqli->select_db("gallery_db");

    $query = "CREATE TABLE IF NOT EXISTS gallery_tab (id INTEGER AUTO_INCREMENT PRIMARY KEY,
     type VARCHAR(30), count INTEGER, uniq_id VARCHAR(30))";
     if($mysqli->query($query))
     {
         echo 'CREATE TABLE';
     }else
     {
         echo 'Ошибка  создания табицы: ' . $mysqli->error;
     }
    $mysqli->close();
}

Create_DB();

function Data_Base_Load($type, $uniq_id, $count = 0)
{

    $link = Connect_DB(db: "gallery_db");

    $query ="INSERT INTO gallery_tab (type, count, uniq_id) VALUES('$type', '$count', '$uniq_id')";

    $result = mysqli_query($link, $query) 
    or die("Ошибка " . mysqli_error($link)); 
   
    $link->close();

}

function Data_Base_Set_Count($uniq_id)
{

    $link = Connect_DB(db: "gallery_db");

    $query ="UPDATE gallery_tab SET count = count + 1 WHERE uniq_id = '$uniq_id'";

    $result = mysqli_query($link, $query) 
    or die("Ошибка " . mysqli_error($link)); 

    $query ="SELECT count FROM gallery_tab WHERE uniq_id = '$uniq_id'";

    $result = mysqli_query($link, $query) 
    or die("Ошибка " . mysqli_error($link)); 

    foreach($result as $row)
    {
        $v = $row["count"];      
    } 
    
	
    $link->close();
    return $v;

}

function Data_Base_Sort()
{

    $link = Connect_DB(db: "gallery_db");

    $query ="SELECT uniq_id FROM gallery_tab ORDER BY count DESC";

    $result = mysqli_query($link, $query) 
    or die("Ошибка " . mysqli_error($link)); 


    $arr = array();

    foreach($result as $row)
    {
        $arr[] = $row["uniq_id"];
    } 
   
    $link->close();

    return $arr;

}	

?>