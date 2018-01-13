<?php
require_once('../connection.php');
require_once('../articles_categories_class.php');

session_start();
$category = new Category;
if(isset($_GET['id']) && isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  $_SESSION['PermissionID']<3)
{
    $id = $_GET['id'];
    $category->delete_category($id);
     header('Location: categories-options.php');
   // echo "usunieto";
     exit();
}
else
{
    header('Location: ../index.php');
    exit();
}
?>