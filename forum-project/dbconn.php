<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'forum';

$con = mysqli_connect($host,$username,$password,$dbname);
if(!$con)
echo "Cannot connect to the database";


?>