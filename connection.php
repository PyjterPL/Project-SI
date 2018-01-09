<?php
require_once('connect.php');

try
{
    $pdo = new PDO("mysql:host=$host;dbname=$db_name","$db_user","$db_password");
}
catch(PDOException $e)
{
    exit('Database error.');
}
?>