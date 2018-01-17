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

    <label> <?php echo $name."    ".$komm; ?> </label>
    </br>
    <a href="../panel.php">Powrót</a>
</head>

<body>
<br/> <br/>
   
    <div>
        <form action="user_name_edition.php" method="post" >
            <label> Nowa Nazwa Użytkownika</label>
            <input type = "text" name = "eName" >
            <input type="submit" value = "Wyślij"/>
            <?php // Sprawdzenie poprawoności loginu 
                if(isset($_SESSION['err_login']))
                {
                    echo '<div class="error">'.$_SESSION['err_login'].'</div>';
                    unset($_SESSION['err_login']);
                }
            ?>
    
           
            </form>
     </div>
 
        <br/><br/>
     <div>           
    <form action="user_password_edition.php" method="post">

        <label> Nowe Hasło Użytkownika</label>
        <input type = "password" name = "ePass" > 
           <br/> <br/>
          ------------> Powtórz hasło  
        <input type = "password" name = "ePassP" >
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

    <br/><br/>
    <form action ="user_email_edition.php" method="POST">

        <label> Nowy E-Mail Użytkownika</label>
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

    <br/><br/>
    <form action = "user_avatar_edition.php" method="POST"enctype="multipart/form-data">

        <label> Zmien Avatar </label> 
        <input type="file" name="eAvatar" accept="image/jpeg,image/gif,image/jpg" /></br></br>
        <input type="submit" value = "Wyślij"/>
        <?php // Sprawdzenie poprawności e-mail
			if(isset($_SESSION['err_avatar']))
			{
				echo '<div class="error">'.$_SESSION['err_avatar'].'</div>';
				unset($_SESSION['err_avatar']);
			}
		 ?>
        
    </form>
    <br/> <br/>
  
    <form action ="user_description_edition.php" method="post">

        <label> Edytuj Opis </label>
        <input type = "tekst" name = "eDescription" >
        <input type="submit" value = "Wyślij"/>
    </form>
    
</body>
</html>