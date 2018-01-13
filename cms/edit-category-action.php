<?php
require_once('../connection.php');
//require_once('../user_class.php');

session_start();
//$user = new User;
if(isset($_GET['id']) && isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  $_SESSION['PermissionID']<3)
{
    $id = $_GET['id'];
    if(isset($_POST['name']))
    {
    $name = $_POST['name'];
 
        if(empty($name))
        {
            $error="Uzupełnij wymagane pola";
            header("Location: category-edit.php?error=$error&id=$userID");
            exit();
        }
    

  
       
              
                    $query=$pdo->prepare('UPDATE articlecategories SET Name=? WHERE CategoryID=?');
                    $query->bindValue(1, $name);
                    $query->bindValue(2, $id);
                // $query->bindValue(7, $id);
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