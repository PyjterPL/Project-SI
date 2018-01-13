<?php
require_once('../connection.php');
require_once('../articles_categories_class.php');
//test git
session_start();
$category = new Category;
if(isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  $_SESSION['PermissionID']<3)
{
    if(isset($_POST['name']))
    {
    $name = $_POST['name'];
  

        if(empty($name))
        {
            $error="Uzupełnij wymagane pola";
            header("Location: category-add.php?error=$error");
            exit();
        }
           $query=$pdo->prepare('INSERT INTO articlecategories(Name) VALUES(?)');
            $query->bindValue(1, $name);

            $query->execute();
            header('Location: categories-options.php');
            exit();
        
    }
}
else
{
    header('Location: ../index.php');
    exit();
}
?>