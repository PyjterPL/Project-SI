<?php 
//require_once('user_ed-action.php');
require_once('../connection.php');
session_start();
if(!(isset($_SESSION['logged'])) || !($_SESSION['logged']==true))
{
   header("Location: ../index.php");
}

if(!(isset($_POST['ePass'])) || !(isset($_POST['ePassP']))  || empty($_POST['ePass']) ||empty($_POST['ePassP']) )
{
    $_SESSION['err_login'] = "Uzupełnij Pola !";
    header("Location: user_edition.php");
    exit();
}

$haslo= $_POST['ePass'];
$haslo2=$_POST['ePassP'];

if(strlen($haslo) <8 || strlen($haslo) > 25)
{
    
    $_SESSION['err_haslo']="Hasło musi być dłuższe niż 8 znaków i krótsze niż 25 znaków";
    header("Location: user_edition.php");
}
if($haslo != $haslo2)
{
    $_SESSION['err_haslo']="Podane hasłą muszą być identyczne";
    header("Location: user_edition.php");
    
}
// Haszowanie hasła obecnie szyfruje się: bCrypt  user:test hasło:123qwerty
$haslo_hashed = password_hash($haslo,PASSWORD_DEFAULT); // DEFAULT oznacza tutaj --> użyj najsliniejszego (obecnie) algorytmu 

 

    $query=$pdo->prepare('UPDATE users SET Password=? where Name=? ');
    $query->bindValue(1,$haslo_hashed );
    $query->bindValue(2,$_SESSION['User']);
    $query->execute();
    
   
    header("Location: user_edition.php?komm=Haslo Zmienione");

?>