<?php 
//require_once('user_ed-action.php');
require_once('../connection.php');
session_start();
if(!(isset($_SESSION['logged'])) || !($_SESSION['logged']==true))
{
   header("Location: ../index.php");
}

if(!(isset($_POST['eName'])) || empty($_POST['eName']))
{
    $_SESSION['err_login'] = "Nie wpisałeś nazwy użytkownika !";
    header("Location: user_edition.php");
    exit();
}
    $query=$pdo->prepare('SELECT Name FROM users where Name = ? ');
    $query->bindValue(1,$_POST['eName']);
    $query->execute();
    
    $rows = $query->rowCount();
    if ($rows>0)
    {
        $_SESSION['err_login'] = "Podana nazwa jest już zajęta!";
        header("Location: user_edition.php");
        exit();
    }

    $query=$pdo->prepare('UPDATE users SET Name=? where Name=? ');
    $query->bindValue(1,$_POST['eName']);
    $query->bindValue(2,$_SESSION['User']);
    $query->execute();
    
    $_SESSION['User']=$_POST['eName'];
    header("Location: user_edition.php?komm=Nazwa Uzykownika Zostala Zmieniona");

?>