<?php
require_once('../connection.php');
require_once('../user_class.php');

session_start();
$user = new User;
if(isset($_GET['id']) && isset($_SESSION['logged']) && ($_SESSION['logged']==true) &&  $_SESSION['PermissionID']<3)
{
    if(isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['description'])&& isset($_POST['permission']))
    {
    $name = $_POST['name'];
  //  $password = $_POST['password'];
  //  $mail = $_POST['mail'];
    $description = $_POST['description'];
    $userID= $_GET['id'];
    $permission=(int)$_POST['permission'];


    $mail = $_POST['mail'];

   

    //$id = $_GET['id'];

        if(empty($name) or empty($mail) or empty($description)or empty($permission))
        {
            $error="Uzupełnij wymagane pola";
            header("Location: user-edit.php?error=$error&id=$userID");
            exit();
        }
        if(!filter_var($mail,FILTER_VALIDATE_EMAIL))
        {

              $error="Niepoprawny adres email";
              header("Location: user-edit.php?error=$error&id=$userID");
              exit();
        }

        if(is_uploaded_file($_FILES['obrazek']['tmp_name']))
        {

            $file = file_get_contents($_FILES['obrazek']['tmp_name']);
            $max = 1024 * 64;
            $wielkosc_pliku = $_FILES['obrazek']['size'];
        //  $typ_pliku = $_FILES['plik']['type'];
        //  $nazwa_pliku = $_FILES['plik']['name'];
        //  $tymczasowa_nazwa_plku = $_FILES['plik']['tmp_name'];
        // $miejsce_docelowe = './obrazki/'.$nazwa_pliku;
        
            if ($wielkosc_pliku> $max)
                {
                     //echo 'Plik jest za duzy. Maksymalnie mozna wysłać plik o wielkosci'.$max.'.';
                    $error="Plik jest za duzy.Maksymalnie mozna wysłać plik o wielkosci $max KB";
                    header("Location: user-edit.php?error=$error&id=$userID");
                    exit();
                }      
                $query=$pdo->prepare('UPDATE users SET Name=?, Password=?,Email=?,Description=?,PermissionID=?,Avatar=? WHERE UserID=?');
                //$query=$pdo->prepare('INSERT INTO articles(CategoryID,UserID,Title,Introduction,InsertDate,Tags,Content) VALUES(?,?,?,?,?,?,?)');
                $query->bindValue(1, $name);
                $query->bindValue(2, password_hash($password,PASSWORD_DEFAULT));
                $query->bindValue(3, $mail);
                $query->bindValue(4, $description);
                $query->bindValue(5, $permission);
                $query->bindValue(6, $file);
                 $query->bindValue(7, $userID);
                $query->execute();
                header('Location: user-options.php');
                exit();
            }
            else
            {
                if(isset($_POST['password']))
                {
                    $password = $_POST['password'];
                    if(!empty($password))
                    {
                   
                // echo "nie ma pliku";
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
                    $query=$pdo->prepare('UPDATE users SET Name=?,Email=?,Description=?,PermissionID=? WHERE UserID=?');
                    $query->bindValue(1, $name);
                    
                    $query->bindValue(2, $mail);
                    $query->bindValue(3, $description);
                    $query->bindValue(4, $permission);
                    $query->bindValue(5, $userID);
                // $query->bindValue(7, $id);
                    $query->execute();
                    header('Location: user-options.php');
                    exit();
                }
            }
    }
}
else
{
   // echo "cos nie tak";
    header('Location: ../index.php');
    exit();
}
?>