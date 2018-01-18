<?php
require_once('../connection.php');
session_start();
if(!(isset($_SESSION['logged'])) || !($_SESSION['logged']==true))
{
   header("Location: ../index.php");
   exit();
}
    
    $query=$pdo->prepare('UPDATE users SET Description=? where Name=? ');
    $query->bindValue(1,$_POST['eDescription'] );
    $query->bindValue(2,$_SESSION['User']);
    $query->execute();
    header("Location: user_edition.php?komm=Opis Użytkownika został zaaktualizowany");
?>