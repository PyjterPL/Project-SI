<?php
require_once('../connection.php');
session_start();
if(!(isset($_SESSION['logged'])) || !($_SESSION['logged']==true))
{
   header("Location: ../index.php");
}
    
    $email=$_POST['eEmail'];
    $query=$pdo->prepare("SELECT Email FROM users where Name=?");
    $query->bindValue(1,$_SESSION['User']);
    $query->execute();
    $rows= $query->rowCount();

    if ($rows>0)
    {
        $_SESSION['err_mail'] = "Podany adres jest już w użyciu!";
        header("Location: user_edition.php");
    }

	$filtered_email = filter_var($email,FILTER_SANITIZE_EMAIL); // Usuwa(lub raczej WYCINA) wszystkie znaki z adresu e-mail oprócz liter,cyfr oraz !#$%&'*+-=?^_`{|}~@.[]. 
		
	if((filter_var($filtered_email,FILTER_VALIDATE_EMAIL)==false)|| ($filtered_email!=$email))
	{
	
	$_SESSION['err_mail'] ="Podaj poprawny adres e-mail";
    header("Location: user_edition");
    }

    



    $query=$pdo->prepare('UPDATE users SET Email=? where Name=? ');
    $query->bindValue(1,$filtered_email );
    $query->bindValue(2,$_SESSION['User']);
    $query->execute();
    header("Location: user_edition.php?komm=Adres E-mail został zaaktualizowany");
?>