<?php
require_once('../connection.php');
session_start();
if(!(isset($_SESSION['logged'])) || !($_SESSION['logged']==true))
{
   header("Location: ../index.php");
   exit();
}
if(is_uploaded_file($_FILES['eAvatar']['tmp_name']))
{
    $file = file_get_contents($_FILES['eAvatar']['tmp_name']);
    $max = 1024 * 64;
    $wielkosc_pliku = $_FILES['eAvatar']['size'];

    if ($wielkosc_pliku> $max)
        {
            $_SESSION['err_avatar'] = "Przekroczono dopuszczalną wielkość pliku/n Dopuszczalna wielkosc to 1024 x 64 !";
            header("Location: user_edition.php");
            
        }      
    else
         {
            $query=$pdo->prepare('UPDATE users SET Avatar=? WHERE Name=?');
            $query->bindValue(1, $file);
            $query->bindValue(2, $_SESSION['User']);
            $query->execute();
            $_SESSION['Avatar'] = $file;
            header("Location: user_edition.php?komm=Avatar Został Zmieniony");
            exit();
           
         }    
}
else{
    header("Location: user_edition.php");
}


// PLACEHOLDER

?>