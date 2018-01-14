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

        if(is_uploaded_file($_FILES['obrazek']['tmp_name']))
        {
                $file = file_get_contents($_FILES['obrazek']['tmp_name']);
            $max = 1024 * 64;
            $wielkosc_pliku = $_FILES['obrazek']['size'];
            if ($wielkosc_pliku> $max)
                {
                    $error="Plik jest za duzy.Maksymalnie mozna wysłać plik o wielkosci $max KB";
                    header("Location: user-add.php?error=$error");
                    exit();
                }      
                $query=$pdo->prepare('INSERT INTO users(Name,Password,Email,Description,PermissionID,Avatar) VALUES(?,?,?,?,?,?)');
                $query->bindValue(1, $name);
                $query->bindValue(2, password_hash($password,PASSWORD_DEFAULT));
                $query->bindValue(3, $mail);
                $query->bindValue(4, $description);
                $query->bindValue(5, $permission);
                $query->bindValue(6, $file);
                $query->execute();
                header('Location: user-options.php');
                exit();

        }
        else{
            $query=$pdo->prepare('INSERT INTO users(Name,Password,Email,Description,PermissionID) VALUES(?,?,?,?,?)');
            $query->bindValue(1, $name);
            $query->bindValue(2, password_hash($password,PASSWORD_DEFAULT));
            $query->bindValue(3, $mail);
            $query->bindValue(4, $description);
            $query->bindValue(5, $permission);
            $query->execute();
            header('Location: user-options.php');
            exit();
        }
    }
}
else
{
    header('Location: ../index.php');
    exit();
}
?>