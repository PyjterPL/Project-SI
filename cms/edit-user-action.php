<?php
require_once('../connection.php');
require_once('../user_class.php');

session_start();
$user = new User;
if(isset($_GET['id']) && isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  $_SESSION['PermissionID']<3)
{
    if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['mail']) && isset($_POST['description'])&& isset($_POST['permission']))
    {
    $name = $_POST['name'];
    $password = $_POST['password'];
  //  $mail = $_POST['mail'];
    $description = $_POST['description'];
    $userID= $_GET['id'];
    $permission=(int)$_POST['permission'];


    $mail = $_POST['mail'];

   

    //$id = $_GET['id'];

        if(empty($name) or empty($password) or empty($mail) or empty($description)or empty($permission))
        {
            $error="Uzupełnij wymagane pola";
            header("Location: user-edit.php?error=$error");
            exit();
        }
        if(!filter_var($mail,FILTER_VALIDATE_EMAIL))
        {

              $error="Niepoprawny adres email";
              header("Location: user-edit.php?error=$error&id=$userID");
              exit();
        }
    $query=$pdo->prepare('UPDATE users SET Name=?, Password=?,Email=?,Description=?,PermissionID=? WHERE UserID=?');
    $query->bindValue(1, $name);
    $query->bindValue(2, password_hash($password,PASSWORD_DEFAULT));
    $query->bindValue(3, $mail);
    $query->bindValue(4, $description);
    $query->bindValue(5, $permission);
    $query->bindValue(6, $userID);
   // $query->bindValue(7, $id);
    $query->execute();
    header('Location: user-options.php');
    exit();
    }
}
else
{
    header('Location: ../index.php');
    exit();
}
?>