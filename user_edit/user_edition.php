<?php 
//require_once('user_ed-action.php');
session_start();
if(!(isset($_SESSION['logged'])) || !($_SESSION['logged']==true))
{
   header("Location: ../index.php");
}
$name=$_SESSION['User'];
if(isset($_GET['komm']))
{
    $komm = $_GET['komm'];
}
else $komm="";
?>

<!DOCTYPE HTML> 
<html lang ="pl">
<head> 

    
    
    
    <link rel="stylesheet" href="../CSS/Login.css" /> 
</head>

<body>

   
<div id="edit-opt">

        <label>Edycja użytkownika - <?php echo $name."    ".$komm; ?> </label>

        <div id="rameczka">

            <form action="user_name_edition.php" method="post" >

                <label>Nazwa</label>
                <input type = "text" name = "eName"  >

                <input type="submit" value = "Wyślij"/>

                <?php // Sprawdzenie poprawoności loginu 

                if(isset($_SESSION['err_login']))
                {
                echo '<div class="error">'.$_SESSION['err_login'].'</div>';
                unset($_SESSION['err_login']);
                }?>
                
            </form>

        </div>

        <div id="rameczka">

            <form action="user_password_edition.php" method="post">

                <label>Hasło</label>
                <input type = "password" name = "ePass" > </br>
                <label>Powtórz hasło <input type = "password" name = "ePassP" ></label>
                <input type="submit" value = "Wyślij"/> 
                <?php // Sprawdzenie poprawności haseł 
                if(isset($_SESSION['err_haslo']))
                {
                echo '<div class="error">'.$_SESSION['err_haslo'].'</div>';
                unset($_SESSION['err_haslo']);
                }
                ?>

            </form>
        </div>


        <div id="rameczka">
            <form action ="user_email_edition.php" method="POST">

                <label>E-Mail</label>
                <input type = "tekst" name = "eEmail" >
                <input type="submit" value = "Wyślij"/>
                <?php // Sprawdzenie poprawności e-mail
                if(isset($_SESSION['err_mail']))
                {
                echo '<div class="error">'.$_SESSION['err_mail'].'</div>';
                unset($_SESSION['err_mail']);
                }
                ?>

            </form>
        </div>



        <div id="rameczka">
            <form action = "user_avatar_edition.php" method="POST"enctype="multipart/form-data">

                <label>Avatar</label> 
                <input type="file" name="eAvatar" accept="image/jpeg,image/gif,image/jpg" />
                <input type="submit" value = "Wyślij"/>
                <?php // Sprawdzenie poprawności e-mail
                if(isset($_SESSION['err_avatar']))
                {
                echo '<div class="error">'.$_SESSION['err_avatar'].'</div>';
                unset($_SESSION['err_avatar']);
                }
                ?>

            </form>
        </div>



        <div id="rameczka">
            <form action ="user_description_edition.php" method="post">

                <label> Edytuj Opis </label>
                <input type = "tekst" name = "eDescription" >
                <input type="submit" value = "Wyślij"/>
            </form>

        </div>


        
            </br>

            <div id="rameczka">
        <input type="button" value="Strona główna" style="float: right"onclick="window.location.href='../index.php'" /> 
        <input type="button" value="Powrót"  onclick="window.location.href='../panel.php'" /> 
            </div>
    </div>
</body>
</html>