<?php
require_once('../connection.php');
require_once('../user_class.php');

session_start();
$user = new User;
if(isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  $_SESSION['PermissionID']<3)
{
    if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['mail']) && isset($_POST['description'])&& isset($_POST['permission']))
    {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];

    //$filtered_email = filter_var($mail,FILTER_SANITIZE_EMAIL); // Usuwa(lub raczej WYCINA) wszystkie znaki z adresu e-mail oprócz liter,cyfr oraz !#$%&'*+-=?^_`{|}~@.[]. 
		


    $description = $_POST['description'];
    //$userID= $_GET['id'];
    $permission=(int)$_POST['permission'];
    //$id = $_GET['id'];

        if(empty($name) or empty($password) or empty($mail) or empty($description)or empty($permission))
        {
            $error="Uzupełnij wymagane pola";
            header("Location: user-add.php?error=$error");
            exit();
        }

        if(!filter_var($mail,FILTER_VALIDATE_EMAIL))
        {

              $error="Niepoprawny adres email";
              header("Location: user-add.php?error=$error");
              exit();
        }
    $query=$pdo->prepare('INSERT INTO users(Name,Password,Email,Description,PermissionID) VALUES(?,?,?,?,?)');
    //$query=$pdo->prepare('INSERT INTO articles(CategoryID,UserID,Title,Introduction,InsertDate,Tags,Content) VALUES(?,?,?,?,?,?,?)');
    $query->bindValue(1, $name);
    $query->bindValue(2, password_hash($password,PASSWORD_DEFAULT));
    $query->bindValue(3, $mail);
    $query->bindValue(4, $description);
    $query->bindValue(5, $permission);
  //  $query->bindValue(6, $userID);
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